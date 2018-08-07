<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Resilient</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .overlay {
            position:absolute;
            top:0;
            left:0;
            z-index:1;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 44px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
            <div class="jumbotron">
                    
                    {{-- <video autoplay="true" style="z-index:0; width:50%; height:100px; object-fit: cover;" preload="true">
                    <source src="{{asset('video/welcome.mp4')}}" type="video/mp4" />
                            Your browser does not support the video tag.
                    </video>
                    <div class="overlay">
                            <form>
                                <h1 style="color:white; margin-left:100px;">RESILIENT</h1>
                            </form>
                    </div> --}}

                    {{-- <H1>RESILIENT</H1> --}}
                   
                    <img style="height:150px; width:auto; float:right;" src="{{asset('img/logo.png')}}" alt="Logo" id="logo" style="width: 180px; height: auto; margin-bottom: 50px;">
                <h1 style="margin-left:100px;">RESILIENT</h1>
            </div>
        </div>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
              
            <div class="content">

            <div class="container">
                    <div class="col-md-6">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem cum aliquid qui, corrupti nostrum ipsum ratione deleniti nisi eligendi itaque at minus suscipit facilis provident aut totam quasi adipisci tempore!
                    </div>
            </div>
                
            </div>


        </div>
    </body>
</html>



