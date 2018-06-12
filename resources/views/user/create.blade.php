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

@section('content')
    <title>Create A Discussion!</title>

    <div class="container">

        {!! Form::open(['action'=>'UserController@store', 'method'=>'POST']) !!}

        <div class="card card-body" style="padding: 1.5% 1.5% 1.5% 1.5%;background:#cee3f8;">
        <br>

        <div class="card card-body" style="padding: 1.5% 1.5% 1.5% 1.5%;background:#cee3f8;">
            {{Form::bsTextarea('description',old('description'),['placeholder'=>'Tell us about yourself...','pattern'=>'^[!?a-zA-Z0-9_ ]*$','style'=>'font-size:26px;' ]) }}
            @if($errors->has('description'))
                <div class="alert alert-danger">
                    {{$errors->first('description')}}
                </div>
            @endif
        </div>

        <br>

        {{Form::submit('Submit',['style'=>'width:100%; background:#6441a4;color:#fff;','class'=>'btn'])}}


        {!! Form::close() !!}

    </div>
    </div>
@stop