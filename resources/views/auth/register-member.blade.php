{{--@extends('auth.layouts.admin_app')--}}
@extends('auth.layouts.superadmin')

<!-- title -->
@section('title', 'Administrator Login Page | ' . config('app.name'))

@section('content')
    <div class="login-logo">
        <a class="text-uppercase" style="letter-spacing: 2px" href="javascript:;">MEMBER REGISTER</a>
    </div>
    <div class="text-sm">
    @include("backend._includes.alert")
    </div>
    <div class="card card-user-login">
        <div class="card-body login-card-body">
            <p class="login-box-msg mb-3 text-uppercase" style="letter-spacing: 1px">@lang("label.userloginscreen")</p>

            <form action="{{ route('member-register-action') }}" method="post" class="mb-3">
                @csrf

                <div class="input-group mb-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input id="name" type="text" class="form-control @error('name')is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name"
                        placeholder="@lang('label.name')" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('name')
                    <span class="help-block text-sm" role="alert"> <strong>{{ $message }}</strong> </span>
                @enderror

                <div class="input-group mb-3 {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input id="email" type="email" class="form-control @error('email')is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email"
                        placeholder="@lang('label.enterEmailAddress')" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <span class="help-block text-sm" role="alert"> <strong>{{ $message }}</strong> </span>
                @enderror

                <div class="input-group mb-3{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password"
                        class="form-control @error('password')is-invalid @enderror" name="password"
                        required autocomplete="current-password" placeholder="@lang('label.enterPassword')">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback text-sm" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

                <div class="input-group mb-3{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input id="password_confirmation" type="password"
                        class="form-control @error('password_confirmation')is-invalid @enderror" name="password_confirmation"
                        required autocomplete="current-password" placeholder="@lang('label.enterPassword')">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password_confirmation')
                    <span class="invalid-feedback text-sm" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

                <div class="row mt-5">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} >
                            <label for="remember" style="font-weight: normal; font-size: 0.8rem">
                                @lang('label.remember')
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" onclick="this.disabled=true;this.value='Submitting...';this.form.submit();" class="btn btn-secondary btn-block">@lang('label.login')</button>
                    </div>
                    <!-- /.col -->
                </div>

                @if(env('DEMO_MODE'))
                <div class="card mt-4" style="background-color:#ddeeff; color:#4466aa;">
                    <div class="card-body">
                        <p class="card-title" style="font-size:80%;">以下のログイン情報をお使いください。</p>
                        <p class="card-text">Email: user@company.com<br>Password: 12345678</p>
                    </div>
                </div>
                @endif
            </form>
        </div>
    </div>
    @if (Route::has('password.request'))
        <p class="mb-1 mt-1 ml-1" style="float: left">
            @if(!env('DEMO_MODE'))
            <a href="{{ route('password.request') }}"  style="font-weight: normal; font-size: 0.8rem">@lang('label.IForgotMyPassword')</a>
            @endif
        </p>
    @endif
    <p class="mb-1 mt-1 mr-1" style="float: right">
        <a href="{{ route('login') }}"  style="font-weight: normal; font-size: 0.8rem">@lang('label.adminloginscreen')</a>
    </p>
@endsection