@extends('partials.layout')

@section('title')
    ¿Jugamos a las emociones?
@endsection

@section('addcss')

    <style>

        ul {
            list-style-type: none;
        }

        li {
            display: inline-block;
        }

        input[type="checkbox"][id^="op"] {
            display: none;
        }

        label {
            border: 1px solid #fff;
            padding: 10px;
            display: block;
            position: relative;
            margin: 10px;
            cursor: pointer;
        }

        .grow {
            width: 100%;
            text-align: center;
        }

        label::before {
            background-color: white;
            color: white;
            content: " ";
            display: block;
            border-radius: 50%;
            border: 1px solid grey;
            position: absolute;
            top: -5px;
            left: -5px;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 28px;
            transition-duration: 0.4s;
            transform: scale(0);
        }

        label img {
            max-width: 200px;
            width: 100%;
            height: 100%;
            transition-duration: 0.2s;
            transform-origin: 50% 50%;
        }

        :checked + label {
            border-color: #ddd;
        }

        :checked + label::before {
            content: "✓";
            background-color: grey;
            transform: scale(1);
        }

        :checked + label img {
            transform: scale(0.9);
            box-shadow: 0 0 5px #333;
            z-index: -1;
        }

         span > label{
            width: 20%;
            border: 1px solid black;
        }

        .grow { transition: all .2s ease-in-out; float: left; }
        .grow:hover { transform: scale(0.9); }
    </style>
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
            <div class="card-head style-accent-dark">
                    <header>Actividad 2</header>
                </div>

                <div class="card-body">

                    <p style="font-size: 1.2em">
                        En esta actividad utilizarás los globos y los marcadores. Lo primero que deberás hacer es inflar los 4 globos,
                        cuando ya estén listos les dibujaras una cara con los marcadores. Al color amarillo le harás una cara de felicidad,
                        al color azul le harás una cara de tristeza,
                        al color rojo le pintaras una cara de enojo y al globo morado le harás una cara de miedo.
                    </p>

                    <p style="font-size: 1.2em">
                       para ver el video:
                    </p>
                    <button type="button" class="btn btn-accent-light" data-toggle="modal" data-target="#modalv">CLICK AQUÍ</button>

                    <hr />

                    <div style="text-align: right">
                                <button id="nextStage" class="btn btn-accent-light">
                                <a href="{{ route("/jugamos-a-las-emociones-4") }}">
                                    Entendido!
                                </a>
                            </button>
                    </div>
                </div>
        </div>
    </div>

    <div id="modalv" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="video-header-1" class="modal-title" style="display: inline">Globos de las emociones</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="video-1">
                        <div id="player1"></div>
                        <hr />
                    </div>
                    <p>
                        Algunas cosas cambian, pero no importa, sigue las instrucciones que te damos nosotros y solo usa este video para guiarte de la forma de hacer lo que ya te hemos explicado.
                    </p>
                    <p>
                        Cuando ya hayas hecho las actividades, juega con tu hijo y con los globos. Le puedes explicar qué bomba es que emoción, y le puedes ejemplificar también con tu rostro.
                        <i><b>Ejemplo:</b> le puedes decir “mamá está feliz” y te pones la bomba de alegría en el rostro.</i>
                    </p>
                </div>
                <div id="nextStage" class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="onBlur();">Sigamos</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section("addjs")

    <script src="http://www.youtube.com/player_api"></script>

    <script type="text/javascript">

        function createVideoPlayer(){

            function onYouTubePlayerAPIReady() {
                window.player = new YT.Player('player1', {
                    width: '100%',
                    height: '315',
                    videoId: "NcwPcdCqE4c",
                    events: {
                        onStateChange: onPlayerStateChange
                    }
                });
            }

            // when video ends
            function onPlayerStateChange(event) {
                if(event.data === 0) {
                }
            }

            onYouTubePlayerAPIReady();
        }

        $(window).load(function () {
            createVideoPlayer();
        });
        
        function onBlur() {
            window.player.stopVideo();
        }

        $("#modalv").on("hidden.bs.modal",function () {
            onBlur();
        });
        

    </script>
@endsection
