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