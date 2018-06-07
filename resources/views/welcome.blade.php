<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- SuperSlides -->
        <link rel="stylesheet" type="text/css" href="css/superslides.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                /*height: 100vh;*/
                margin: 0;
                min-width: 100%;
                overflow: hidden;

            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            /*.content {*/
                /*text-align: center;*/
            /*}*/

            /*.title {*/
                /*font-size: 84px;*/
            /*}*/

            .links > a {
                color: #000;
                padding: 0 25px;
                font-size: 23px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #badTag{
                border: #9fcdff;
                border-radius: 10px;
                text-decoration: none;
                font-size: x-large;
                display: inline-block;
                color: #fff;
                padding: 10px 24px 10px 24px;
                border-top: 2px solid #0000FF;
                border-right: 2px solid #0000FF;
                border-bottom: 2px solid #0000FF;
                border-left: 2px solid #0000FF;
                position: absolute;
                margin-top: 20%;
            }
        </style>

        {{-- JQuery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



    </head>

    <body style="min-height: 720px; min-width: 1280px;">

    <div id="slides">
        <ul class="slides-container">
            <li>
                <img src="img/temp.jpg" alt="">
                <div class="container">
                    <div class="flex-center position-ref full-height">
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a href="{{ url('/contents') }}">NotReddit</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>
                                    <a href="{{ route('register') }}">Sign up</a>
                                @endauth
                            </div>
                        @endif
                                <a id = "badTag"  href="contents">Take me to content!</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>





        {{-- JS--}}
        <script src="js\jquery.superslides.min.js"></script>
    <script src="js\script.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
