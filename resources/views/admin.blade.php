@extends('layouts.directoryApp')
<style>
    #message{
        font-family: 'Song Myung',serif;
    }
</style>
<link href="https://fonts.googleapis.com/css?family=Song+Myung" rel="stylesheet">

@section('content')

    @foreach (['danger', 'success'] as $key)
        @if(Session::has($key))
            <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
        @endif
    @endforeach

    <div class="text-center">
    <h3 id="Message">Message to admins</h3>
    <br>

    <p id="message">Please do not give admin previledge to trolls</p>
    </div>
    <p></p>

    <div class="container">
        {!! Form::open(['action' => ['QueryController@search'],'method'=>'POST']) !!}
        {!! Form::text('search', null,
                               array('required',
                                    'class'=>'form-control',
                                    'placeholder'=>'Look up people by their username...')) !!}
        <br>
        {!! Form::submit('Search',
                                   array('class'=>'btn btn-success')) !!}
        {!! Form::close() !!}

        <p></p>

        <div id="message">
            @if(count($users)===0)
                <p>No users found with that username</p>
            @elseif (count($users)>=1)

                @foreach($users as $user)
                <ul class="list-group">
                    <li class="list-group-item">

                        {{--Warning will lead to error if user didn't personalize account--}}
                        <a href="../users/{{$user->id}}" style="text-decoration: none; border: 5px solid #d3d3d3; padding: 0.5% 0.5% 1.5% 0.5%;">{{$user->userName}}</a>
                        <span class="float-right"><a href="">Delete</a></span>
                        <span class="float-right"><a href="" class="btn btn-success">Assign admin</a></span>
                    </li>
                    <p></p>
                </ul>

                @endforeach
            @endif
        </div>




    </div>
    @endsection