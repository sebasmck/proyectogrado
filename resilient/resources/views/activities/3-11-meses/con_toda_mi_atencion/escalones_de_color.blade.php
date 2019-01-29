@extends('partials.layout')

@section('title')
   Los escalones de color
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
        height: auto;
    }

    .hitbox:before {
        display: block;
    }

    .dropzone {
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        min-height: 60px !important;
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
        height: 100%;
        margin: 0;
    }

    .dropzone {
        min-height: 75px;
        padding: 0px !important;
        text-align: center;
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
        <form id="form" method="GET" action="{{ route('/con-toda-mi-atencion-5') }}">
        <div class="card">
            <div class="card-head style-accent-dark">
                <header>Los escalones de color</header>
            </div>
            <div class="card-body">
                <div id="preparacion">
                    <p><b>Instrucción:</b> A continuación reflexiona sobre la imagen que se presenta, es la técnica del semáforo que puedes utilizar
                        para conseguir tranquilizarte cuando estés expuesto frente a situaciones que te provocan malestar.
                    </p>
                    <div class="text-center">
                        <img src="{{ asset('ActividadCtma/001_escaleras.png') }}" alt="Escaleras de las emociones">
                    </div>
                    <div class="text-right">
                        <button type="button" id="next" class="btn btn-primary">Siguiente</button>
                    </div>
                </div>

                <!-- Drag and drop activity -->

                <div id="actividad" style="display: none">
                    <p><b>Instrucción:</b> ¡veamos si lo aprendiste! Selecciona cada escalón y ubícalo en el recuadro que corresponda según el orden de la técnica del semáforo.</p>

                    <div class="row">
                        <div class="col-sm-12 hitbox" style="margin-top: 20px">
                            <div id="dropzone-container" class="col-sm-12 dropzone container" ondragenter="return enter(event)" ondragover="return over(event)" ondrop="return drop(event)">
                                <div id="drag-actuo" style="background-color: green" class="icon" draggable="true" ondragstart="return start(event)" ondragend="return end(event)">Actúo</div>
                                <div id="drag-paro" style="background-color: red" class="icon" draggable="true" ondragstart="return start(event)" ondragend="return end(event)">Paro</div>
                                <div id="drag-pienso" style="background-color: yellow" class="icon" draggable="true" ondragstart="return start(event)" ondragend="return end(event)">Pienso</div>
                            </div>
                        </div>
                    </div>

                        <div class="row" style="margin-top: 50px; height: 250px;">
                            <div class="col-xs-4 container-height">
                            </div>

                            <div class="col-xs-4" style="height: 250px;">

                                <div id="dropzone-holder">

                                    <div class="col-sm-4 hitbox no-padding" style="background-color: lightskyblue; height: 75px; margin-top: 175px;">
                                        <div id="dropzone-1" class="dropzone" ondragenter="return enter(event)" ondragover="return over(event)" ondrop="return drop(event)">
                                        </div>
                                    </div>
                                </div>

                                <div id="dropzone-holder">

                                    <div class="col-sm-4 hitbox no-padding" style="background-color: lightskyblue; height: 150px; margin-top: 100px">
                                        <div id="dropzone-2" class="dropzone" ondragenter="return enter(event)" ondragover="return over(event)" ondrop="return drop(event)">
                                        </div>
                                    </div>
                                </div>

                                <div id="dropzone-holder">

                                    <div class="col-sm-4 hitbox no-padding" style="background-color: lightskyblue; height: 250px">
                                        <div id="dropzone-3" class="dropzone" ondragenter="return enter(event)" ondragover="return over(event)" ondrop="return drop(event)">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-4 container-height">
                            </div>
                        </div>

                        <hr />

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
            $("#preparacion").fadeOut(300);
            setTimeout(function () {
                $("#actividad").fadeIn(500)
            },500)
        });
    </script>

    <script type="text/javascript">

        var drop1 = false;
        var drop2 = false;
        var drop3 = false;
        var drop4 = false;

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

            if(targetId === iconId){
                return true;
            }

            return false;
        }

        var drop = function(e) {
            var iconId = e.dataTransfer.getData('iconId');
            var icon = document.getElementById(iconId);
            if(e.target.id != iconId){
                if(e.target.id.indexOf('drag') > -1){
                    e.stopPropagation();
                    changePositions(e.target, icon);
                }else{
                    e.target.appendChild(icon);
                    validate();
                    e.stopPropagation();
                }
            }

            return false;
        }

        var end = function(e) {
            e.dataTransfer.clearData('iconId');
            return true;
        }

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

                validate();

            }

        }

        function validate(){
            var padre3 = $("#drag-actuo").parent();
            var padre1 = $("#drag-paro").parent();
            var padre2 = $("#drag-pienso").parent();

            if(padre3[0].id === "dropzone-3"){
                drop3 = true;
            }else{
                drop3 = false;
            }
            if(padre1[0].id === "dropzone-1"){
                drop1 = true;
            }
            else{
                drop1 = false;
            }
            if(padre2[0].id  === "dropzone-2"){
                drop4 = true;
            }else{
                drop4 = false;
            }
        }

        function comprobar(){
            if(drop1 && drop3 && drop4 === true){
                return true;
            }else{
                return false;
            }
        }

        $(document).on('click', 'form button[type=submit]', function(e) {
                if (!comprobar()) {
                    e.preventDefault(); //prevent the default action
                    alert("Debes relacionar correctamente las opciones para seguir avanzando");
                }
            });

        window.onload = function() {
            shuffleIcons();
            shuffleDropzones();
        }
    </script>



@endsection
