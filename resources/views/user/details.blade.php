@extends('layouts.directoryApp')

<style type="text/css">
    .wrapper {
        margin-left: 0px;
        padding-left: 0px;
    }

</style>

@section('content')



    <div class="profile_left">

        {{$personal->first()->fName}}
        {{$personal->first()->lName}}'s Profile.
        
        

        @if($personal->first()->personal->optionalPic)

        @else

            <span class="personalPic">

                <img src="/storage/pictures/defaultpic.png" alt="">

            </span>

        @endif

    </div>



    total likes {{$personal->first()->personal->likes}}

    <div class="wrapper">
        
    </div>

    <div class="container text-center">
       Bio: {{$personal->first()->personal->bio}}
    </div>

    username: {{$personal->first()->userName}}
    <div></div>

    <a href="/users/create">Update your profile!</a>

    @stop
