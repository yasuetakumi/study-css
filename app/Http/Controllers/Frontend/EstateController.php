<?php

namespace App\Http\Controllers\Frontend;

use stdClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Select2AjaxHelper;
use App\Traits\CommonToolsTraits;
use Illuminate\Support\Str;

//models used
use App\Models\Postcode;
use App\Models\Company;
use App\Models\User;
use App\Models\UserRole;

class EstateController extends Controller
{
    use CommonToolsTraits;

    public function create(Request $request){
        $data = $request->all();
        $data['page_title']     = '会員 （不動産業者） 登録申し込み';
        $data['form_action']    = route('company.store');

        // options for vue select 2 options
        $data['prefecture_options']     = Postcode::groupBy('prefecture')->pluck('prefecture', 'prefecture');

        return view('frontend.estate.index', $data);
    }

    public function confirm(Request $request){
        $data = $request->all();
        
        $data['page_title']     = '登録申し込みー内容の確認';
        $data['form_action']    = route('company.store');

        // options for vue select 2 options
        $data['prefecture_options']     = Postcode::groupBy('prefecture')->pluck('prefecture', 'prefecture');

        return view('frontend.estate.confirm', $data);
    }

    public function store(Request $request){
        $data = $request->all();
        $response = new \stdClass;
        
        \DB::beginTransaction();
        try {
            //insert into companies table
            $Company = new Company();
            $dataCompany = $data['companies'];
            $dataCompany['status'] = "pending";
            $dataCompany['company_name'] = $data['companies']['name'];
            $dataCompany['company_name_kana'] = $data['companies']['name_kana'];
            $dataCompany['address'] = $data['companies']['prefecture'].$data['companies']['city'].$data['companies']['area_number'].$data['companies']['name_building'];
            $Company->fill($dataCompany)->save();

            //insert into users table
            $User = new User();
            $dataUser['display_name'] = $data['users']['display_name'];
            $dataUser['user_role_id'] = UserRole::ROLE_SUPERVISOR;
            $dataUser['belong_company_id'] = $Company->id;
            $dataUser['email'] = $dataCompany['email'];
            $dataUser['password'] = \Hash::make(Str::random(10));
            $User->fill($dataUser)->save();

            \DB::commit();

            $response->status = 'success';
            return response()->json($response, 200);
        }catch(Exception $e) {
            \DB::rollback();
            $response->status = 'false';
            return response()->json($response, 201);
        }
    }

    //check email exist for validation
    public function check_email(Request $request){
        $response = "success";
        $check = User::where('email', '=', $request->email)->whereNull('deleted_at')->exists();
        
        if($check){
            return response()->json($response, 405);
        }
        return response()->json($response, 200);   
    }
}
