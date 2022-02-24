<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\LogActivityTrait;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyUserLoginController extends Controller
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
    protected $redirectTo = '/user';

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(){
        // $this->middleware('guest')->except('logout');
    }

    protected function loggedOut(Request $request) {
        return redirect()->route('company-user-login');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('user');
    }

    public function guard()
    {
        return auth()->guard('user');
    }

    protected function showLoginForm(Request $request){
        // Company user try to access login page
        if (auth()->guard('user')->check()) {
            return redirect()->route('company.property.index');
        }

        // Admin user try to access company route
        if (auth()->guard('web')->check()) {
            return view('auth.login-company-user');
        }

        return view('auth.login-company-user');
    }

    protected function login(Request $request)
    {
        if (auth()->guard('user')->attempt(['email' => $request->email, 'password' => $request->password ])) {
            $this->saveLog('User login succeed', 'Email = ' . $request->email . ', User Name = ' . auth()->guard('user')->user()->display_name, auth()->guard('user')->user()->id);

            // Logging gout admin user, now user will be login as company user
            Auth::guard('web')->logout();

            return redirect()->route('company.property.index');
        }
        $this->saveLog('User login fail', 'Email = ' . $request->email . ', Password = ' . $request->password);
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }
}
