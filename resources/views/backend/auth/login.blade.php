<!DOCTYPE html>
<html lang="{{ __('en') }}" dir="{{ __('ltr') }}">
<head>
    @include('backend.partials.head')
</head>
<body>
<div class="app" id="app">

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
            <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> {{__(env('APP_NAME'))}} <span class="tx-normal">]</span></div>
            <div class="tx-center mg-b-60">@lang('Enter To Staff Dashboard')</div>
            <form name="form" method="POST" action="{{ route('backend.login.submit') }}">
                {{ csrf_field() }}
                @if ($errors->has('username'))
                    <div class="alert alert-warning">
                        <strong>{{ $errors->first('username') }}</strong>
                    </div>
                @endif
                <div class="form-group">
                <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="@lang('Enter Your Username')" required >
            </div><!-- form-group -->
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="@lang('Enter Your Password')" required >
            </div><!-- form-group -->
            <div class="form-group">
                <a href="" class="tx-info tx-12 d-block mg-t-10 ft-right">@lang('Forgot password?')</a>

                <input type="checkbox" value="1" class="" name="remember"> {{ __('Keep me SignIn') }}
            </div>
            <button type="submit" class="btn btn-info btn-block">@lang('Sign In')</button>
        </form>

            <div class="mg-t-60 tx-center">@lang('Not yet a member?') <a href="" class="tx-info">@lang('Sign Up')</a></div>
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->
@include('backend.partials.footer')
</body>
</html>

