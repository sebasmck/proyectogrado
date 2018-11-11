@extends('partials.layout')

@section('title')
    Intro Actividad 1
@endsection

<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        margin-top: 60px;
    }

    .row:after,
    .hitbox:after {
        content: "";
        display: table;
        clear: both;
    }

    [class^="col-"] {
        float: left;
    }

    .col-full {
        width: 100%;
    }

    .col-half {
        width: 50%;
    }

    .col-quarter {
        width: 24%;
        margin: 0.5%;
        background-color: #aaaaaa;
    }

    .hitbox {
        position: relative;
    }

    .container-height{
        height: 60px;
    }

    .hitbox:before {
        display: block;
        content: "";
    }

    .dropzone {
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        min-height: 60px !important;
        background-size: 100% auto;
        background-repeat: no-repeat;
        background-position: center;
    }

    .answer {
        width: 25%;
        height: 25%;
        position: absolute;
        bottom: 0;
        right: 0;
        z-index: 1;
    }

    .answer.show {
        visibility: visible;
    }

    .answer.hide {
        visibility: hidden;
    }

    .dropzone:not(.container) .icon {
        width: 100%;
        height: 20px;
        margin: 0;
    }

    .dropzone {
        min-height: 60px;
    }

    .container {
        background-image: url("img/putback-bg.png");
        background-size: 100% 100%;
    }

    .icon {
        width: 24%;
        margin: 0.5%;
        background-color: #1e8adf;
    }

    .paragraph-container {
        height: 70px;
    }


</style>

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <form id="form" method="GET" action="{{ route('/actividades-aprendamos-resiliencia-8') }}">
        <div class="card">
            <div class="card-head style-accent-dark">
                <header>Sobre las verbalizaciones de Grotberg</header>
            </div>
            <div class="card-body">
                <div id="preparacion">
                    <p> Dentro del modelo se explican las “Verbalizaciones resilientes”
                        a continuación encontrarás 4 cuadros donde se explicará cada una de ellas con un ejemplo.
                        Estas, según la teoría, son expresiones de los niños con características resilientes.
                        Al lado de cada una de las verbalizaciones encontrarás el sentido de cada una.
                    </p>
                    <div class="text-center">
                        <img src="{{ asset('ActividadAprendamosResiliencia/verbalizaciones_grotberg.png') }}" alt="verbalizaciones de Grotberg">
                    </div>
                    <div class="text-right">
                        <button type="button" id="next" class="btn btn-primary">Siguiente</button>
                    </div>
                </div>

                <!-- Drag and drop activity -->

                <div id="actividad" style="display: none">
                    <p> Selecciona una de las 4 opciones y arrastra</p>

                    <div class="row">
                        <div class="col-sm-12 hitbox" >
                            <div id="dropzone-container" class="col-sm-12 dropzone container" ondragenter="return enter(event)" ondragover="return over(event)" ondrop="return drop(event)">
                                <div id="drag-yotengo" class="icon" draggable="true" ondragstart="return start(event)" ondragend="return end(event)">“Yo tengo”</div>
                                <div id="drag-yosoy" class="icon" draggable="true" ondragstart="return start(event)" ondragend="return end(event)">“Yo soy”</div>
                                <div id="drag-yoestoy" class="icon" draggable="true" ondragstart="return start(event)" ondragend="return end(event)">“Yo estoy”</div>
                                <div id="drag-yopuedo" class="icon" draggable="true" ondragstart="return start(event)" ondragend="return end(event)">“Yo puedo”</div>
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-sm-12 container-height">
                                <div id="dropzone-holder">

                                    <div class="col-sm-4 hitbox">
                                        <img class="answer hide" src="img/correct-green.png" />
                                        <div id="dropzone-1" class="dropzone" ondragenter="return enter(event)" ondragover="return over(event)" ondrop="return drop(event)">
                                        </div>
                                    </div>

                                    <div class="col-sm-8" style="padding-top: 20px">
                                        <p>
                                            Personas que me ponen límites para que aprenda a evitar peligros o problemas.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 container-height">
                                <div id="dropzone-holder">
                                    <div class="col-sm-4 hitbox">
                                        <img class="answer hide" src="img/correct-green.png" />
                                        <div id="dropzone-2" class="dropzone" ondragenter="return enter(event)" ondragover="return over(event)" ondrop="return drop(event)">
                                        </div>

                                    </div>
                                    <div class="col-sm-8" style="padding-top: 20px">
                                        <p>
                                            Feliz cuando hago algo bueno para los demás y les demuestro mi afecto
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 container-height">
                                <div id="dropzone-holder">
                                    <div class="col-sm-4 hitbox">
                                        <img class="answer hide" src="img/correct-green.png" />
                                        <div id="dropzone-3" class="dropzone" ondragenter="return enter(event)" ondragover="return over(event)" ondrop="return drop(event)">
                                        </div>
                                    </div>
                                    <div class="col-sm-8" style="padding-top: 20px">
                                        <p>
                                            Buscar la manera de resolver mis problemas.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-12 container-height">
                                <div id="dropzone-holder">
                                    <div class="col-sm-4 hitbox">
                                        <img class="answer hide" src="img/correct-green.png" />
                                        <div id="dropzone-4" class="dropzone" ondragenter="return enter(event)" ondragover="return over(event)" ondrop="return drop(event)">
                                        </div>
                                    </div>
                                    <div class="col-sm-8" style="padding-top: 20px">
                                        <p>
                                            Seguro de que todo saldrá bien.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection

