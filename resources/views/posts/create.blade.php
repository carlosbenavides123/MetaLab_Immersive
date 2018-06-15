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

<span class="float-right" style="margin-right: 2.5%;"><a href="/contents" class="btn btn-primary btn-xs" >Go Back</a></span>
<br>
<br>
<br>
    <div class="container">

        {!! Form::open(['action'=>'PostsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

        <div class="card card-body" style="padding: 1.5% 1.5% 1.5% 1.5%;background:#cee3f8;">

            {{Form::bsText('title', old('title'),['placeholder'=>'Title','required','pattern'=>"^[a-zA-Z0-9 '\"!?.,-]+$",'minlength'=>'2','style'=>'font-size:26px;']) }}
            @if($errors->has('title'))
                <div class="alert alert-danger">
                    {{$errors->first('title')}}
                </div>
                @endif
        </div>

        <br>

        <div class="card card-body" style="padding: 1.5% 1.5% 1.5% 1.5%;background:#cee3f8;">
            {{Form::bsTextarea('description',old('description'),['placeholder'=>'Optional description','pattern'=>'^[a-zA-Z0-9 \'"!?.,-]+$','style'=>'font-size:26px;' ]) }}
            @if($errors->has('description'))
                <div class="alert alert-danger">
                    {{$errors->first('description')}}
                </div>
            @endif
        </div>

        <br>

        <div class="card card-body" style="padding: 1.5% 1.5% 1.5% 1.5%;background:#cee3f8;">
            <label for="test">
                <div class="text-center" style="font-size: large">Click or drop something here
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
        <p></p>

        {{Form::submit('Submit',['style'=>'width:100%; background:#6441a4;color:#fff;','class'=>'btn'])}}




        {!! Form::close() !!}

    </div>
    @stop
