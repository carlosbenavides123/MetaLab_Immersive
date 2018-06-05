# Meta Lab

Project, demonstrate our knowledge of Laravel by building a forumish app with basic functionality (Crud).

I began by updating the register handler (resources->views->auth->register.blade.php)

I don't remember the default code but this is what I have so far (6/5/2018)

    @extends('layouts.app')

    @section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- First Name--}}

                            <div class="form-group row">
                                <label style="margin-top: 5px;" for="fName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input style="min-width: 300px; max-width: 900px;" placeholder="First Name e.g. Bart..." id="fName" type="text" class="form-control{{ $errors->has('fName') ? ' is-invalid' : '' }}" name="fName" value="{{ old('fName') }}" required autofocus>
                                    <hr style="width: 100%;display: block">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            {{--Last Name--}}

                            <div class="form-group row">
                                <label style="margin-top: 5px;" for="lName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input style="min-width: 300px; max-width: 900px;" placeholder="Last Name e.g. Simpson..." id="lName" type="text" class="form-control{{ $errors->has('lName') ? ' is-invalid' : '' }}" name="lName" value="{{ old('lName') }}" required autofocus>
                                    <hr style="width: 100%;display: block">
                                    @if ($errors->has('lName'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('lName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{--Username--}}

                            <div class="form-group row">
                                <label style="margin-top: 5px;" for="userName" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input style="min-width: 300px; max-width: 900px;" placeholder="BartSimpson123" id="userName" type="text" class="form-control{{ $errors->has('userName') ? ' is-invalid' : '' }}" name="userName" value="{{ old('userName') }}" required autofocus>
                                    <hr style="width: 100%;display: block">
                                    @if ($errors->has('userName'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('userName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label style="margin-top: 5px;" for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input style="min-width: 300px; max-width: 900px;"  placeholder="Bart@Simpson.com..." id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                    <hr style="width: 100%;display: block">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input style="min-width: 300px; max-width: 900px;" placeholder="Password12345" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    <hr style="width: 100%;display: block">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input placeholder="Not Password54321" style="min-width: 300px; max-width: 900px;" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    <hr style="width: 100%;display: block">
                                </div>
                            </div>

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
        </div>
    </div>
    @endsection
    
I plan on keeping the same layouts.app, but I will update it to my liking. Actually for the most part, I will keep Laravel's Default codee for it's 'hello world', I'll just modify it.

I now will do HTML Form check for this register Handler.

I commited some html pattern/style in it (I know not the best practice to style in the html tag, but in this case it's quicker)
