@extends('layouts.directoryApp')

@section('content')


    ​<div class="bodyContainer">
        <div class="profile_left">

            {{$personal->fName}}
            {{$personal->lName}}'s Profile.



            @if($personal->personal->optionalPic)

            @else

                <span class="personalPic">

                <img src="/storage/pictures/defaultpic.png" alt="">

            </span>

            @endif
            total likes {{$personal->personal->likes}}

        </div>

        <div class="container">

            <div class="container text-center">
                Bio: {{$personal->personal->bio}}
            </div>

            username: {{$personal->userName}}

            <p></p>
            id: {{$personal->id}}

            <p></p>
            <a href="/users/create">Update your profile!</a>


        </div>
    </div>








    @stop
