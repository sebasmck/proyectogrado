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


            /* slideshow */


            body{
            /* background: #000; */
            /*overflow: hidden;*/
            }
            .bss-slides{
            background: #000;
            position: relative;
            display: block;    
            }
            .bss-slides:focus{
            outline: 0;
            }
            .bss-slides figure{
            position: absolute;
            top: 0;
            width: 100%;
            }
            .bss-slides figure:first-child{
            position: relative;
            }
            .bss-slides figure img{
            opacity: 0;
            -webkit-transition: opacity 1.2s;
            transition: opacity 1.2s;
            position: relative;
            /*-webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            */
            }
            .bss-slides .bss-show {
            z-index: 3;
            }
            .bss-slides .bss-show img{
            opacity: 1;
            /* -webkit-backface-visibility: hidden;
            backface-visibility: hidden;*/
            }

            .bss-slides figcaption{
            position: absolute;
            font-family: sans-serif;
            font-size: .8em;
            bottom: .75em;
            right: .35em;
            padding: .25em;
            color: #fff;
            background: #000;
            background: rgba(0,0,0, .25);
            border-radius: 2px;
            opacity: 0;
            -webkit-transition: opacity 1.2s;
            transition: opacity 1.2s;
            }
            .bss-slides .bss-show figcaption{
            z-index: 2;
            opacity: 1;
            }
            .bss-slides figcaption a{
            color: #fff;    
            }
            .bss-next, .bss-prev{
            color: #fff;
            position: absolute;
            background: #000;
            background: rgba(0,0,0, .6);
            top: 50%;
            z-index: 4;
            font-size: 2em;
            margin-top: -1.2em;
            opacity: .5;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            }
            .bss-next:hover, .bss-prev:hover{
            cursor: pointer;
            opacity: 1;
            }
            .bss-next{
            right: 0;
            padding: 10px 5px 15px 10px;
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
            }
            .bss-prev{
            left: 0;
            padding: 10px 10px 15px 5px;
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
            }
            .bss-fullscreen{
            display: block;
            width: 24px;
            height: 24px;    
            background: rgba(0,0,0,.3) url(https://leemark.github.io/better-simple-slideshow/img/arrows-alt_ffffff_64.png); 
            -webkit-background-size: contain; 
            background-size: contain;
            position: absolute;
            top: 5px;
            left: 5px;   
            cursor: pointer;    
            opacity: .3;
            } 
            .bss-fullscreen:hover{
            opacity: .8;   
            }
            :-webkit-full-screen .bss-fullscreen{
                background: rgba(0,0,0,.4) url(https://leemark.github.io/better-simple-slideshow/img/compress_ffffff_64.png);
                -webkit-background-size: contain;
                background-size: contain;
            }
            :-moz-full-screen .bss-fullscreen{
                background: rgba(0,0,0,.4) url(https://leemark.github.io/better-simple-slideshow/img/compress_ffffff_64.png);
                background-size: contain;
            }
            :-ms-fullscreen .bss-fullscreen{
                background: rgba(0,0,0,.4) url(https://leemark.github.io/better-simple-slideshow/img/compress_ffffff_64.png);
                background-size: contain;
            }
            :full-screen .bss-fullscreen{
                background: rgba(0,0,0,.4) url(https://leemark.github.io/better-simple-slideshow/img/compress_ffffff_64.png);
                -webkit-background-size: contain;
                background-size: contain;
            }
            :-webkit-full-screen .bss-fullscreen{
                background: rgba(0,0,0,.4) url(https://leemark.github.io/better-simple-slideshow/img/compress_ffffff_64.png);
                -webkit-background-size: contain;
                background-size: contain;
            }
            :-moz-full-screen .bss-fullscreen{
                background: rgba(0,0,0,.4) url(https://leemark.github.io/better-simple-slideshow/img/compress_ffffff_64.png);
                background-size: contain;
            }
            :-ms-fullscreen .bss-fullscreen{
                background: rgba(0,0,0,.4) url(https://leemark.github.io/better-simple-slideshow/img/compress_ffffff_64.png);
                background-size: contain;
            }
            :fullscreen .bss-fullscreen{
                background: rgba(0,0,0,.4) url(https://leemark.github.io/better-simple-slideshow/img/compress_ffffff_64.png);
                -webkit-background-size: contain;
                background-size: contain;
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
            <a href="{{ route('login') }}">Iniciar sesión</a>
            <a href="{{ route('register') }}">Registrarse</a>
            @endauth
        </div>
        @endif

        <div class="content">

            <div class="container">

                {{-- Slideshow --}}

                <img style="margin-bottom:5%;" src="{{asset('img/ueblogo.png')}}" width="15%" />

                

                <legend></legend>

                <div class="bss-slides demo1" tabindex="1" autofocus="autofocus">
                    <figure>
                        <img src="{{asset('img/home/family_1.jpeg')}}" width="100%" height="80%"/>
                        <figcaption>Resilient</figcaption>
                    </figure>
                    <figure>
                        <img src="{{asset('img/home/family_3.jpeg')}}" width="100%" height="80%" />
                        <figcaption>Resilient</figcaption>
                    </figure>
                    <figure>
                        <img src="{{asset('img/home/family_4.jpeg')}}" width="100%" height="80%" />
                        <figcaption>Resilient</figcaption>
                    </figure>
                    <figure>
                        <img src="{{asset('img/home/family_5.jpeg')}}" width="100%" height="80%" />
                        <figcaption>Resilient</figcaption>
                    </figure>
                </div> <!-- // bss-slides -->
                <script src="https://leemark.github.io/better-simple-slideshow/demo/js/hammer.min.js"></script><!-- for swipe support on touch interfaces -->

                <br>
            </div>

            
            


        </div>


    </div>

    <script>

        var makeBSS = function (el, options) {
        var $slideshows = document.querySelectorAll(el), // a collection of all of the slideshow
            $slideshow = {},
            Slideshow = {
                init: function (el, options) {
                    this.counter = 0; // to keep track of current slide
                    this.el = el; // current slideshow container    
                    this.$items = el.querySelectorAll('figure'); // a collection of all of the slides, caching for performance
                    this.numItems = this.$items.length; // total number of slides
                    options = options || {}; // if options object not passed in, then set to empty object 
                    options.auto = options.auto || false; // if options.auto object not passed in, then set to false
                    this.opts = {
                        auto: (typeof options.auto === "undefined") ? false : options.auto,
                        speed: (typeof options.auto.speed === "undefined") ? 1500 : options.auto.speed,
                        pauseOnHover: (typeof options.auto.pauseOnHover === "undefined") ? false : options.auto.pauseOnHover,
                        fullScreen: (typeof options.fullScreen === "undefined") ? false : options.fullScreen,
                        swipe: (typeof options.swipe === "undefined") ? false : options.swipe
                    };
                    
                    this.$items[0].classList.add('bss-show'); // add show class to first figure 
                    this.injectControls(el);
                    this.addEventListeners(el);
                    if (this.opts.auto) {
                        this.autoCycle(this.el, this.opts.speed, this.opts.pauseOnHover);
                    }
                    if (this.opts.fullScreen) {
                        this.addFullScreen(this.el);
                    }
                    if (this.opts.swipe) {
                        this.addSwipe(this.el);
                    }
                },
                showCurrent: function (i) {
                    // increment or decrement this.counter depending on whether i === 1 or i === -1
                    if (i > 0) {
                        this.counter = (this.counter + 1 === this.numItems) ? 0 : this.counter + 1;
                    } else {
                        this.counter = (this.counter - 1 < 0) ? this.numItems - 1 : this.counter - 1;
                    }

                    // remove .show from whichever element currently has it 
                    // http://stackoverflow.com/a/16053538/2006057
                    [].forEach.call(this.$items, function (el) {
                        el.classList.remove('bss-show');
                    });
    
                    // add .show to the one item that's supposed to have it
                    this.$items[this.counter].classList.add('bss-show');
                },
                injectControls: function (el) {
                // build and inject prev/next controls
                    // first create all the new elements
                    var spanPrev = document.createElement("span"),
                        spanNext = document.createElement("span"),
                        docFrag = document.createDocumentFragment();
            
                    // add classes
                    spanPrev.classList.add('bss-prev');
                    spanNext.classList.add('bss-next');
            
                    // add contents
                    spanPrev.innerHTML = '&laquo;';
                    spanNext.innerHTML = '&raquo;';
                    
                    // append elements to fragment, then append fragment to DOM
                    docFrag.appendChild(spanPrev);
                    docFrag.appendChild(spanNext);
                    el.appendChild(docFrag);
                },
                addEventListeners: function (el) {
                    var that = this;
                    el.querySelector('.bss-next').addEventListener('click', function () {
                        that.showCurrent(1); // increment & show
                    }, false);
                
                    el.querySelector('.bss-prev').addEventListener('click', function () {
                        that.showCurrent(-1); // decrement & show
                    }, false);
                    
                    el.onkeydown = function (e) {
                        e = e || window.event;
                        if (e.keyCode === 37) {
                            that.showCurrent(-1); // decrement & show
                        } else if (e.keyCode === 39) {
                            that.showCurrent(1); // increment & show
                        }
                    };
                },
                autoCycle: function (el, speed, pauseOnHover) {
                    var that = this,
                        interval = window.setInterval(function () {
                            that.showCurrent(1); // increment & show
                        }, speed);
                    
                    if (pauseOnHover) {
                        el.addEventListener('mouseover', function () {
                            interval = clearInterval(interval);
                        }, false);
                        el.addEventListener('mouseout', function () {
                            interval = window.setInterval(function () {
                                that.showCurrent(1); // increment & show
                            }, speed);
                        }, false);
                    } // end pauseonhover
                    
                },
                addFullScreen: function(el){
                    var that = this,
                    fsControl = document.createElement("span");
                    
                    fsControl.classList.add('bss-fullscreen');
                    el.appendChild(fsControl);
                    el.querySelector('.bss-fullscreen').addEventListener('click', function () {
                        that.toggleFullScreen(el);
                    }, false);
                },
                addSwipe: function(el){
                    var that = this,
                        ht = new Hammer(el);
                    ht.on('swiperight', function(e) {
                        that.showCurrent(-1); // decrement & show
                    });
                    ht.on('swipeleft', function(e) {
                        that.showCurrent(1); // increment & show
                    });
                },
                toggleFullScreen: function(el){
                    // https://developer.mozilla.org/en-US/docs/Web/Guide/API/DOM/Using_full_screen_mode
                    if (!document.fullscreenElement &&    // alternative standard method
                        !document.mozFullScreenElement && !document.webkitFullscreenElement &&   
                        !document.msFullscreenElement ) {  // current working methods
                        if (document.documentElement.requestFullscreen) {
                        el.requestFullscreen();
                        } else if (document.documentElement.msRequestFullscreen) {
                        el.msRequestFullscreen();
                        } else if (document.documentElement.mozRequestFullScreen) {
                        el.mozRequestFullScreen();
                        } else if (document.documentElement.webkitRequestFullscreen) {
                        el.webkitRequestFullscreen(el.ALLOW_KEYBOARD_INPUT);
                        }
                    } else {
                        if (document.exitFullscreen) {
                        document.exitFullscreen();
                        } else if (document.msExitFullscreen) {
                        document.msExitFullscreen();
                        } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                        } else if (document.webkitExitFullscreen) {
                        document.webkitExitFullscreen();
                        }
                    }
                } // end toggleFullScreen
                
            }; // end Slideshow object 
            
        // make instances of Slideshow as needed
        [].forEach.call($slideshows, function (el) {
            $slideshow = Object.create(Slideshow);
            $slideshow.init(el, options);
        });
    };
    var opts = {
        auto : {
            speed : 5000, 
            pauseOnHover : true
        },
        fullScreen : true, 
        swipe : true
    };
    makeBSS('.demo1', opts);


    </script>

</body>

</html>