<?php

use App\Models\User;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

// Auth::routes();
// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');


You can registered routing by this command.
> php artisan route:list


*/

Route::group(['middleware' => ['multi_lang','auth.very_basic']], function() { // start basic auth protection

    Route::get('/', function(){
        return view('welcome');
    })->middleware('guest');

    Route::get('/auth-check', function(){
        dd(Auth::guard("web")->check());
        //dd(Auth::guard("user")->user()->toArray());
    });

    // Authentication Routes...
    Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/admin/login', 'Auth\LoginController@login');

    Route::get('/login', 'Auth\CompanyUserLoginController@showLoginForm')->name('company-user-login');
    Route::post('/login', 'Auth\CompanyUserLoginController@login')->name('company-user-login-action');;

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    // Email Verification Routes...
    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

    /*
    |------------------------------------------------------------------
    | Route groups backend
    |------------------------------------------------------------------
    */

    /**
     * Administrator login.
     */
    Route::get('setlanguage/{language}', 'Backend\LanguageController@SetLanguage')->name('setlanguage');
    Route::group(['middleware' => 'auth:web'], function(){
        // Route::get('dashboard', function(){ return "@TODO: Create simple dashboard contained count and simple chart"; })->name('dashboard');
        Route::get('dashboard', 'Backend\DashboardController@index')->name('dashboard');

        Route::get('admin/logout', 'Auth\LoginController@logout')->name('admin.logout');
        Route::namespace('Backend')->prefix('admin')->name('admin.')->group(function(){
            //------------------------------------------------------------------
            // Only super admin group
            //------------------------------------------------------------------
            Route::group(['middleware' => ['role:super_admin']], function(){
                Route::resource('superadmin', 'SuperAdminController');

                Route::resource('log-superadmin-activities', 'LogSuperAdminActivityController')->only(['index', 'show']);

                Route::resource('log-admin-activities', 'LogAdminActivityController')->only(['index', 'show']);

                Route::resource('log-user-activities', 'LogUserActivityController')->only(['index', 'show']);

                Route::resource('log-user-fail', 'LogUserFailController')->only(['index', 'show']);

                Route::resource('company', 'CompanyController');

                Route::resource('property', 'PropertyController')->except('detail');
            });
            //------------------------------------------------------------------
            // Sharing for super admin and company admin
            //------------------------------------------------------------------
            Route::group(['middleware' => ['role:super_admin,company_admin']], function(){
                Route::resource('company', 'CompanyController')->only(['index', 'update', 'show', 'edit']);

                // Laravel handle as nested resource if separated "." (dot)
                // Ex: company/{parent_id}/user/{child_id}/
                //     -> first arg: {parent_id} , second arg: {child_id} on Controller.
                Route::resource('company.user', 'UserController');

                Route::resource('user', 'UserMasterController');
            });

            //------------------------------------------------------------------
            // Sharing for super admin and admin
            //------------------------------------------------------------------
            Route::group(['middleware' => ['role:super_admin,admin']], function(){
                Route::resource('admins', 'AdminController');
                Route::resource('news', 'NewsController');
                Route::resource('features', 'FeaturesController');

            });

        });
    });

    /**
     * Company User (B Module)
     */
    Route::group(['middleware' => 'auth:user'], function() {

        Route::get('logout', 'Auth\CompanyUserLoginController@logout')->name('logout');
        Route::group(['middleware' => ['user_role:supervisor,operator'], 'prefix' => 'manage'], function () {
            // B2
            Route::get('account', 'Backend\UserController@editAsUserOwner')->name('userowner-edit');
            Route::post('account', 'Backend\UserController@updateAsUserOwner')->name('userowner-update');
            // B3 - B5
            Route::resource('company', 'Backend\PropertyController');
            // B6
            Route::get('company-information', 'Backend\CompanyController@editAsCompanyOwner')->name('companyowner-edit');
            Route::put('company-information', 'Backend\CompanyController@updateAsCompanyOwner')->name('companyowner-update');
            // B7
            Route::resource('inquiry', 'Backend\CustomerInquiryController')->except('detail');
        });
    });

    // End User (C Module)
    // C4
    Route::get('property/properties/{id}', 'Backend\PropertyController@detail')->name('property.detail');
    // C4
    Route::post('/inquiry', 'Backend\CustomerInquiryController@store')->name('enduser.inquiry.store');
    // C2
    Route::get('restaurant', 'Backend\RestaurantController@index')->name('restaurant.index');
    Route::post('restaurant', 'Backend\RestaurantController@filter')->name('restaurant.filter');
    // C3
    Route::get('map', function () {
        return 'map';
    });
    // C5
    Route::get('favorite', function () {
        return 'favorite';
    });
    // C6
    Route::get('history', function () {
        return 'history';
    });
    // C7
    Route::get('company', function(){
        return 'Company List';
    });
    // C8
    Route::get('company/id', function(){
        return 'Company Show';
    });


});
