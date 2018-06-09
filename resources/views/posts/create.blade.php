@extends('layouts.directoryApp')

<title>Create A Discussion!</title>



    <div class="container ">
    {!! Form::open(['action'=>'PostsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
        hello
    {!! Form::close() !!}

    </div>
