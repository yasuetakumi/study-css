{{--@extends('auth.layouts.admin_app')--}}
@extends('auth.layouts.superadmin')

<!-- title -->
@section('title', 'Administrator Login Page | ' . config('app.name'))

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a class="text-uppercase" style="letter-spacing: 2px" href="javascript:;">{{ env('APP_NAME','') }}</a>
    </div>
    <div class="text-sm">
        @include("backend._includes.alert")
    </div>
    <div class="card card-admin-login">
        <div class="card-body login-card-body">
            <p class="login-box-msg mb-3 text-uppercase" style="letter-spacing: 1px">@lang("label.adminloginscreen")</p>

            <form class="mb-3" action="{{ route('login') }}" method="post">
                @csrf
                @error('email')
                <span class="help-block text-sm" role="alert"> <strong>{{ $message }}</strong> </span>
                @enderror
                <div class="input-group mb-3 {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input id="email" type="email" class="form-control @error('email')is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="@lang('label.enterEmailAddress')" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <span class="invalid-feedback text-sm" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
                <div class="input-group mb-3{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control @error('password')is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="@lang('label.enterPassword')">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" style="font-weight: normal; font-size: 0.8rem">
                                @lang('label.remember')
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" type="submit" class="btn btn-secondary btn-block">@lang('label.login')</button>
                    </div>
                    <!-- /.col -->
                </div>
                @if(env('DEMO_MODE'))
                <div class="card mt-4" style="background-color:#ddeeff; color:#4466aa;">
                    <div class="card-body">
                        <p class="card-title" style="font-size:80%;">以下のログイン情報をお使いください。</p>
                        <p class="card-text">Email: admin@admin.com<br>Password: 12345678</p>
                    </div>
                </div>
                @endif
            </form>

            {{--<div class="social-auth-links text-center mb-3">--}}
            {{-- <p>- OR -</p>--}}
            {{-- <a href="#" class="btn btn-block btn-primary">--}}
            {{-- <i class="fab fa-facebook mr-2"></i> Sign in using Facebook--}}
            {{-- </a>--}}
            {{-- <a href="#" class="btn btn-block btn-danger">--}}
            {{-- <i class="fab fa-google-plus mr-2"></i> Sign in using Google+--}}
            {{-- </a>--}}
            {{--</div>--}}
            <!-- /.social-auth-links -->
            {{--<p class="mb-0">--}}
            {{-- <a href="#" class="text-center">Register a new membership</a>--}}
            {{--</p>--}}
        </div>
        <!-- /.login-card-body -->
    </div>
    @if (Route::has('password.request'))
    <p class="mb-1 mt-1 ml-1" style="float: left">
        @if(!env('DEMO_MODE'))
        <a href="{{ route('password.request') }}" style="font-weight: normal; font-size: 0.8rem">@lang('label.IForgotMyPassword')</a>
        @endif
    </p>
    @endif
    <p class="mb-1 mt-1 mr-1" style="float: right">
        <a href="{{ route('company-user-login') }}" style="font-weight: normal; font-size: 0.8rem">@lang('label.userloginscreen')</a>
    </p>
</div>
@endsection
