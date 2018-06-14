@extends('layouts.directoryApp')
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 60%;
        min-width: 400px;
        min-height: 400px;
    }
    body {
        font-family: 'Raleway', sans-serif;
        background-color: lightblue;
    }

    #create:hover{
        background-color: rgb(0,123,255,0.75);
        border-color: rgb(0,123,255,0.75);
    }
    textarea{
        width: 400px;
        height: 100px;
        border: #D3D3D3 2.5px solid;
        background-color: #fff;
    }
</style>

@section('content')

    @foreach (['danger', 'warning', 'success', 'info'] as $key)
        @if(Session::has($key))
            <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
        @endif
    @endforeach

    <div class="row">
        <div class="col-md-8 col-sm-12" >


                <div class="card card-body" style="margin:0 2.5% 0 2.5%;">
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

                    @if($post->textArea != '')
                        <p></p>
                        <div class="float-left" style="font-weight: 400; font-size: 25px; margin-left: 4%;">
                            {{$post->textArea}}
                        </div>

                        @endif
                    <p></p>


                    @if($post->optionalPic != 'temp.jpg (2).png')

                        <img class="center" src="/storage/pictures/{{$post->optionalPic}}"  alt="">
                    @endif


                </div>
            <hr style="border-top: 2px solid #ccc;margin: 1em 0; padding: 0; ">



        </div>

        <div class="col-md-4">

            <div class="card card-block bg-faded" style="margin:0 2.5% 0 2.5%; padding:2.5% 2.5% 2.5% 2.5%">
                <div class="container">
                    <p></p>

                    <a href="/posts/create" class="btn btn-primary" id="create" style="  margin:0 auto;  display: -webkit-box;display: -moz-box;display: -ms-flexbox;display: -webkit-flex;display: flex;-webkit-box-align : center;-moz-box-align    : center;-ms-flex-align    : center;-webkit-align-items : center;align-items : center ;justify-content : center;-webkit-justify-content : center;-webkit-box-pack : center;-moz-box-pack : center;-ms-flex-pack : center;">Create a new discussion!</a>

                    <span><p style="margin-top: 2.5%;color:#8dacbb;"> This post was submitted in {{$post->created_at}}.
                        @if($post->created_at != $post->updated_at)
                            This post was then updated at {{$post->updated_at}}.
                        @endif
                    </p>
                        </span>

                    <span>
                        <p style="font-weight: 700;">{{$post->votes}} points</p>
                    </span>

                    @if(Auth::user())
                        @if( Auth::user()->id ==$post->personId)
                        <span><a href="{{$post->id}}/edit" class="btn btn-success" style="  margin:0 auto;  display: -webkit-box;display: -moz-box;display: -ms-flexbox;display: -webkit-flex;display: flex;-webkit-box-align : center;-moz-box-align    : center;-ms-flex-align    : center;-webkit-align-items : center;align-items : center ;justify-content : center;-webkit-justify-content : center;-webkit-box-pack : center;-moz-box-pack : center;-ms-flex-pack : center;">Update</a></span>
                        @endif
                    @endif
                </div>

            </div>



        </div>


    </div>


    <br>
    <h3>Post a comment</h3>
    <br>



    <div style="margin: 0 2.5% 0 2.5%">
        {!! Form::open(['action' => ['CommentsController@store'],'method'=>'POST']) !!}


        {!! Form::textarea('comment', '', ['class' => '', 'placeholder'=>'Leave a comment...', 'required','pattern'=>'^[!?a-zA-Z0-9_ ]*$','minlength'=>'1','style'=>'font-size:20px; ', 'id'=>'comment' ]) !!}

        @if($errors->has('text'))
            <div class="alert alert-danger">
                {{$errors->first('text')}}
            </div>
        @endif
        @if(Auth::user())
        {{ Form::hidden('id', $post->id) }}
        {{ Form::hidden('personId', Auth::user()->id) }}
        {{Form ::hidden('userName', Auth::user()->userName)}}
        <p></p>
        @endif
        <div>
        {!! Form::submit('Submit', ['class' => 'btn btn-success','style'=>'margin-top:5px;']) !!}
        </div>



    </div>

    <div class="container">

        @foreach($post->comments as $comment)
            <!-- SECOND CARD -->
                <div class="bg-white border flex-grow justify-between m-6 rounded shadow w-1/3" style="padding: 0.5% 1.5% 0.5% 1%;">
                    <div class="p-6">
                       <p><a href="">{{$comment->userName}}</a></p>

                    </div>
                    <div class="bg-grey-lightest border-t p-6">
                        <h4 class="pb-2">{{$comment->comment}}</h4>
                    </div>
                </div>


            <br>
            @endforeach

    </div>


    @stop