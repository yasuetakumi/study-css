<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Company;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\CompanyPaymentDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\type;

class CompanyPaymentController extends Controller
{
    protected function validator( array $data, $type ){
        return Validator::make($data, [
            'subscription_plan_id'       => 'required',
            'card_number'                => 'required|between:12,19',
            'card_security_number'       => 'required|between:3,7',
            'card_holder_name'            => 'required',
            'card_brand'                 => 'required',
            'card_year_expire_at'        => 'required',
            'card_month_expire_at'       => 'required'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $idCompany = Auth::guard('user')->user()->belong_company_id;
        $company = CompanyPaymentDetail::where('company_id', $idCompany)->first();
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $data['customer'] = $stripe->customers->retrieve(
            $company->stripe_checkout_token, []
        );


        return view('backend.company.payment_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $idCompany = Auth::guard('user')->user()->belong_company_id;
        $companyPayment = CompanyPaymentDetail::where('company_id', $idCompany)->first();

        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $data = $stripe->paymentIntents->create([
            "customer" => $companyPayment->stripe_customer_id,
            "amount" => $request->point_charge,
            "currency" => "jpy",
            "payment_method" => $companyPayment->stripe_checkout_token,
            // "payment_method_types " => ['card'],
            // "description" => "Test Remaining Points from real estate media"
        ]);
        $company = Company::find($idCompany);
        $company->update([
            'remaining_points' => $company->remaining_points + $request->point_charge
        ]);
        // return response()->json($data);

        return redirect()->back()->with('success', __('label.SUCCESS_CREATE_MESSAGE'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $idCompany = Auth::guard('user')->user()->belong_company_id;
        $data['company'] = Company::with(['company_payment_detail'])->find($idCompany);

        $data['page_title'] = __('label.edit_company_payment_details');

        $data['page_type_detail'] = 'edit';
        $data['form_action_detail'] = route('company.payment.update');

        $data['page_type_charge'] = 'create';
        $data['form_action_charge'] = route('company.payment.store');

        $data['subscription_plan'] = SubscriptionPlan::all()->pluck('label_jp', 'id');
        $data['company_month_expire'] = isset($data['company']->company_payment_detail->card_expires_at) ? $data['company']->company_payment_detail->card_expires_at->format('m') : '';
        $data['company_year_expire'] = isset($data['company']->company_payment_detail->card_expires_at) ? $data['company']->company_payment_detail->card_expires_at->format('Y') : '';

        $months = array(); //get all months
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::parse('2022-12-01')->startOfMonth()->subMonth($i);
            array_push($months, array(
                'label' => $month->shortMonthName,
                'value' => $month->format("m")

            ));
        }
        $years = array(); //list year now + 20 years later
        for ($j = 0; $j <= 20; $j++) {
            $year = Carbon::now()->addYears($j);
            array_push($years, array(
                'label' => $year->format('Y') . '年',
                'value' => $year->format('Y')
            ));
        }
        $points = array();
        for($k = 0; $k <= 1000; $k = $k+50){
            array_push($points, array(
                'label' => $k,
                'value' => $k
            ));
        }
        $data['years'] = $years;
        $data['months'] = $months;
        $data['points'] = $points;
        // return $data;
        return view('backend.company.payment_detail', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $idCompany = Auth::guard('user')->user()->belong_company_id;
        $this->validator($data, 'update')->validate();

        $date = $data['card_year_expire_at'] . '-' . $data['card_month_expire_at'] . '-' . '01';
        $cardExpireAt = Carbon::parse($date)->format("Y-m-d");

        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $dataCustomer = array();
        $company = CompanyPaymentDetail::updateOrCreate([
            'company_id' => $idCompany
        ],[
            'subscription_plan_id' => $data['subscription_plan_id'],
            'card_number' => $data['card_number'],
            'card_security_number' => $data['card_security_number'],
            'cardholder_name' => $data['card_holder_name'],
            'card_brand' => $data['card_brand'],
            'card_expires_at' => $cardExpireAt,
        ]);

        //create as stripe customer if stripe_customer_id null
        if(empty($company->stripe_customer_id)){
            $customer = $stripe->customers->create([
                "name" => Auth::guard("user")->user()->display_name,
                "email" => Auth::guard("user")->user()->email,
                "description" => "User Company"
            ]);
            $company->update([
                'stripe_customer_id' => $customer->id
            ]);
            //get again after update stripe_customer_id
            $dataCustomer = CompanyPaymentDetail::where('stripe_customer_id', $customer->id)->first();
        } else {
            $dataCustomer = CompanyPaymentDetail::where('stripe_customer_id', $company->stripe_customer_id)->first();
        }
        // create payment method,
        $payment = $stripe->paymentMethods->create([
            'type' => 'card',
            'card' => [
                'number' => $data['card_number'],
                'exp_month' => $request->card_month_expire_at,
                'exp_year' => $request->card_year_expire_at,
                'cvc' => $data['card_security_number'],
            ],
            'billing_details' => [
                'name' => $data['card_holder_name']
            ]
        ]);

        //add payment method to stripe
        $method = $stripe->paymentMethods->attach(
            $payment->id,[
                "customer" =>  $dataCustomer['stripe_customer_id'] //add to customer
            ]
        );
        //update payment method token id
        $company->update([
            'stripe_checkout_token' => $method->id
        ]);
        //set as default payment method
        $stripe->customers->update(
            $dataCustomer['stripe_customer_id'],
            [
                'invoice_settings' => [
                    'default_payment_method' => $method->id
                ]
            ]);

        // return response()->json($method);
        return redirect()->back()->with('success', __('label.SUCCESS_UPDATE_MESSAGE'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
