<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\CustomerInquiry;
use App\Helpers\DatatablesHelper;
use App\Http\Controllers\Controller;
use App\Models\ContactUsType;

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
        $data = $request->all();
        $inquiry = new CustomerInquiry();
        $inquiry->fill($data)->save();

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
        //
    }
}
