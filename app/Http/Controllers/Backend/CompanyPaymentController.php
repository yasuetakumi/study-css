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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data['page_type'] = 'edit';
        $data['form_action'] = route('company.payment.update');
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
        $data['years'] = $years;
        $data['months'] = $months;
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
        try{
            CompanyPaymentDetail::updateOrCreate([
                'company_id' => $idCompany
            ],[
                'subscription_plan_id' => $data['subscription_plan_id'],
                'card_number' => $data['card_number'],
                'card_security_number' => $data['card_security_number'],
                'cardholder_name' => $data['card_holder_name'],
                'card_brand' => $data['card_brand'],
                'card_expires_at' => $cardExpireAt,
            ]);
        } catch( \Exception $e){
            return redirect()->back()->with('errors', __('label.FAILED_UPDATE_MESSAGE'));
        }
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