@section('addjs')

    <script>
        $("#next").click(function () {
            $("#preparacion").fadeOut();
            $("#actividad").fadeIn();
        });
    </script>

    <script type="text/javascript">
        var start = function(e) {
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('iconId', e.target.id);
            e.dataTransfer.setDragImage(e.target, 0, 0);
            return true;
        }

        var enter = function(e) {
            return true;
        }

        var over = function(e) {
            var iconId = e.dataTransfer.getData('iconId');
            var targetId = e.target.id;


            if(e.target.childNodes.length >= 2 ){
                return true;
            }

            if(targetId == iconId){
                return true;
            }

            return false;
        }

        var drop = function(e) {
            var iconId = e.dataTransfer.getData('iconId');
            var icon = document.getElementById(iconId);
            if(e.target.id.indexOf('drag') > -1){
                e.stopPropagation();
                changePositions(e.target, icon);
            }else{
                e.target.appendChild(icon);
                e.stopPropagation();
            }

            return false;
        }

        var end = function(e) {
            e.dataTransfer.clearData('iconId');
            return true;
        }

        var pollResults = function() {

            var hitboxes = document.getElementById('dropzone-holder').children;

            for (var i = 0; i < hitboxes.length; ++i) {
                var hitbox = hitboxes[i];
                var dropzone = hitbox.lastElementChild;

                if (dropzone.children.length > 0) {
                    dropzone.style.backgroundSize = '0';

                    var dropzoneId = dropzone.id;
                    var iconId = dropzone.firstElementChild.id;

                    var dropzoneName = dropzoneId.substring(dropzoneId.indexOf('-') + 1);
                    var iconName = iconId.substring(iconId.indexOf('-') + 1);

                    dropzone.previousElementSibling.setAttribute('class', 'answer show');

                } else {
                    dropzone.style.backgroundSize = '100% auto';
                }
            }
        }

        setInterval(pollResults, 50);

        var shuffleIcons = function() {
            var dropzoneContainer = document.getElementById('dropzone-container');
            var icons = dropzoneContainer.children;
            var fragment = document.createDocumentFragment();
            while (icons.length) {
                fragment.appendChild(icons[Math.floor(Math.random() * icons.length)]);
            }
            dropzoneContainer.appendChild(fragment);
        }

        var shuffleDropzones = function() {
            var dropzoneHolder = document.getElementById('dropzone-holder');
            var dropzones = dropzoneHolder.children;
            var fragment = document.createDocumentFragment();
            while (dropzones.length) {
                fragment.appendChild(dropzones[Math.floor(Math.random() * dropzones.length)]);
            }
            dropzoneHolder.appendChild(fragment);
        }

        var changePositions = function(target, element) {
            if( target.id.indexOf('drag') > -1 && element.id.indexOf('drag') > -1){

                var elemento = $("#"+element.id);
                var objetivo = $("#"+target.id);

                var elementoPadre = elemento.parent();
                var objectivoPadre = objetivo.parent();

                var elementoNuevo =  elemento.clone();
                var targetNuevo = objetivo.clone();

                elemento.remove();
                objetivo.remove();

                elementoPadre.append(targetNuevo);
                objectivoPadre.append(elementoNuevo);
            }

        }

        window.onload = function() {
            shuffleIcons();
            shuffleDropzones();
        }
    </script>



@endsection
