@php
    $linkToken = null;
    // if request has query string link token
    if (request()->has('linkToken')) {
        // get link token
        $linkToken = request()->get('linkToken');
    }
@endphp
@extends('auth.layouts.superadmin')

<!-- title -->
@section('title', 'Administrator Login Page | ' . config('app.name'))

@section('content')
<div class="login-box" style="width: auto;">
    <div class="login-logo">
        @if($linkToken)
            <a class="text-uppercase" style="letter-spacing: 2px" href="javascript:;">MEMBER LINKED LINE ACCOUNT</a>
        @else
            <a class="text-uppercase" style="letter-spacing: 2px" href="javascript:;">MEMBER LOGIN</a>
        @endif
    </div>
    <div class="text-sm">
        @include("backend._includes.alert")
    </div>
    <div class="card card-user-login">
        <div class="card-body login-card-body">
            <p class="login-box-msg mb-3 text-uppercase" style="letter-spacing: 1px">@lang("label.userloginscreen")</p>

            <form action="{{ route('member-login-action') }}" method="post" class="mb-3">
                @csrf

                @if($linkToken)
                    <input type="hidden" name="linkToken" value="{{ $linkToken }}">
                @endif

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
                        <button type="submit" onclick="this.disabled=true;this.value='Submitting...';this.form.submit();" class="btn btn-secondary btn-block">@lang('label.login')</button>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-auto">
                        <div class="icheck-primary">
                            <input id="terms" type="checkbox" name="terms" required>
                            <label for="terms" style="font-weight: normal; font-size: 0.8rem">
                                @lang('label.agree_with_terms')
                            </label>
                            <a href="{{route('terms-of-use')}}" target="_blank"><i class="fas fa-external-link-alt fa-lg"></i></a>
                        </div>
                    </div>
                </div>
                @if($linkToken)
                    <div class="form-group row mt-4">

                        <div class="px-2">
                            <a class="btn btn-outline-dark" href="{{ url('auth/google') }}" style="text-transform:none; font-size: 14px;">
                                <img width="20px" style="margin-bottom:3px; margin-right:5px;" alt="Google sign-in" src="{{asset('images/google.webp')}}" />
                                でログイン
                            </a>
                        </div>
                        <div class="px-2">
                            <a class="btn btn-outline-primary" href="{{ url('auth/facebook') }}" style="text-transform:none; font-size: 14px;">
                                <img width="20px" style="margin-bottom:3px; margin-right:5px;" alt="Facebook sign-in" src="{{asset('images/facebook.svg')}}" />
                                でログイン
                            </a>
                        </div>
                        <div class="px-2">
                            <a class="btn btn-outline-success" href="{{ url('auth/line') }}" style="text-transform:none; font-size: 14px;">
                                <img width="20px" style="margin-bottom:3px; margin-right:5px;" alt="LINE sign-in" src="{{asset('images/line.svg')}}" />
                                でログイン
                            </a>
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
        <div class="card-footer">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <a class="text-link" href="{{route('terms-of-use')}}">利用規約</a>
                </div>
                <div class="col-auto">
                    <a class="text-link" href="{{route('privacy-policy')}}">プライバシーポリシー</a>
                </div>
                <div class="col-auto">
                    <a class="text-link" href="{{route('contact')}}">お問い合わせ</a>
                </div>
            </div>
        </div>
    </div>
    @if (Route::has('password.request'))
    <p class="mb-1 mt-1 ml-1" style="float: left">
        @if(!env('DEMO_MODE'))
        <a href="{{ route('password.request') }}" style="font-weight: normal; font-size: 0.8rem">@lang('label.IForgotMyPassword')</a>
        @endif
    </p>
    @endif
    <p class="mb-1 mt-1 mr-1" style="float: right">
        <a href="{{ route('member-register-create') }}" style="font-weight: normal; font-size: 0.8rem">@lang('label.member_registration')</a>
    </p>
</div>
@endsection
