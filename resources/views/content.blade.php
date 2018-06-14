@extends('layouts.contentApp')

<style>
    a:hover{
        opacity: 0.65;
    }
    .postedBy{
        float: right;
        font-size: 12px;
        font-weight: 200;
        font-family: algerian, courier;
    }
    .upvote:hover{
        background-color:#E0E0E0;
    }
    .downvote:hover{
        background-color:#E0E0E0;
    }

</style>

{{--<script--}}
        {{--src="https://code.jquery.com/jquery-3.3.1.min.js"--}}
        {{--integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="--}}
        {{--crossorigin="anonymous"></script>--}}

{{--<script src="js/vote.js"></script>--}}

@section('content')
                <h3 class="text-center">Discussions</h3>

                <div class="row">
                    <div class="col-md-8 col-sm-12" >

                        @foreach($posts as $post)
                            @foreach($post->users as $name)
                                <div class="card card-body" style=" background-color: #faeded;margin:0 3% 3% 3%;">
                                    <div class="row" >

                                        <div style="display: inline-grid; margin: 0px 25px 0px 25px;">
                                            <span><img id="{{$post->id}}" class="upvote" src="img/upvote.png" alt=""></span>
                                            <span id="$post->votes" class="text-center">{{$post->votes}}</span>
                                            <span><img id="{{$post->id}}" class="downvote" src="img/downvote.png" style="font-size: 22px;" alt="Number"></span>
                                        </div>

                                        <div>
                                            <img src="/storage/pictures/{{$post->optionalPic}}" style="height: 120px;width: 100px; display: inline-block;margin-top: 2.5%;">
                                        </div>

                                        <div style="display: inline-block; margin-left: 15px;font-size: large;">
                                            <p style="position: absolute;"><a id="linknum" style="text-decoration: none;color:#000;" href="posts/{{$post->id}}">{{$post->title}}</a></p>
                                        </div>

                                    </div>
                                    <p>
                                    <span  class="postedBy">Posted by {{$name->userName}}</span>
                                    </p>
                                </div>
                                @endforeach
                        @endforeach

                    </div>

                    <div class="col-md-4">

                        <div class="card card-body bg-light" style="margin:0 3%;">
                        Crappy Sidebar 2
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aspernatur, dicta, dolores eaque eligendi error excepturi incidunt ipsa libero nostrum, obcaecati reiciendis suscipit ullam vel veritatis. Aspernatur at et fuga?</p>

                        <a href="/posts/create" class="btn btn-primary" style="  margin:0 auto;  display: -webkit-box;display: -moz-box;display: -ms-flexbox;display: -webkit-flex;display: flex;-webkit-box-align : center;-moz-box-align    : center;-ms-flex-align    : center;-webkit-align-items : center;align-items : center ;justify-content : center;-webkit-justify-content : center;-webkit-box-pack : center;-moz-box-pack : center;-ms-flex-pack : center;">Create a new discussion!</a>
                        </div>
                    </div>

                </div>

                <br><br>
                <div>




                </div>


    @endsection