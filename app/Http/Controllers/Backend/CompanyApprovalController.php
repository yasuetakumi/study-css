<?php

namespace App\Http\Controllers\Backend;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Helpers\DatatablesHelper;
use App\Http\Controllers\Controller;

class CompanyApprovalController extends Controller
{

    /**
     * @param string parameter - url of custom resources page
     *
     * @return string - Any
     *
     * [AJax from Data Table : Defined "DataTable(..." method on backend/_base/content_datatables.blade.php ]
     * You may add custom page/api/route, this wrapped middleware as well
     */
    public function show($param)
    {
        if( $param == 'json' ){
            $model = Company::where('status', Company::PENDING);
            return (new DatatablesHelper)->instance($model, false, false, true)->toJson();

        }
        // abort(404);
        $id = $param;
        $data['item']           = Company::with('admin')->where('companies.id', $id)->first();

        $data['page_title']     = __('label.edit') . __('label.company_approval_list');
        $data['form_action']    = route('admin.approval.update', $id);
        $data['page_type']      = 'edit';

        return view('backend.company.form', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = __('label.company_approval_list');
        $data['filter_select_columns'] = [
            'status' => [
                'pending' => 'pending',
                'active' => 'active',
                'block' => 'block',
            ]
        ];

        return view('backend.company.index', $data);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $company = Company::find($id);
        $data['status'] = Company::ACTIVE;
        $company->update($data);

        return redirect()->route('admin.approval.index')->with('success', __('label.SUCCESS_UPDATE_MESSAGE'));
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
