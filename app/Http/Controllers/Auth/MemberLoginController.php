<?php

namespace App\Http\Controllers\Auth;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Traits\LogActivityTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class MemberLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, LogActivityTrait;

    /**
     * Where to redirect users after login.
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(){
        // $this->middleware('guest')->except('logout');
    }

    protected function loggedOut(Request $request) {
        return redirect()->route('home');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('home');
    }

    public function guard()
    {
        return auth()->guard('member');
    }

    protected function showLoginForm(Request $request){

        // Member loggedin try to access login page
        if (auth()->guard('member')->check()) {
            // redirect to home
            return redirect()->route('home');
        }

        // Company user try to access login page
        if (auth()->guard('user')->check()) {
            return view('auth.login-member-user');
        }

        // Admin user try to access company route
        if (auth()->guard('web')->check()) {
            return view('auth.login-member-user');
        }

        return view('auth.login-member-user');
    }

    protected function showRegisterForm(Request $request)
    {
        $data['item'] = $request->all();
        $data['page_title'] = __('label.member_registration');
        $data['form_action'] = route('member-register-confirm');
        $data['page_type'] = 'create';
        $data['isConfirmPage'] = false;
        $data['notif_statuses'] = [
            Member::ID_DISABLE_NOTIF => Member::ID_DISABLE_NOTIF_LABEL,
            Member::ID_ENABLE_NOTIF => Member::ID_ENABLE_NOTIF_LABEL
        ];
        return view('auth.register-member', $data);
    }

    protected function confirmRegistration(Request $request)
    {
        $request->validate([
            'company_name' => 'nullable',
            'name' => 'required',
            'name_kana' => 'nullable',
            'phone_number' => 'nullable|min:11|max:13',
            'email' => 'required|email|unique:members,email',
            'password' => 'required|min:8',
            'is_email_notification_enabled' => 'nullable',
        ]);

        $data['item'] = $request->all();
        $data['isConfirmPage']  = true;
        $data['page_title']     = __('label.member_registration_confirm');
        $data['form_action']    = route('member-register-create');
        $data['page_type']      = 'create';
        $data['notif_statuses'] = [
            Member::ID_DISABLE_NOTIF => Member::ID_DISABLE_NOTIF_LABEL,
            Member::ID_ENABLE_NOTIF => Member::ID_ENABLE_NOTIF_LABEL
        ];

        return view('auth.register-member', $data);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'nullable',
            'name' => 'required',
            'name_kana' => 'nullable',
            'phone_number' => 'nullable|min:11|max:13',
            'email' => 'required|email|unique:members,email',
            'password' => 'required|min:8',
            'is_email_notification_enabled' => 'nullable',
        ]);
        $data['password'] = bcrypt($data['password']);
        $member = Member::create($data);

        return response()->json([
            'status' => 'success',
            'message' => __('label.member_registration_success'),
        ]);

        // $this->saveLog('会員登録', 'メールアドレス：' . $request->email . '、ユーザ名：' . $request->name, $member->id);

        // auth()->guard('member')->login($member);

        // return redirect()->route('home');
    }
}
