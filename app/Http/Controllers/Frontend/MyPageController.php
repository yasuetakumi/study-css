<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyPageController extends Controller
{
    public function index()
    {
        $data['item'] = Member::find(auth()->guard('member')->user()->id);
        $data['page_title'] = __('label.member_mypage');
        $data['page_type'] = 'edit';
        $data['form_action'] = route('member.mypage.update');
        $data['notif_statuses'] = [
            Member::ID_DISABLE_NOTIF => Member::ID_DISABLE_NOTIF_LABEL,
            Member::ID_ENABLE_NOTIF => Member::ID_ENABLE_NOTIF_LABEL
        ];
        return view('frontend.member.index', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'nullable',
            'name' => 'required',
            'name_kana' => 'nullable',
            'phone_number' => 'nullable',
            'email' => 'required|email|unique:members,email,' . auth()->guard('member')->user()->id,
            'password' => 'nullable|min:8',
            'line_id' => 'nullable',
            'is_line_notification_enabled' => 'nullable',
            'is_email_notification_enabled' => 'nullable',
        ]);

        $data = $request->all();
        $member = Member::find(auth()->guard('member')->user()->id);
        if($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }
        $member->update($data);

        return redirect()->back()->with('success', __('label.SUCCESS_UPDATE_MESSAGE'));
    }
}
