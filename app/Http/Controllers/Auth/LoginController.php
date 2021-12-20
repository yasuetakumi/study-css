<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\LogActivityTrait;
use App\Models\AdminRole;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
        $this->middleware('guest')->except('logout');
    }

    protected function loggedOut(Request $request) {
        return redirect('/admin/login');
    }

    protected function authenticated(Request $request, $user)
    {
        $this->saveLog('User login succeed', 'Email = ' . $user->email . ', User Name = ' . $user->display_name, $user->id);
        // \Log::debug('authenticated admin_role_id:'.$user->admin_role_id);
        // Customize default page each role.
        switch ($user->admin_role_id){
            case AdminRole::ROLE_SUPER_ADMIN:
                return redirect()->route('admin.superadmin.index');
            case AdminRole::ROLE_GENERAL_ADMIN:
                return redirect()->route('admin.news.index');
            case AdminRole::ROLE_COMPANY_ADMIN:
                return redirect()->route('admin.company.user.index', $user->company->id);
            default:
                return redirect('/dashboard');
        }
    }
}
