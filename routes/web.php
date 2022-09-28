<?php

use App\Models\User;
use App\Models\Property;
use Stripe\StripeClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;

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
// check if is productions
if (Config::get('app.env') === 'production') {
    Route::get('/partner','LpController@index')->name('lp.index');
    Route::post('/partner', 'LpController@contact')->name('lp.contact');
    Route::get('/partner/thanks', function(){
        return view('lp.home.thanks');
    })->name('lp.thanks');
    // catch all route except /thanks and /lp01
    Route::get('/{any}',function(){
        return redirect()->route('lp.index');
    })->where('any', '^(?!partner|partner/thanks).*$');
} else {
    Route::group(['middleware' => ['multi_lang','auth.very_basic']], function() { // start basic auth protection

        // Route::get('/', function(){
        //     return view('welcome');
        // })->middleware('guest');

        Route::get('/auth-check', function(){
            return response()->json(
                [
                    'admin' => Auth::guard('web')->check() ? 'true' : 'false',
                    'company' => Auth::guard('user')->check() ? 'true' : 'false',
                    'member' => Auth::guard('member')->check() ? 'true' : 'false',
                ]
            );
        });

        // Authentication Routes...
        Route::get('/admin', function() { return redirect()->route('login'); });
        Route::get('/admin/login', 'Auth\LoginController@showAdminLoginForm')->name('login');
        Route::post('/admin/login', 'Auth\LoginController@login');

        Route::get('/company', function() { return redirect()->route('company-user-login'); });
        Route::get('/company/login', 'Auth\CompanyUserLoginController@showLoginForm')->name('company-user-login');
        Route::post('/company/login', 'Auth\CompanyUserLoginController@login')->name('company-user-login-action');

        Route::get('/login', 'Auth\MemberLoginController@showLoginForm')->name('member-login');
        Route::post('/login', 'Auth\MemberLoginController@login')->name('member-login-action');
        Route::get('/sign-up', 'Auth\MemberLoginController@showRegisterForm')->name('member-register-create');
        Route::post('/sign-up/confirm', 'Auth\MemberLoginController@confirmRegistration')->name('member-register-confirm');
        Route::post('/sign-up', 'Auth\MemberLoginController@register')->name('member-register-store');
        Route::get('/register/thanks', function(){
            return view('auth.thanks-register-member');
        })->name('member-register-thanks');

        // Socialite
        Route::get('/auth/{provider}', 'Auth\SocialLoginController@redirectToProvider')->name('socialite.redirect');
        Route::get('/auth/{provider}/callback', 'Auth\SocialLoginController@handleProviderCallback')->name('socialite.callback');

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
        // Chat Line Demo
        Route::namespace('Backend')->name('chat.')->prefix('chat')->group(function () {
            Route::get('/', 'MessageController@index')->name('index');
            Route::post('/broadcast', 'MessageController@broadcast')->name('broadcast');
            Route::post('/send', 'MessageController@sendMessage')->name('send');
            Route::get('/botInfo', 'MessageController@getBotInfo')->name('bot.info');
        });

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

                    Route::resource('property', 'PropertyController')->except('detail', 'destroy');

                    Route::post('property/delete/{property}', 'PropertyController@destroy')->name('property.destroy');

                    Route::post('import', 'PropertyController@import')->name('property.import');

                    Route::prefix('company')->group(function(){
                        //manual name route to fix issue route name auto generate with double dots, ex: admin.company..create
                        Route::resource('', 'CompanyController', ['names' => [
                            'store' => 'company.store',
                            'create' => 'company.create',
                            'destroy' => 'company.destroy',
                        ]]);
                        Route::resource('approval', 'CompanyApprovalController');
                        Route::get('update-status/{propertyId}', 'PropertyController@updatePublicationStatus')->name('publication.status');
                    });
                    Route::resource('member', 'MemberController')->except('detail');
                    Route::get('member/cancel/{member}', 'MemberController@cancelLineSns')->name('member.cancelSns');

                    // Route::get('property/detail/{id}', 'PropertyController@detail')->name('property.detail');
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

            Route::get('company/logout', 'Auth\CompanyUserLoginController@logout')->name('logout');
            Route::group(['middleware' => ['user_role:supervisor,operator'], 'prefix' => 'company'], function () {
                // B2
                Route::get('account', 'Backend\UserController@editAsUserOwner')->name('userowner-edit');
                Route::post('account', 'Backend\UserController@updateAsUserOwner')->name('userowner-update');
                // B3 - B5
                Route::name('company.')->group(function() {
                    Route::get('property/add', 'Backend\PropertyController@create')->name('property.create');
                    Route::get('property/edit/{id}', 'Backend\PropertyController@edit')->name('property.edit');
                    Route::resource('property', 'Backend\PropertyController')->except(['create', 'edit', 'destroy']);
                    Route::post('property/delete/{property}', 'Backend\PropertyController@destroy')->name('property.destroy');
                });
                // B6
                Route::get('company-information', 'Backend\CompanyController@editAsCompanyOwner')->name('companyowner-edit');
                Route::put('company-information', 'Backend\CompanyController@updateAsCompanyOwner')->name('companyowner-update');
                // B7
                Route::resource('inquiry', 'Backend\CustomerInquiryController')->except('detail');
                // B8
                Route::get('payment', 'Backend\CompanyPaymentController@edit')->name('company.payment.edit');
                Route::put('payment', 'Backend\CompanyPaymentController@update')->name('company.payment.update');
                Route::post('payment', 'Backend\CompanyPaymentController@store')->name('company.payment.store');
                Route::get('update-status/{propertyId}', 'Backend\PropertyController@updatePublicationStatus')->name('company.publication.status');
            });
        });

        /**
         * Member User (C Module)
         */
        Route::group(['middleware' => 'auth:member'], function() {
            Route::get('member/logout', 'Auth\MemberLoginController@logout')->name('member.logout');

        });

        // C1
        Route::get('/', 'Frontend\HomeController@index')->name('home');
        // C4
        Route::get('properties/{id}', 'Frontend\PropertyController@show')->name('property.detail');
        // C4
        Route::post('/inquiry', 'Backend\CustomerInquiryController@store')->name('enduser.inquiry.store');

        // C2
        Route::get('result', 'Frontend\PropertyController@index')->name('property.index');
        Route::post('result', 'Frontend\PropertyController@filter')->name('property.filter');
        Route::post('compile-filter', 'Frontend\PropertyController@compileFilter');
        Route::post('search-preference', 'Frontend\CustomerSearchPreferenceController@store');
        // C3
        Route::get('map', function () {
            return 'map';
        });
        // C5
        Route::get('/prefecture/{name}', 'Frontend\HomeController@prefecture')->name('prefecture.detail');
        // C6
        Route::get('property-history', 'Frontend\PropertyHistoryController@index')->name('property.history');

        // C15 registration of new real estate agency
        Route::get('estate/register', 'Frontend\EstateController@create')->name('company.register');
        Route::post('estate/confirm', 'Frontend\EstateController@confirm')->name('company.confirm');
        Route::post('estate/store', 'Frontend\EstateController@store')->name('company.store');
        Route::get('estate/check_email', 'Frontend\EstateController@check_email')->name('company.check_email');

        Route::get('thanks', 'Frontend\EstateController@thanks_page')->name('thanks.page');

        Route::get('company-name/{id}', 'Backend\PropertyController@getCompanyName');

        // C7
        Route::get('faqs', function() {
            return 'Pending design of static page';
        });
        // C8
        Route::get('contact', function() {
            return 'Pending design of static page';
        })->name('contact');
        // C9
        Route::get('sitemap', function() {
            return 'Pending design of static page';
        });
        // C10
        Route::get('privacy-policy', function() {
            return 'Pending design of static page';
        })->name('privacy-policy');
        // C12
        Route::get('terms-of-service', function() {
            return 'Pending design of static page';
        })->name('terms-of-use');
        // C13
        Route::get('overview', function() {
            return 'pending design of static page';
        });

    });
    Route::get('/partner', 'LpController@index')->name('lp.index');
    Route::post('/partner', 'LpController@contact')->name('lp.contact');
    Route::get('/partner/thanks', function(){
        return view('lp.home.thanks');
    })->name('lp.thanks');
}


