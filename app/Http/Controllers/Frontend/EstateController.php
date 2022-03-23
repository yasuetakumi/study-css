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

//use for email
use App\Mail\CompanyRegistrationToAdminMail;
use App\Mail\CompanyRegistrationToClientMail;
use Illuminate\Support\Facades\Mail;

//models used
use App\Models\Postcode;
use App\Models\Company;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Admin;

class EstateController extends Controller
{
    use CommonToolsTraits;

    //Company User Registration Page C15
    public function create(Request $request){
        $data = $request->all();
        $data['page_title']     = '会員 （不動産業者） 登録申し込み';
        $data['form_action']    = route('company.confirm');

        // options for vue select 2 options
        $data['prefecture_options']     = Postcode::groupBy('prefecture')->pluck('prefecture', 'prefecture');

        return view('frontend.estate.index', $data);
    }

    //Confirmation Page C16
    public function confirm(Request $request){
        $data = $request->all();
        
        $data['page_title']     = '登録申し込みー内容の確認';
        $data['form_action']    = route('company.store');

        // options for vue select 2 options
        $data['prefecture_options']     = Postcode::groupBy('prefecture')->pluck('prefecture', 'prefecture');

        return view('frontend.estate.confirm', $data);
    }

    //Save to database on C16 and sending Email 3-1 and 3-2
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

            //-----------------------------------------
            //START SENDING EMAIL
            //-----------------------------------------
            //make data for used in email sending body
            $content = new \stdClass();
            $content->company_name          = $dataCompany['company_name'];
            $content->address               = $dataCompany['address'];
            $content->motivation_to_join    = $dataCompany['reason'] == 1 ? '物件を掲載したい' : ($dataCompany['reason'] == 2 ? '客付け物件を閲覧したい' : 'その他');
            $content->company_detail_page   = route('company.register');
            $content->member_name           = $data['users']['display_name'];
            $content->email                 = $dataCompany['email'];
            $content->phone                 = $dataCompany['phone'];

            //send email To all admin 3-1
            $adminEmailList = Admin::pluck('email')->toArray();
            
            //send with bcc if BCC_PROPERTY_INQUIRY is provided in ENV
            if(env('BCC_PROPERTY_INQUIRY')){
                $bccEmail = env('BCC_PROPERTY_INQUIRY');
                Mail::to($adminEmailList)->bcc($bccEmail)->send(new CompanyRegistrationToAdminMail($content));
            }else{
                Mail::to($adminEmailList)->send(new CompanyRegistrationToAdminMail($content));
            }

            //END SEND EMAIL TO ADMIN 3-1
            //-----------------------------------------
            //send email to registered user 3-2
            //send with bcc if BCC_PROPERTY_INQUIRY is provided in ENV
            if(env('BCC_PROPERTY_INQUIRY')){
                $bccEmail = env('BCC_PROPERTY_INQUIRY');
                Mail::to($dataCompany['email'])->bcc($bccEmail)->send(new CompanyRegistrationToClientMail($content));
            }else{
                Mail::to($dataCompany['email'])->send(new CompanyRegistrationToClientMail($content));
            }
             //if mail failed then dont save data and return error
             if (Mail::failures()) {
                // return failed mails
                $response->status = "false";
                return response()->json($response, 201); 
            }
            //END SEND EMAIL TO ADMIN 3-1
            //-----------------------------------------
            //END SENDING EMAIL
            //-----------------------------------------

            //if everything is fine then save data
            \DB::commit();

            //send success response
            $response->status = 'success';
            return response()->json($response, 200);
        }catch(Exception $e) {
            //send failure response
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
