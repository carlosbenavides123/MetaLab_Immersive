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

I commited some html pattern/style in it (6/5/2018) (I know not the best practice to style in the html tag, but in this case it's quicker)

I forgot to mentioned before, but I used a package for the phone verification, I followed this guide https://github.com/Propaganistas/Laravel-Phone

so in RegisterController (database->migrations->users table)
I put this for SQL to migrate...

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fName',20);
            $table->string('lName',32);
            $table->string('userName',25);
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('admin',3)->default('no');
            $table->string('master',3)->default('no');
            $table->rememberToken();
            $table->timestamps();
        });
        
 I want the master ranking of people to be able to assign people who can be admins.
 Admins may delete posts as they please but they can not assign people to admins.
 Masters may also delete. 
 I may or may not get around to do this in time.
 
 After fimbling around I totally forgot to update the User model, made me waste time...
 
     protected $fillable = [
        'fName', 'lName','userName', 'email', 'phone', 'password',
    ];
    
commit for User verification (6/5/2018)

Phone, emails. and user names are confirmed to be unique now... 
Here is Homer Simpson trying to make an account with Bart's details (no idea who's phone is that !)

![alttext](https://i.imgur.com/InsDH4m.png)

### Moving on to the login page...

... I totally forgot to log this stuff...

#### The content overview

![alttext](https://i.imgur.com/8qKUKyX.png)



