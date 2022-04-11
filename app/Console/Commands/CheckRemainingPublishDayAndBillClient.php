<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// -----------------------------------------------------------------------------
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\WarningCompanyFailToPayToRenewProperty;
// -----------------------------------------------------------------------------
use App\Models\Company;
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

            //print "property found: ". json_encode($checkPropertyStatus) . "\n";
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
                        //Spend those points and update the property status periods log
                        //i. Reduce companies.remaining_points by  $cost_to_publish 
                        $companyPointRemaining = $companyPoint - $publishCost;
                        //update the company data
                        $dataUpdate['remaining_points'] = $companyPointRemaining;
                        $findCompany->update($dataUpdate);
                        
                        print "udpated companies point : " . $companyPointRemaining . " Remaining \n";
                        \Log::info("udpated companies point : " . $companyPointRemaining . " Remaining");

                        //ii. Add new property status period: proeprty_publication_status_period.remaining_days = 30, status = PUBLISHED, status_start_date= current date:
                        //iii. Disable old property status period: set status_end_date to current time. Set is_current_status to FALSE/0 
                        $this->updateCompanyPublish($property->id, 30, PropertyPublicationStatus::ID_PUBLISHED);

                    }

                    //Condition B. If that company has points < $cost_to_publish: try to automatically charge the company by credit card: use the details in the payment_details table to charge to customer 

                        //If payment is not successful, then set the property to NOT_PUBLISHED and update the property status periods log:

                        //If payment IS successful, then points should be updated by 150: 
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
                    $content->payment_page              = route('company.payment.edit', $property->user_id);

                    $developerEmail = env('BCC_PROPERTY_INQUIRY');
                    //$developerEmail ?
                    //        Mail::to($property->user_email)->bcc($developerEmail)->send(new WarningCompanyFailToPayToRenewProperty($content))
                    //        : Mail::to($property->user_email)->send(new WarningCompanyFailToPayToRenewProperty($content));
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

    public function updateCompanyPublish($propertyId, $remainingPublicationDay, $publicationStatusId){
        try{
            \DB::beginTransaction();
            $property = Property::find($propertyId);
    
            $property->update([
                'publication_status_id' => $publicationStatusId,
            ]);
            
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
    
            if($previous_period){
                //iii. Disable old property status period: set status_end_date to current time. Set is_current_status to FALSE/0 
                if($property_period){
                    $previous_period->update([
                        'status_end_date' => Carbon::now()->format("Y-m-d"),
                        'is_current_status' => false
                    ]);
                }
            }
            \DB::commit();
            print "udpated companies publish remaining : 30 publication day and status become PUBLISHED, and disabled old status period \n";
            \Log::info("udpated companies publish remaining  : 30 publication day and status become PUBLISHED, and disabled old status period");
            
            return true;
        } catch (\Exception $e) {
            \DB::rollback();
            print "failed update companies:".$propertyId."\n";
            \Log::info("failed update companies:".$propertyId);
            return false;
        }
        
    }
}
