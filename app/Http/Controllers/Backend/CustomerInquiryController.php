<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\CustomerInquiry;
use App\Helpers\DatatablesHelper;
use App\Http\Controllers\Controller;
use App\Mail\CustomerInquiryMail;
use App\Models\ContactUsType;
use App\Models\Property;
use Illuminate\Support\Facades\Mail;

class CustomerInquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Customer Inquiry List';
        return view('backend.customer_inquiry.index', $data);
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
        $request->validate([
            'name'=> 'required|max:45',
            'email'=> 'required|email',
            'text' => 'required',
        ]);
        $data = $request->all();
        $subject = ContactUsType::find($request->contact_us_type_id);
        $company = Property::with('user')->find($request->property_id);
        $company_user_email = $company->user->email;
        $data['company_name'] = $company->user->company->company_name;
        $data['subject'] = $subject->label_jp;
        $inquiry = new CustomerInquiry();
        $inquiry->fill($data)->save();
        Mail::to($company_user_email)->send(new CustomerInquiryMail($data));

        return redirect()->back()->with('success', __('label.SUCCESS_CREATE_MESSAGE'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($param)
    {
        if( $param == 'json' ){

            $model = CustomerInquiry::with(['property', 'contact_us_type']);
            return (new DatatablesHelper)->instance($model)
                                            ->filterColumn('property.id', function($query, $keyword){
                                                $query->whereHas('property', function($q) use ($keyword){
                                                    $q->where('id', 'like', '%'.$keyword.'%');
                                                });
                                            })
                                            ->filterColumn('contact_us_type.label_en', function($query, $keyword){
                                                $query->whereHas('contact_us_type', function($q) use ($keyword){
                                                    $q->where('label_en', 'like', '%'.$keyword.'%');
                                                });
                                            })
                                            ->toJson();

        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inquiry = CustomerInquiry::find($id);
        $inquiry->delete();

        // return redirect()->route('inquiry.index')->with('success', __('label.SUCCESS_DELETE_MESSAGE'));
    }
}
