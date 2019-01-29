@extends('partials.layout')

@section('title')
    La resiliencia en la vida real
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

    </style>
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">

            <div class="card-head style-primary">
                <header>Las Gafas de las Emociones</header>
            </div>

            <div class="card-body">
                <div id="componente-educativo">

                    <p>
                        A continuación, te presentarán unos videos, según tu perspectiva selecciona las gafas que los personajes utilizan en cada una de las situaciones:
                    </p>

                    <br />

                    <button type="button" class="btn btn-primary-light" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true" data-content=' <div class="row">
                                    <div class="col-md-6" style="text-align: center">
                                        <img src="{{ asset('ActividadGafasDeLasEmociones/001_gafas.png') }}" />
                                    </div>
                                    <div class="col-md-6" style="height: 100px; padding-top:25px">
                                        <p>Gafas de Felicidad </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="text-align: center">
                                        <img src=" {{ asset('ActividadGafasDeLasEmociones/002_gafas.png') }}" />
                                    </div>
                                    <div class="col-md-6" style="height: 100px; padding-top:25px">
                                        <p>Gafas de Tristeza</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="text-align: center">
                                        <img src=" {{ asset('ActividadGafasDeLasEmociones/003_gafas.png') }}" />
                                    </div>
                                    <div class="col-md-6" style="height: 100px; padding-top:25px">
                                        <p>Gafas de la Rabia </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="text-align: center">
                                        <img src=" {{ asset('ActividadGafasDeLasEmociones/004_gafas.png') }}" />
                                    </div>
                                    <div class="col-md-6" style="height: 100px; padding-top:25px">
                                        <p>Gafas del Miedo </p>
                                    </div>
                                </div>'>
                        Ver tipos de gafas!
                    </button>

                    <hr />

                    <p>Para ver los videos, presiona en el botón “CLICK AQUÍ”</p>
                    <div style="text-align: right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalv" onClick="createVideoPlayer()">CLICK AQUÍ</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="modalv" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="video-header-1" class="modal-title" style="display: inline">Las aves</h3>
                    <h3 id="video-header-2" class="modal-title componente-oculto">Piper el pájaro</h3>
                    <h3 id="video-header-3" class="modal-title componente-oculto">Nubes</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="video-1">
                        <div id="player1"></div>
                        <hr />
                        <div id="video-question-1">
                            <p>Según el video: ¿Cuáles son las gafas que usa el personaje al final?</p>
                            <div class="question" style="display: flex; text-align: center">
                                <div><img id="option-1" src="{{ asset('ActividadGafasDeLasEmociones/004_gafas.png') }}" width="80%" height="50px"/></div>
                                <div><img id="option-2" src="{{ asset('ActividadGafasDeLasEmociones/003_gafas.png') }}" width="80%" height="50px" /></div>
                                <div><img id="option-3" src="{{ asset('ActividadGafasDeLasEmociones/002_gafas.png') }}" width="80%" height="50px" /></div>
                                <div><img id="option-4" src="{{ asset('ActividadGafasDeLasEmociones/001_gafas.png') }}" width="80%" height="50px" /></div>
                            </div>
                        </div>
                    </div>
                    <div id="video-2" class="componente-oculto">
                        <div id="player2"></div>
                        <hr />
                        <div id="video-question-2">
                            <p>Según el video: ¿Cuáles son las gafas que usa el personaje al principio?</p>
                            <div class="question" style="display: flex; text-align: center">
                                <div><img id="option-5" src="{{ asset('ActividadGafasDeLasEmociones/004_gafas.png') }}" width="80%" height="50px"/></div>
                                <div><img id="option-6" src="{{ asset('ActividadGafasDeLasEmociones/003_gafas.png') }}" width="80%" height="50px" /></div>
                                <div><img id="option-7" src="{{ asset('ActividadGafasDeLasEmociones/002_gafas.png') }}" width="80%" height="50px" /></div>
                                <div><img id="option-8" src="{{ asset('ActividadGafasDeLasEmociones/001_gafas.png') }}" width="80%" height="50px" /></div>
                            </div>
                        </div>
                    </div>
                    <div id="video-3" class="componente-oculto">
                        <div id="player3"></div>
                        <hr />
                        <div id="video-question-3">
                            <p>Según el video: ¿Cuáles son las dos gafas que usa el personaje cuando ve que su gaviota se va para otra nube?</p>
                            <div class="multi-question" style="display: flex; text-align: center">
                                <div><img id="option-9" src="{{ asset('ActividadGafasDeLasEmociones/004_gafas.png') }}" width="80%" height="50px"/></div>
                                <div><img id="option-10" src="{{ asset('ActividadGafasDeLasEmociones/003_gafas.png') }}" width="80%" height="50px" /></div>
                                <div><img id="option-11" src="{{ asset('ActividadGafasDeLasEmociones/002_gafas.png') }}" width="80%" height="50px" /></div>
                                <div><img id="option-12" src="{{ asset('ActividadGafasDeLasEmociones/001_gafas.png') }}" width="80%" height="50px" /></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="nextStage" class="modal-footer componente-oculto">
                    <button type="button" class="btn btn-primary" onclick="nextStage()">Siguiente</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('addjs')

    <script src="http://www.youtube.com/player_api"></script>

    <script type="text/javascript">

        var stage1 = {
            url_video: "EtDV9fx8_Dg"
        }
        var stage2 = {
            url_video: "bPUFUrX5eiQ"
        }
        var stage3 = {
            url_video: "OybYKrIRK0Y"
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
                case 2:{
                    videoId = window.stage2.url_video;
                    break;
                }
                case 3:{
                    videoId = window.stage3.url_video;
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
            if(window.stageActual <= 2){
                $("#video-"+window.stageActual).fadeOut();
                $("#video-header-"+window.stageActual).fadeOut();
                window.player.stopVideo();
                window.stageActual ++;
                setTimeout(function () {
                    $("#video-"+window.stageActual).fadeIn(1000);
                },400)
                $("#video-header-"+window.stageActual).fadeIn();
                $("#nextStage").fadeOut();
                createVideoPlayer();
                window.selectedQuestion = null;
            }else{
                var location = "{{route('/gafas-de-las-emociones-3')}}";
                window.location.href = location;

            }
        }

        var selectedQuestion = null;

        $(".question").on("click",function (event) {
            var target = event.target;
            if(target.id.indexOf("option") > -1){
                if(window.selectedQuestion == null){
                    $("#nextStage").fadeIn();
                    window.selectedQuestion = target;
                    target.classList.add("selected");
                }else{
                    window.selectedQuestion.classList.remove("selected");
                    window.selectedQuestion = target;
                    target.classList.add("selected");
                }

            }
        })

        var selectedQuestion2 = null;

        $(".multi-question").on("click",function (event) {
            var target = event.target;
            if(target.id.indexOf("option") > -1 ){
                if(!target.classList.contains("selected")){
                    if(window.selectedQuestion == null){
                        window.selectedQuestion = target;
                        target.classList.add("selected");
                    }else if( window.selectedQuestion2 == null){
                        window.selectedQuestion2 = target;
                        target.classList.add("selected");
                    }

                    if(window.selectedQuestion && window.selectedQuestion2){
                        $("#nextStage").fadeIn();
                    }
                }else{
                    if(window.selectedQuestion.id === target.id){
                        window.selectedQuestion = null;
                        target.classList.remove("selected");
                    }

                    if(window.selectedQuestion2.id === target.id){
                        window.selectedQuestion2 = null;
                        target.classList.remove("selected");
                    }

                    if(!window.selectedQuestion || !window.selectedQuestion2){
                        $("#nextStage").fadeOut();
                    }
                }
            }
        })


    </script>

@endsection