@extends('layouts.altApp')

@section('content')

    <body class="{{ Request::path() == 'login' ? 'background-image' : '' }}"></body>
<div class="container bg-transparent">

    <div id="loginCard" class="row justify-content-center bg-transparent">
        <div class="col-md-8">
            <div id="loginCard" class="card bg-transparent">
                <div class="card-header text-center" style="font-size: 150%;color:rgb(115,255,164);">{{ __('Login') }}</div>

                <div class="card-body" id = "loginInput">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label style="color:#fff; font-size: 125%;" for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input style="border: 2px solid #fff;opacity: 0.6;" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>


                                @if ($errors->has('email'))
                                    <p></p>
                                    <span class="invalid-feedback alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @else
                                    <hr style="width: 100%; height: 2px; border-color:#ffffff; color:#ffffff;">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="color:#fff; font-size: 125%;" for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input style="border: 2px solid #fff;opacity: 0.6;" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>


                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div style="margin-bottom: 10px;" class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label style="color:#fff">
                                        <input  type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button style="border-radius: 10px; margin-right: 5px; display: inline-block;" type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a id="forgot" style="display: inline-block;" class="btn btn-info" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
