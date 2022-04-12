<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// -----------------------------------------------------------------------------
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\WarningCompanyFailToPayToRenewProperty;
// -----------------------------------------------------------------------------
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\Exception\CardException;
// -----------------------------------------------------------------------------
use App\Models\Company;
use App\Models\CompanyPaymentDetail;
use App\Models\Admin;
use App\Models\Property;
use App\Models\PropertyPublicationStatus;
use App\Models\PropertyPublicationStatusPeriod;

class CheckRemainingPublishDayAndBillClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:publishandbill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is to check if properties are overdue for payment or not. If payment is unsuccessful, unpublish the property';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //instruction : https://docs.google.com/spreadsheets/d/1A6MQL_ngsKy47GpHz4-M_Vvtq4VG0y1kziGXAWhLZto/edit#gid=1774484974
        try {
            ini_set('memory_limit', '-1');
            //logging----------------
            print "Execute command check:publishandbill" . "\n";
            \Log::info("Execute command check:publishandbill");

            //1. Identify all published properties and join identify the latest property status period(this means the property_period where is_current_status == TRUE )
            $checkPropertyStatus = Property::select('properties.id as id', 'properties.user_id', 'publish.is_current_status', 'publish.publication_status_id', 'publish.remaining_publication_days', 'publish.status_start_date')
                                    ->where('properties.publication_status_id', PropertyPublicationStatus::ID_PUBLISHED)
                                    ->join('property_publication_status_periods as publish', function($join){
                                        $join->on('properties.id', '=', 'publish.property_id');
                                        $join->where('publish.is_current_status', PropertyPublicationStatusPeriod::STATUS_TRUE);
                                        $join->where('publish.publication_status_id', PropertyPublicationStatus::ID_PUBLISHED);
                                    })
                                    ->with('user.company')
                                    ->get();

            //2. Calculate the remaining days for each property.*
            foreach ($checkPropertyStatus as $property) {
                //separator log for easier reading log
                print "------------------------------------------------------------ \n";
                \Log::info("------------------------------------------------------------");

                //get date difference Calculate the remaining days for each property
                $today = Carbon::now()->format('Y/m/d');
                $startDate = Carbon::parse($property->status_start_date);
                $dateDiff = $startDate->diffInDays($today, false) + 1;
                $remainingDay = ($property->remaining_publication_days) - ($dateDiff) + 1;

                //logging----------------
                print "processing calculate for properties id " . $property->id . ": (".$property->remaining_publication_days.") - (".$today." - ".$startDate.") ".$dateDiff." +1 = ".$remainingDay."days \n";
                \Log::info("processing calculate for properties id " . $property->id . ": (".$property->remaining_publication_days.") - (".$today." - ".$startDate.") ".$dateDiff." +1 = ".$remainingDay."days");

                //3. IF the remaining days is less than or equal to 0:
                if($remainingDay <= 0){
                    //logging----------------
                    print "properties " . $property->id . " is less than or equal to 0, continue checking points \n";
                    \Log::info("properties " . $property->id . " is less than or equal to 0, continue checking points");

                    //check company point first
                    $publishCost = ENV('PUBLISH_COST') ? ENV('PUBLISH_COST') : 150; //get publish cost from env, if there isn't any charge default by 150
                    $findCompany = Company::where('id', $property->user->belong_company_id)->first();
                    $companyPoint = $findCompany ? $findCompany->remaining_points : 0;
                    print "companies " . $property->user->belong_company_id . " points is : ".$companyPoint."\n";
                    \Log::info("companies " . $property->user->belong_company_id . " points is : ".$companyPoint);

                    //Condition A. If that company has points >= $cost_to_publish: 
                    if($companyPoint>=$publishCost){
                        print "companies has enough point, spend those point to pay the bill \n";
                        \Log::info("companies has enough point, spend those point to pay the bill ");

                        //Spend those points and update the property status periods log
                        //i. Reduce companies.remaining_points by  $cost_to_publish 
                        $companyPointRemaining = $companyPoint - $publishCost;

                        //ii. Add new property status period: proeprty_publication_status_period.remaining_days = 30, status = PUBLISHED, status_start_date= current date:
                        //iii. Disable old property status period: set status_end_date to current time. Set is_current_status to FALSE/0 
                        $updateCompanyPublish = $this->updateCompanyPublish($property->id, 30, PropertyPublicationStatus::ID_PUBLISHED);

                        //update remainig points in table if success
                        if($updateCompanyPublish){
                            //update the company data
                            $dataUpdate['remaining_points'] = $companyPointRemaining;
                            $findCompany->update($dataUpdate);

                            //logging
                            print "udpated companies point : " . $companyPointRemaining . " Remaining \n";
                            \Log::info("udpated companies point : " . $companyPointRemaining . " Remaining");
                        }else{
                            print "there is problem on saving the CompanyPublish table, change not saved \n";
                            \Log::info("there is problem on saving the CompanyPublish table, change not saved");
                        }
                    }

                    //Condition B. If that company has points < $cost_to_publish: try to automatically charge the company by credit card: use the details in the payment_details table to charge to customer 
                    else{
                        //get minus point value first
                        $topUpAmount = $publishCost - $companyPoint;
                        
                        print "companies doesnt have enough point, try to bill company first, billed amount: (".$publishCost."-".$companyPoint.") = ".$topUpAmount." \n";
                        \Log::info("companies doesnt have enough point, try to bill company first, billed amount: (".$publishCost."-".$companyPoint.") = ".$topUpAmount);

                        //check if top up amount meet the minimum amount from stripe
                        if($topUpAmount<100){
                            print "top up amount(".$topUpAmount.") not meet the minimum top up amount, companies will be billed amount: (100), cause of minimum top up of 50cent from stripe \n";
                            \Log::info("top up amount(".$topUpAmount.") not meet the minimum top up amount, companies will be billed amount: (100), cause of minimum top up of 50cent from stripe");
                            $topUpAmount = 100;
                        }

                        //bill the company using STRIPE API
                        $isSuccess = false;
                        try{
                            //check card detail for company first and check for stripe checkout token
                            $continue = false;
                            $companyPayment = CompanyPaymentDetail::where('company_id', $findCompany->id)->first();
                            if($companyPayment && $companyPayment->stripe_checkout_token){
                                $continue = true;
                            }else{
                                $continue = $this->createStripeToken($findCompany->id);
                            }

                            //if all set then bill the company using Stripe
                            if($continue){
                                $companyPaymentUpdated = CompanyPaymentDetail::where('company_id', $findCompany->id)->first();
                                $stripe = new StripeClient(env('STRIPE_SECRET'));
                                $data = $stripe->paymentIntents->create([
                                    "customer" => $findCompany->stripe_customer_id,
                                    "amount" => $topUpAmount,
                                    "currency" => "jpy",
                                    "payment_method" => $companyPaymentUpdated->stripe_checkout_token,
                                    // "payment_method_types " => ['card'],
                                    // "description" => "Test Remaining Points from real estate media"
                                ]);
                                $findCompany->update([
                                    'remaining_points' => $companyPoint + $topUpAmount
                                ]);
                                $isSuccess = true;
                            }
                        } catch(CardException $e){
                            print "Error stripe:".$e->getError()->message." \n";
                            \Log::info("Error stripe:".$e->getError()->message);
                            $isSuccess = false;
                        }

                        //If payment IS successful, then points should be updated by 150: 
                        if($isSuccess){
                            print "Payment Complete, charge company and update companies point \n";
                            \Log::info("Payment Complete, charge company and update companies point");
                            //Spend those points and update the property status periods log
                            //i. Reduce companies.remaining_points by  $cost_to_publish 
                            $companyPointRemaining = ($companyPoint + $topUpAmount) - $publishCost;

                            //ii. Add new property status period: proeprty_publication_status_period.remaining_days = 30, status = PUBLISHED, status_start_date= current date:
                            //iii. Disable old property status period: set status_end_date to current time. Set is_current_status to FALSE/0 
                            $updateCompanyPublish = $this->updateCompanyPublish($property->id, 30, PropertyPublicationStatus::ID_PUBLISHED);

                            //update remainig points in table if success
                            if($updateCompanyPublish){
                                //update the company data
                                $dataUpdate['remaining_points'] = $companyPointRemaining;
                                $findCompany->update($dataUpdate);

                                //logging
                                print "udpated companies point : " . $companyPointRemaining . " Remaining \n";
                                \Log::info("udpated companies point : " . $companyPointRemaining . " Remaining");
                            }else{
                                print "there is problem on saving the CompanyPublish table, change not saved \n";
                                \Log::info("there is problem on saving the CompanyPublish table, change not saved");
                            }
                        }
                        //If payment is not successful, then set the property to NOT_PUBLISHED and update the property status periods log:
                        else{
                            print "Payment Failed, company point not updated \n";
                            \Log::info("Payment Failed, company point not updated");

                            // then set the property to NOT_PUBLISHED and update the property status periods log:  
                            $this->updateCompanyPublish($property->id, 0, PropertyPublicationStatus::ID_NOT_PUBLISHED);
                        }
                    }
                }

                //4. IF the remaining days is equal to 1: Send a warning email to the customer.
                elseif($remainingDay === 1){
                    //logging----------------
                    print "Sending Email to customer: " . $property->user->email . "\n";
                    print "Please wait ....... \n";
                    \Log::info("Sending Email to customer: " . $property->user->email );

                    //Send a warning email to the customer.
                    $content = new \stdClass();
                    $content->user_name                 = $property->user->display_name;
                    $content->property_detail_page      = route('company.property.edit', $property->id);
                    $content->payment_page              = route('company.payment.edit');

                    $developerEmail = env('BCC_PROPERTY_INQUIRY');
                    $developerEmail ?
                            Mail::to($property->user->email)->bcc($developerEmail)->send(new WarningCompanyFailToPayToRenewProperty($content))
                            : Mail::to($property->user->email)->send(new WarningCompanyFailToPayToRenewProperty($content));
                    print "Email send success! \n";
                }

                //5. IF the remaining days is greater than 1: skip that property. 
                else{
                    //logging----------------
                    print "skip properties " . $property->id . " remaining days is greater than 1 \n";
                    \Log::info("skip properties " . $property->id . " remaining days is greater than 1");
                    continue;
                }
            }

        } catch (\Exception $e) {
            throw $e;
            //logging----------------
            \Log::info("Error Stopping check:publishandbill Command" . $today . print_r($e, true));
            sendMessageOfErrorReport("Error Stopping check:publishandbill Command at".$today, $e);
        }
    }

    //update company publish database
    public function updateCompanyPublish($propertyId, $remainingPublicationDay, $publicationStatusId){
        try{
            \DB::beginTransaction();
            $property = Property::find($propertyId);
    
            //update property publication_status_id based on condition
            $property->update([
                'publication_status_id' => $publicationStatusId,
            ]);
            
            //get previous value in PropertyPublicationStatusPeriod table
            $previous_period = PropertyPublicationStatusPeriod::where('property_id', $propertyId)->where('is_current_status', 1)->first();
    
            //ii. Add new property status period: proeprty_publication_status_period.remaining_days = 30, status = PUBLISHED, status_start_date= current date:
            $property_period = new PropertyPublicationStatusPeriod();
            $property_period->property_id = $propertyId;
            $property_period->status_start_date = Carbon::now()->format("Y-m-d");
            $property_period->status_end_date = null;
            $property_period->is_current_status = true;
            $property_period->remaining_publication_days = $remainingPublicationDay;
            $property_period->publication_status_id = $publicationStatusId;
            $property_period->save();
            
            //if there is previous value on PropertyPublicationStatusPeriod table then set it status to false
            if($previous_period){
                //iii. Disable old property status period: set status_end_date to current time. Set is_current_status to FALSE/0 
                if($property_period){
                    $previous_period->update([
                        'status_end_date' => Carbon::now()->format("Y-m-d"),
                        'is_current_status' => false
                    ]);
                }
            }

            //if all is good then commit all changes
            \DB::commit();

            //logging to console and log
            $stat = $publicationStatusId==1 ? 'UNPUBLISHED': 'PUBLISHED';
            print "udpated companies publish remaining : ".$remainingPublicationDay." publication day and status become ".$stat.", and disabled old status period \n";
            \Log::info("udpated companies publish remaining  : ".$remainingPublicationDay." publication day and status become ".$stat.", and disabled old status period");
            
            //return the result
            return true;
        } catch (\Exception $e) {
            //if there is some problem then rollback the save
            \DB::rollback();

            //logging to console and log
            print "failed update companies:".$propertyId."\n";
            \Log::info("failed update companies:".$propertyId);

            //return the result
            return false;
        }
    }

    //create checkout token if user company doesnt have any yet
    public function createStripeToken($idCompany){
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        try{
            //get current company
            $company = Company::find($idCompany);
            $companyAdmin = Admin::find($company->company_admin_id);
            $companyPaymentDetail = CompanyPaymentDetail::where('company_id', $idCompany)->first();

            $token = null;
            if($companyPaymentDetail){
                // create token
                $cardExp = explode('-', $companyPaymentDetail['card_expires_at']);
                $expMonth = $cardExp[1];
                $expYear = $cardExp[0];
                $token = $stripe->tokens->create([
                    'card' => [
                        'number' => $companyPaymentDetail['card_number'],
                        'exp_month' => $expMonth,
                        'exp_year' => $expYear,
                        'cvc' => $companyPaymentDetail['card_security_number'],
                        'name' => $companyPaymentDetail['cardholder_name'],
                    ],
                ]);
            }else{
                //break the condition if company doesnt have any card detail in payment detail page
                print "this companies doesnt have any payment detail card saved \n";
                \Log::info("this companies doesnt have any payment detail card saved");
                return false;
            }

            //create as stripe customer if stripe_customer_id null
            $stripeCustomerId = null;
            if(empty($company['stripe_customer_id'])){
                $customer = $stripe->customers->create([
                    "name" => $companyAdmin->display_name,
                    "email" => $companyAdmin->email,
                    "description" => "User Company Account"
                ]);
                $company->update([
                    'stripe_customer_id' => $customer->id
                ]);
                $stripeCustomerId =  $customer->id;
            }else{
                $stripeCustomerId = $company['stripe_customer_id'];
            }

            // create card
            $card = $stripe->customers->createSource(
                $stripeCustomerId,
                [
                    'source' => $token->id
                ]
            );

            $cardID = $card->id;

            //create setup intent
            $stripe->setupIntents->create([
                'payment_method_types' => ['card'],
                'payment_method' => $cardID,
                'customer' => $stripeCustomerId
            ]);

            $companyPayment = CompanyPaymentDetail::updateOrCreate([
                'company_id' => $idCompany
            ],[
                'subscription_plan_id' => $companyPaymentDetail['subscription_plan_id'],
                'card_number' => $companyPaymentDetail['card_number'],
                'card_security_number' => $companyPaymentDetail['card_security_number'],
                'cardholder_name' => $companyPaymentDetail['cardholder_name'],
                'card_brand' => $companyPaymentDetail['card_brand'],
                'card_expires_at' => $companyPaymentDetail['card_expires_at'],
                'stripe_checkout_token' => $cardID
            ]);

            $companyPayment->update([
                'stripe_checkout_token' => $cardID
            ]);

            //set as default payment method
            $stripe->customers->update(
                $stripeCustomerId,
                [
                    'invoice_settings' => [
                        'default_payment_method' => $cardID
                    ]
                ]);

            return true;

        } catch(CardException $e){
            print "Error stripe:".$e->getError()->message." \n";
            \Log::info("Error stripe:".$e->getError()->message);
            return false;
        }
    }
}
