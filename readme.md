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


### Working on creating posts...

In the Content/Overview page, I added a button that reads 'Create A Discussion'. 
This button refers to '/posts/create'. Ok, so I went to PostsController@create and there I wrote return view ('posts.create').
In views, I created a directory called posts, and inside I created a file called 'create.blade.php'...
Ok good, I'm going to add Laravel Collectives....

I can do this is normal HTML, but I think this way is good practice...

Ok but before this, I realize I should make it required to be logged in before users can log into the page...
I found this in the internet and it works admirably!

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/posts/create','PostsController@create');
    });

Ok to continue...

    composer require laravelcollective/html:"^5.4.0"

config->app.php@'providers'

    Collective\Html\HtmlServiceProvider::class,
    
config->app.php@'aliases'   

            'Form'=>Collective\Html\FormFacade::class,
            'Html'=>Collective\Html\HtmlFacade::class,
            
(app->Providers) 
   
    php artisan make:provider FormServiceProvider
    
(Back to config->app.php)

in providers add

    App\Providers\FormServiceProvider::class,
    
 at the top of FormServiceProvider...
 
        use Form;
        
  so in boot()...yeah this looks ugly
  
        Form::component('bsText','components.form.text',['name','value'=>null,'attributes'=>[]]);
        Form::component('bsTextarea','components.form.textarea',['name','value'=>null,'attributes'=>[]]);
        Form::component('bsSubmit','components.form.text',['value'=>'Submit','attributes'=>[]]);
        Form::component('hidden','components.form.hidden',['name','value'=>null,'attributes'=>[]]);
        Form::component('file','components.form.file',['name','attribute'=>[]]);
        
 If I am corrent, I believe the order is ['HTML-NAME', 'Value like text', 'Optional Name'];
 
 So then I created a new directory under views... views->(new directory('components'))
 
 under components I created a new file for file, hidden,submit, text, textarea (blade.php)
 
 under file
 
     <label>
        {{Form::label($name)}}
        {{Form::text($name,$value,$attributes}}
    </label>

under hidden

    {{Form::hidden($name,$value,$attributes)}}

    
 under submit
 
     <div>
        {{Form::submit($value,$attributes)}}
    </div>
    
 under text
 
     <label>
        {{Form::label($name)}}
        {{Form::text($name,$value,$attributes}}
    </label>
    
 under textarea
 
     <label>
        {{Form::label($name)}}
        {{Form::textarea($name,$value,$attributes}}
    </label>
    
    ok...glad thats over...
    
    back to views->posts->create.blade.php
    
    So adding a navbar caused a problem in which i never knew existed...
    It looks like I have to create an alternative navbar...
    
    ![alttext](https://i.imgur.com/xefJvEK.png) 
    
    The problem was that the directory to the images wasn't specific enough...
    
   Thats ok...i'll create a new layout in layouts... This is probably not the best solution but it definitely is the fastest at this point and time... and it worked. I created a new layout->(new file) directoryApp.blade.php with basically the same logic as contentApp.blade.php but the images have '../' before them now. New commit(6/9/2018)
   
   ![alttext](https://i.imgur.com/Zy47A0N.png) 
   
   Ok back to laravel...
   
 In the file.blade.php (commit 6/9/2018) I did all this thus far...
 
     @extends('layouts.directoryApp')

    <style>
        textarea{
            width: 300px;
            height: 150px;
        }

        input[type="file"]{
            position: absolute;
            left: 0;
            opacity: 0;
            top: 0;
            bottom: 0;
            width: 100%;
        }

        imag.dragover {
            background-color: #aaa;
        }


    </style>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/postjs.js"></script>
    @section('content')
    <title>Create A Discussion!</title>


        <div class="container">

            {!! Form::open(['action'=>'PostsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

            <div class="card card-body" style="padding: 1.5% 1.5% 1.5% 1.5%;background:#cee3f8;">
                {{Form::bsText('title','',['placeholder'=>'Title','required','pattern'=>'^[a-zA-Z0-9]*$' ,'minlength'=>'2','style'=>'font-size:26px;' ]) }}
            </div>

            <br>

            <div class="card card-body" style="padding: 1.5% 1.5% 1.5% 1.5%;background:#cee3f8;">
                {{Form::bsTextarea('description','',['placeholder'=>'Optional description','pattern'=>'^[a-zA-Z0-9]*$' ,'minlength'=>'2','style'=>'font-size:26px;' ]) }}
            </div>

            <br>

            <div class="card card-body" style="padding: 1.5% 1.5% 1.5% 1.5%;background:#cee3f8;">
                <label for="test">
                    <div class="text-center" style="font-size: large">Click or drop something here
                    {{Form::file('image')}}
                    </div>
                </label>
                <p id="filename"></p>
            </div>


            {!! Form::close() !!}

        </div>
        @stop
        
For the file upload, it was weird because I had to look it up...

### The PostsController@store

        $this->validate($request,[
            'title'=>'required|min:2|max:200',
            'image' =>'max:1999|image'
        ]);

        $fileNameToStore = 'temp.pic';

        if($request->file('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalExtension();

            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '_' . time() . '.' .$extension;

            $path = $request->file('image')->storeAs('public/pictures',$fileNameToStore);
        }



        $post = new Post;
        $post->personId = auth()->user()->id;
        $post->optionalPic = $fileNameToStore;
        $post->userName = auth()->user()->userName;
        $post->title = $request->input('title');
        $post->textArea = $request->input('description');
        $post->votes = 0;

        $post ->save();


        return redirect('/contents')->with('success','Post created!');
        
 Basically I want the title to be required only, with the image of choice to be less than 2000 bits (?)
 
 I chose the $fileNameToStore as a temp, depends on the user if he or she wants to have one...
 The weird method is to be somewhat strict for the image to be unique as possible... so that the database won't mess up...
 
 Now I want to remove the dummy data from the Overview/Content and replace it with this dynamic data...
 I'll probablydo a descending order of the top 10 most recent posts or something...
 
 Also, I will reroute the redirect to the actual post, that redirect post is just a temp for now..
 
 After struggling for a really long time, I realized I made a huge mistake, I realized making a relationship between the Content and Post was virtually useless and spent a lot of time debugging... there shouldn't be a relationship in this case at all...
 
 # The cleaned up content page (overview)
 
 I added a temp pic, that will signify text if the user chooses not to upload an image...
 
 ![alttext](https://i.imgur.com/46IoIA8.png)
 
 Ok so i've done some front end changes... I made the useless sidebar into a somewhat useful sidebar. It tracks the posts the vote count for that post. I plan to make a User (parent) Post relationship... and comment I guess..
 
 Here are the changes for show...
 
     @extends('layouts.directoryApp')
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 80%;
            max-height: 1000px;
        }
        body {
            font-family: 'Raleway', sans-serif;
        }

        a:hover{
            opacity: 0.8;
        }
    </style>

    @section('content')

        <div class="row">
            <div class="col-md-8 col-sm-12" >


                    <div class="card card-body" style="margin-left: 2.5%;">
                        <div class="row" >

                            <div style="display: inline-grid; margin: 0px 25px 0px 25px;">
                                <span><img src="../img/upvote.png" alt=""></span>
                                <span class="text-center">{{$post->votes}}</span>
                                <span><img src="../img/downvote.png" style="font-size: 22px;" alt="Number"></span>
                            </div>

                            <div>
                                <img src="/storage/pictures/{{$post->optionalPic}}" style="height: 120px;width: 100px; display: inline-block;margin-top: 2.5%;">
                            </div>

                            <div style="display: inline-block; margin-left: 15px;font-size: large;">
                                <p style="position: absolute; font-size: x-large;">{{$post->title}}</p>
                            </div>
                        </div>

                        @if($post->optionalPic != 'temp.jpg (2).png')
                            <img class="center" src="/storage/pictures/{{$post->optionalPic}}"  alt="">
                        @endif


                    </div>



            </div>

            <div class="col-md-4">

                <div class="card card-block bg-faded" style="margin-right: 2.5%;">
                    <div class="container">
                        <p></p>

                        <a href="/posts/create" class="btn btn-primary" style="  margin:0 auto;  display: -webkit-box;display: -moz-box;display: -ms-flexbox;display: -webkit-flex;display: flex;-webkit-box-align : center;-moz-box-align    : center;-ms-flex-align    : center;-webkit-align-items : center;align-items : center ;justify-content : center;-webkit-justify-content : center;-webkit-box-pack : center;-moz-box-pack : center;-ms-flex-pack : center;">Create a new discussion!</a>

                        <span><p style="margin-top: 2.5%;color:#8dacbb;"> This post was submitted in {{$post->created_at}}.
                            @if($post->created_at != $post->updated_at)
                                This post was then updated at {{$post->updated_at}}.
                            @endif
                        </p>
                            </span>
                        <span>
                            <p style="font-weight: 700;">{{$post->votes}} points</p>
                        </span>
                    </div>

                </div>
            </div>

        </div>
        @stop
 
 ![alttext](https://i.imgur.com/MxVsPLQ.png)
 
 In the show.blade (in posts) i added a edit post (WIP) that checks if user is logged on? yes ok check if user->id == foreign key? yes ok a new button appears on sidebar that links to edit the post.. 
 
 ##### 6/10
 
 Ok so I forgot to add the option textbody, made a check if something is there, else do nothing..
 
             @if($post->textArea != '')
                        <p></p>
                        <div class="float-left" style="font-weight: 400; font-size: 25px; margin-left: 4%;">
                            {{$post->textArea}}
                        </div>

                        @endif
                    <p></p>

And in the ContentsController, for index I added a SQL requirement, to get all posts where isVisible, that is not deleted, will be visible to the user... this is @index

        $posts = Post::all()->where('isVisible',1);
        return view('content')->with('posts',$posts);
    
    
Ok, now I want the user to see the option to edit his or her posts if they happen to be in the front page...

In second thought, I think it will be preferable just to do this feature in the user settings... I don't want to check through every post for at @if userid == postUserId, I think that will be bad...

So im updating the create post form, and i struggled A LOT, because laravel collective is dumb... I found out the way to get the value from user is to use old('html id') instead of '{{old('html id')}}'
i.e.

            {{Form::bsText('title', old('title'),['placeholder'=>'Title','required','pattern'=>'^[a-zA-Z0-9_ ]*$' ,'minlength'=>'2','style'=>'font-size:26px;']) }}


Ok, I want to add a message in case of errors and I want the back end to have the same regex...

back to PostsController@create

So in create, I added these requirements, I only want english characters...

        $this->validate($request,[
            'title'=>'required|min:2|max:50|regex:/(^[A-Za-z0-9 ]+$)+/',
            'description'=>'min:2|max:250|regex:/(^[A-Za-z0-9 ]+$)+/',
            'image' =>'max:1999|image'
        ]);
        
Ok after struggling I soon found out i needed to update my description requirement to allow null because I ran into problems...

my new migration file for posts is...

        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personId');
            $table->string('optionalPic');
            $table->string('userName')->required();
            $table->string('title')->required();
            $table->string('textArea')->nullable();
            $table->integer('votes')->default(0);
            $table->integer('isVisible')->default(1);
            $table->timestamps();
        });
        
        
  and for PostsController@store I had to update it aswell to allow optional body text..
  
  
          $this->validate($request,[
            'title'=>'required|min:2|max:50|regex:/(^[A-Za-z0-9 ]+$)+/',
            'description'=>'nullable|regex:/(^[A-Za-z0-9 ]+$)+/|min:1',
            'image' =>'max:1999|image'
        ]);
        
  Ok we are good now!
  
  Now I want the user to be able to edit the posts, for right now without the User Personal page... I'll add that later
  New commit(6/10/2018)
  
  
### The edit...

so Navigate to PostsController@edit...
lets get the id of it and return back a view, that is edit

So put this logic in PostsController@edit

        $post = Post::find($id);
        return view('posts.editPosts')->with('post',$post);

find the id, which is given to use by clicking it... then lets go to the web page, but we have to create it.

In views->posts-> create a new file called editPosts.blade.php

I don't want to put much styling in this so...

So I just figured out how to fix the nav bar images, I didn't need to keep making a new layout.someApp, I just needed to update the style of the navbar in the current page. For example...

Here is the skeleton for editPosts

    @extends('layouts.directoryApp')

    <style>
        #exit {
            content:url("../../img/exit.png")
        }
        #personal {
            content:url("../../img/personalStats.png");
        }
    </style>
    @section('content')


        @stop

I just added a id to the images and it pans out fine. 

Alright lets add some basic style to the edit page...

I updated the regex to allow !? as people use this more often than not...
So the thing is, I will be prompting users to send the same picture again, otherwise it'll be removed...

Here is the result of the edit page... 

    @extends('layouts.directoryApp')
    <link href="https://fonts.googleapis.com/css?family=Song+Myung" rel="stylesheet">

    <style>
        #exit {
            content:url("../../img/exit.png")
        }
        #personal {
            content:url("../../img/personalStats.png");
        }

        textarea{
            width: 300px;
            height: 150px;
        }

        input[type="file"]{
            position: absolute;
            left: 0;
            opacity: 0;
            top: 0;
            bottom: 0;
            width: 100%;
        }

        imag.dragover {
            background-color: #aaa;
        }

        label{
            font-weight: 500;
            font-size: 25px;
            font-family: 'Song Myung', serif;

        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../js/postjs.js"></script>

    @section('content')

        <div class="container">
            <div class="form form-control" style="padding: 2.5% 2.5% 2.5% 2.5%;">
                <div>
                <span><a href="../../posts/{{$post->id}}" class="btn btn-primary float-right"> Back</a></span>
                </div>
                <p></p>
                <h4 class="text-center"> That old post sucked anyway...</h4>
                <p></p><p></p>

                {!! Form::open(['action' => ['PostsController@update',$post->id],'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                {{--{{Form::bsText('title', $post->title,['placeholder'=>'Title','required','pattern'=>'^[a-zA-Z0-9_ ]*$','minlength'=>'2','style'=>'font-size:26px;']) }}--}}
                {{--@if($errors->has('title'))--}}
                    {{--<div class="alert alert-danger">--}}
                        {{--{{$errors->first('title')}}--}}
                    {{--</div>--}}
                {{--@endif--}}

                <div class="form-group">
                    {!! Form::label('title', 'Update the title of this post') !!}
                    {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder'=>'Title', 'required','pattern'=>'^[!?a-zA-Z0-9_ ]*$','minlength'=>'2','style'=>'font-size:26px;' ]) !!}

                    @if($errors->has('title'))
                    <div class="alert alert-danger">
                    {{$errors->first('title')}}
                    </div>
                    @endif
                </div>

                <p></p>

                <div class="form-group">
                    {!! Form::label('description', 'Optional') !!}
                    {!! Form::textarea('description', $post->textArea, ['class' => 'form-control','placeholder'=>'Optional description','pattern'=>'^[!?a-zA-Z0-9_ ]*$','style'=>'font-size:26px;']) !!}
                    @if($errors->has('description'))
                        <div class="alert alert-danger">
                            {{$errors->first('description')}}
                        </div>
                    @endif
                </div>

                <div class="card card-body" style="padding: 1.5% 1.5% 1.5% 1.5%;background:#cee3f8;">
                    <label for="test">
                        <div class="text-center" style="font-size: large">Please upload the same picture if you want to, otherwise the original will be deleted
                            {{Form::file('image')}}
                            @if($errors->has('image'))
                                <div class="alert alert-danger">
                                    {{$errors->first('image')}}
                                    idk how but something went wrong...
                                </div>
                            @endif
                        </div>
                    </label>
                    <p id="filename"></p>
                </div>

                {!! Form::hidden('_method','PUT') !!}

                <p></p>
                {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

            </div>
        </div>


        @stop

if you couldn't compile it in you head...(lol)

![alttext](https://i.imgur.com/jLkIcbb.png)

so everything works, the postscontroller@update is BASICALLY the same as store, but we have to find that certain post first, then we update it, we DONT make a new post (Main difference!)

### Exploring one to one...

I wanted to explore one to one relationships for impact and wow I wenth through hell.

I created a new model called Personal, that keeps track of the personal stuff of the user.

It never occured to me there had to be a table already created in the new table for Personal, that is personals.

After googling I eventually found out that I had to put this... Also I am using UserController because I thought it was most appropiate.

    use Illuminate\Http\Request;
    use App\User;
    use App\Post;
    use Auth;
    use App\Personal;
    use Illuminate\Support\Facades\DB;

    class UserController extends Controller
    {
        public function index()
        {
            return "Something went wrong :P";
        }

        public function show($id)
        {

            if($user = Auth::check()){
                $userId = Auth::id();
                $userId = User::find($userId);
                $personal = User::with('Personal')->get();
                return view('user.details')->with('personal',$personal);
            }
            else{
                return redirect('auth/login');
            }
        }

        public function create()
        {
            $check = DB::table('personals')
                ->where('user_id', '=', Auth::user()->id)->first();
            if(is_null($check)) {
                return view('user.create');
            }
            return 'yes';
        }

        public function store(Request $request)
        {
            $this->validate($request,[
                'description'=>'nullable|regex:/(^[A-Za-z0-9 ]+$)+/|min:1',
            ]);
            $userId = Auth::id();

            $personal = New Personal;
            $personal ->user_id = $userId;
            $personal ->bio = $request->input('description');

            $personal ->save();


            return redirect('/contents')->with('success','Post created!');
        }
    }

So I want the user to be able to create ONE instance in that table, hence the one to one but I am goig to put lazy html/blade statements. There will be one button that wil based on that logic, take you to create or edit.



