<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
@extends('layouts.app')

@section('content')
    <body class="{{ Request::path() == 'register' ? 'background-image-reg' : '' }}"></body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-8 col-lg-8">
            <div class="card">
                <div class="card-header text-center" style="padding: 2.5% 5% 2.5% 5%; margin-bottom: 2.5%;">{{ __('Become a non-Redditor!') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- First Name--}}

                        <div class="form-group row">
                            <label style="margin-top: 5px;" for="fName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input pattern="[A-Za-z]{2,20}" title="First name length must be between 2-20 characters, and romanized" style="min-width: 250px; max-width: 900px;" placeholder="First Name e.g. Bart..." id="fName" type="text" class="form-control{{ $errors->has('fName') ? ' is-invalid' : '' }}" name="fName" value="{{ old('fName') }}" required autofocus>

                                @if ($errors->has('fName'))
                                    <p></p>
                                    <span class="invalid-feedback alert alert-danger">
                                        <strong>{{ $errors->first('fName') }}</strong>
                                    </span>
                                @else
                                    <hr style="width: 100%;display: block">
                                @endif
                            </div>
                        </div>


                        {{--Last Name--}}

                        <div class="form-group row">
                            <label style="margin-top: 5px;" for="lName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input pattern="[A-Za-z]{1,32}" title="Last name length must be between 2-30 characters, and romanized" style="min-width: 250px; max-width: 900px;" placeholder="Last Name e.g. Simpson..." id="lName" type="text" class="form-control{{ $errors->has('lName') ? ' is-invalid' : '' }}" name="lName" value="{{ old('lName') }}" required autofocus>
                                @if ($errors->has('lName'))
                                    <p></p>
                                    <span class="invalid-feedback alert alert-danger">
                                        <strong>{{ $errors->first('lName') }}</strong>
                                    </span>
                                @else
                                    <hr style="width: 100%;display: block">
                                @endif
                            </div>
                        </div>

                        {{--Username--}}

                        <div class="form-group row">
                            <label style="margin-top: 5px;" for="userName" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input pattern="[A-Za-z0-9_]{2,25}" title="Username must be between 2-25 characters (No Spaces)" style="min-width: 250px; max-width: 900px;" placeholder="BartSimpson123" id="userName" type="text" class="form-control{{ $errors->has('userName') ? ' is-invalid' : '' }}" name="userName" value="{{ old('userName') }}" required autofocus>
                                @if ($errors->has('userName'))
                                    <p></p>
                                    <span class="invalid-feedback alert alert-danger">
                                        <strong>{{ $errors->first('userName') }}</strong>
                                    </span>
                                @else
                                    <hr style="width: 100%;display: block">
                                @endif
                            </div>
                        </div>


                        {{-- Email --}}

                        <div class="form-group row">
                            <label style="margin-top: 5px;" for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input style="min-width: 250px; max-width: 900px;"  placeholder="Bart@Simpson.com..." id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <p></p>
                                    <span class="invalid-feedback alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @else
                                        <hr style="width: 100%;display: block">
                                @endif
                            </div>
                        </div>

                        {{-- Phone --}}

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input style="min-width: 250px; max-width: 800px;" placeholder="(111)-111-1111" id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" name="phone" required autofocus>
                                @if ($errors->has('phone'))
                                    <p></p>
                                    <span class="invalid-feedback alert alert-danger">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @else
                                        <hr style="width: 100%;display: block">
                                @endif
                            </div>
                        </div>

                        {{--Password--}}

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input style="min-width: 250px; max-width: 900px;" placeholder="Password12345" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback alert alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @else
                                    <hr style="width: 100%;display: block">
                                @endif
                            </div>
                        </div>

                        {{--Confirm Password--}}

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Not Password54321" style="min-width: 250px; max-width: 900px;" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        {{--Submit--}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4" style="font-family: 'Righteous', cursive; font-size: medium">
            <div class="card bg-faded" style="padding: 5% 5% 5% 5%">
                <div class="card-block">
                    <p><span>Better than StackOverFlow <img src="img/checkmark.png" alt=""></span> </p>
                    <p><span>Better than Reddit <img src="img/checkmark.png" alt=""></span> </p>
                    <p><span>Better than Facebook <img src="img/checkmark.png" alt=""></span> </p>
                    <p><span>Better than Twitter <img src="img/checkmark.png" alt=""></span> </p>
                    <p><span>Better than Myspace <img src="img/checkmark.png" alt=""></span> </p>
                    <p><span>Better than Something else <img src="img/checkmark.png" alt=""></span> </p>
                    <p><span>Better than Youtube <img src="img/checkmark.png" alt=""></span> </p>
                    <p><span>Better than School <img src="img/checkmark.png" alt=""></span> </p>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
