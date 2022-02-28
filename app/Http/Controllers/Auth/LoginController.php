<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\LogActivityTrait;
use App\Models\AdminRole;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
    protected $redirectTo = '/admin/admins';

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(){
        // $this->middleware('guest')->except('logout');
    }

    protected function loggedOut(Request $request) {
        return redirect('/admin/login');
    }

    protected function showAdminLoginForm(Request $request){
        // Get the url that user want to access before login
        session(['targetURL' => url()->previous()]);

        // Admin user try to access login form
        if (auth()->guard('web')->check()) {
            // Redirection based on admin role
            if (Auth::guard('web')->user()->admin_role_id == AdminRole::ROLE_SUPER_ADMIN)
                return redirect()->route('admin.property.index');
            elseif (Auth::guard('web')->user()->admin_role_id == AdminRole::ROLE_COMPANY_ADMIN)
                return redirect()->route('admin.company.user.index', Auth::guard('web')->user()->company->id);
        }

        // Company user try to access admin route
        if (auth()->guard('user')->check()) {
            return view('auth.login');
        }

        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        $this->saveLog('User login succeed', 'Email = ' . $user->email . ', User Name = ' . $user->display_name, $user->id);

        // Set target url
        if (Auth::guard('web')->user()->admin_role_id == AdminRole::ROLE_SUPER_ADMIN)
            $targetURL = session('targetURL') == route('login') ? route('admin.property.index') : session('targetURL');
        elseif (Auth::guard('web')->user()->admin_role_id == AdminRole::ROLE_COMPANY_ADMIN)
            $targetURL = route('admin.company.user.index', Auth::guard('web')->user()->company->id);

        // Remove session
        session()->forget('targetURL');

        // Logging out company user, now user will login as admin
        Auth::guard('user')->logout();

        return redirect($targetURL);
    }
}
