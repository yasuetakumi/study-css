<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LpController extends Controller
{
    public function index()
    {
        return view('lp.home.index');
    }

    protected function validator( array $data, $type ){
        return Validator::make($data, [
            'category'      => 'required',
            'email'         => 'required|email',
            'company_name'  => 'required',
            'contact_name'  => 'required',
            'website'       => 'required',
            'phone'         => 'required',
            'description'   => 'required',
            'policy'        => 'required',
        ], [
            'required' => '必須項目です。',
            'email'    => '必須項目です。メールアドレスが正しくありません。',
        ]);
    }

    public function contact(Request $request)
    {
        // $validator = $this->validator($request->all(), 'create');

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $content = array();
        $content['category'] = $request->category;
        $content['email'] = $request->email;
        $content['company_name'] = $request->company_name;
        $content['contact_name'] = $request->contact_name;
        $content['website'] = $request->website ?? '-';
        $content['phone'] = $request->phone;
        $content['description'] = $request->description ?? '-';

        // send email to user
        Mail::to($request->email)->send(new ContactUsMail($content));

        // send email to admin
        Mail::to(config('mail.lp_contact_admin'))->send(new ContactUsMail($content));

        return redirect()->route('lp.thanks');
    }
}
