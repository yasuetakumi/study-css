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

    protected function showRegisterForm()
    {
        return view('auth.register-member');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members',
            'password' => 'required|string|min:6|confirmed:password_confirmation',
        ]);

        $member = Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $this->saveLog('会員登録', 'メールアドレス：' . $request->email . '、ユーザ名：' . $request->name, $member->id);

        auth()->guard('member')->login($member);

        return redirect()->route('home');
    }
}
