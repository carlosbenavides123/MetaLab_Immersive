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
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
{{--<script src="../../js/postjs.js"></script>--}}

@section('content')

    <div class="container">
        <div class="form form-control" style="padding: 2.5% 2.5% 2.5% 2.5%;">
            <div>
                <span><a href="../../users/{{$personal->user_id}}" class="btn btn-primary float-right"> Back</a></span>
            </div>
            <p></p>
            <h4 class="text-center"> Update your life</h4>
            <p></p><p></p>

            {{--Required--}}

            {!! Form::open(['action' => ['UserController@update',$personal->personal->id],'method'=>'POST']) !!}

            <div class="form-group">
                {!! Form::label('text', 'Edit your bio!') !!}
                {!! Form::textarea('text', $personal->personal->bio, ['class' => 'form-control', 'placeholder'=>'Biography', 'required','pattern'=>'^[!?a-zA-Z0-9_ ]*$','minlength'=>'2','style'=>'font-size:26px;' ]) !!}

                @if($errors->has('text'))
                    <div class="alert alert-danger">
                        {{$errors->first('text')}}
                    </div>
                @endif

            </div>

            <p></p>

            <div class="form-group">
            {!! Form::label('userName', 'Edit your user name (optional)') !!}
            {!! Form::text('userName', $personal->userName, ['class' => 'form-control', 'placeholder'=>'Username', 'required','pattern'=>'^[!?a-zA-Z0-9_ ]*$','minlength'=>'2','style'=>'font-size:26px;' ]) !!}

                <p></p>
            @if($errors->has('userName'))
                <div class="alert alert-danger">
                    {{$errors->first('userName')}}
                </div>
            @endif
            </div>

            {!! Form::hidden('_method','PUT') !!}

            <p></p>
            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

        </div>

    </div>


@stop