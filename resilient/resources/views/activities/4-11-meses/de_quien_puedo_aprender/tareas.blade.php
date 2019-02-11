@extends('partials.layout')

@section('title')
    de quien puedo aprender
@endsection

@section('addcss')
    <style>
        .selected {
            border: dashed lightskyblue 2px;
            padding: 1px;
        }

        .popover{
            max-width: 100%;
            width: 550px;
        }

        .componente-oculto {
            display: none;
        }

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
            height: 90px;
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
                <header>Tarea para la semana</header>
            </div>

            <div class="card-body">
                <div id="componente-educativo">

                    <div style="text-align: center">
                        <img src="{{ asset('ActividadDqpa/001_grillo.png') }}">
                    </div>

                    <p>
                        Ver el siguiente video:
                    </p>


                    <hr />

                    <p>Para ver el video, presiona en el botón “CLICK AQUÍ”</p>
                    <div style="text-align: right">
                        <button type="button" class="btn btn-accent-bright" data-toggle="modal" data-target="#modalv" onClick="createVideoPlayer()">CLICK AQUÍ</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="modalv" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="video-header-1" class="modal-title" style="display: inline">Alike</h3>
                    <h3 id="video-header-2" class="modal-title componente-oculto">Pregunta relacionada</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="myform" method="GET" action="{{route('/de-quien-puedo-aprender-5')}}">
                <div class="modal-body">
                    <div id="video-1">
                        <div id="player1"></div>
                        <hr />
                        <div id="video-question-1">
                            <p>¿Qué sugiere el video? Para la interacción entre padres e hijos? Selecciona las opciones que consideras correctas</p>
                            <div class="space-content question">

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                                <span>
                                                   <input type="checkbox" id="op1" name="option1" required/>
                                                    <label class="grow" for="op1">
                                                        <p>COMPARTIR TIEMPO CON LOS HIJOS</p>
                                                    </label>
                                                </span>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                                                <span>
                                                                   <input type="checkbox" id="op2" name="option2" />
                                                                    <label class="grow" for="op2">
                                                                        <p>HACER CASO OMISO A SUS PREGUNTAS</p>
                                                                    </label>
                                                                </span>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                                                <span>
                                                                   <input type="checkbox" id="op3" name="option3" required/>
                                                                    <label class="grow" for="op3">
                                                                        <p>ENSEÑAR CON AMOR</p>
                                                                    </label>
                                                                </span>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                                                <span>
                                                                   <input type="checkbox" id="op4" name="option4"/>
                                                                    <label class="grow" for="op4">
                                                                        <p>EL NIÑO A LA ESCUELA, EL PADRE AL TRABAJO</p>
                                                                    </label>
                                                                </span>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                                                <span>
                                                                   <input type="checkbox" id="op5" name="option5" required/>
                                                                    <label class="grow" for="op5">
                                                                        <p>VALIDAR SUS EMOCIONES</p>
                                                                    </label>
                                                                </span>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                                                <span>
                                                                   <input type="checkbox" id="op6" name="option6" required/>
                                                                    <label class="grow" for="op6">
                                                                        <p>VALIDAR SUS GUSTOS Y PREFERENCIAS</p>
                                                                    </label>
                                                                </span>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                                                <span>
                                                                   <input type="checkbox" id="op7" name="option7" />
                                                                    <label class="grow" for="op7">
                                                                        <p>COMUNICARSE POR MEDIO DEL JUEGO</p>
                                                                    </label>
                                                                </span>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                                                <span>
                                                                   <input type="checkbox" id="op8" name="option8" required/>
                                                                    <label class="grow" for="op8">
                                                                        <p>ESCUCHAR Y RESPONDER SUS PREGUNTAS</p>
                                                                    </label>
                                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="video-2" class="componente-oculto">
                        <div id="player2"></div>
                        <div id="video-question-2">
                            <p>Que aportes te brinda el video y la metáfora El bambú Japonés </p>
                            <div class="question" style="display: flex; text-align: center">
                                <textarea name="rta-1" rows="8" style="width: 100%" minlength="5" maxlength="1000" required></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="nextStage" class="modal-footer componente-oculto">
                    <button id="goTo" type="button" class="btn btn-primary" onclick="nextStage()">Siguiente</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('addjs')

    <script src="http://www.youtube.com/player_api"></script>

    <script type="text/javascript">

        var stage1 = {
            url_video: "kQjtK32mGJQ"
        }

        var stageActual = 1;
        var player;

        function createVideoPlayer(){

            videoId = "";
            switch (window.stageActual) {
                case 1:{
                    videoId = window.stage1.url_video;
                    break;
                }
            }


            function onYouTubePlayerAPIReady() {
                window.player = new YT.Player('player'+stageActual, {
                    width: '100%',
                    height: '315',
                    videoId: videoId,
                    events: {
                        onStateChange: onPlayerStateChange
                    }
                });
            }

            // when video ends
            function onPlayerStateChange(event) {
                if(event.data === 0) {
                    unblockQuestion();
                }
            }

            onYouTubePlayerAPIReady();
        }

        function unblockQuestion(){
          //  $("#video-question-"+window.stageActual).fadeIn();
        }
        
        function nextStage() {
            if(window.stageActual == 1){
                $("#video-"+window.stageActual).fadeOut();
                $("#video-header-"+window.stageActual).fadeOut();
                window.player.stopVideo();
                window.stageActual ++;
                setTimeout(function () {
                    $("#video-"+window.stageActual).fadeIn(1000);
                },400)
                $("#video-header-"+window.stageActual).fadeIn();
                $("#goTo").prop("type","submit");
            }
        }
        var contador = 0;

        $(".question").on("click",function (event) {
            var tar = event.target;

            if(tar.id.indexOf("op") > -1)
            {
                if(tar.id === "op1"){
                    if(tar.checked){
                        contador ++;
                    }else{
                        contador --;
                    }
                }

                if(tar.id === "op2"){
                    if(tar.checked){
                        contador --;
                    }else{
                        contador ++;
                    }
                }

                if(tar.id === "op3"){
                    if(tar.checked){
                        contador ++;
                    }else{
                        contador --;
                    }
                }

                if(tar.id === "op4"){
                    if(tar.checked){
                        contador --;
                    }else{
                        contador ++;
                    }
                }

                if(tar.id === "op5"){
                    if(tar.checked){
                        contador ++;
                    }else{
                        contador --;
                    }
                }

                if(tar.id === "op6"){
                    if(tar.checked){
                        contador ++;
                    }else{
                        contador --;
                    }
                }

                if(tar.id === "op7"){
                    if(tar.checked){
                        contador --;
                    }else{
                        contador ++;
                    }
                }

                if(tar.id === "op8"){
                    if(tar.checked){
                        contador ++;
                    }else{
                        contador --;
                    }
                }

                if(contador == 5){
                    $("#nextStage").fadeIn(2000);
                }else{
                    $("#nextStage").hide();
                }
            }
        });


    </script>

@endsection