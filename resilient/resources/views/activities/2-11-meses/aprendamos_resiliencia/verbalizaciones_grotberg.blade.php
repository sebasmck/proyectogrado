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
        width: 80%;
        height: 20px;
        margin: 0;
    }

    .dropzone {
        min-height: 60px;
        border: dashed 0.5px #1e8adf !important;
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
                        <div class="col-sm-12 hitbox" style="margin-top: 20px">
                            <div id="dropzone-container" class="col-sm-12 dropzone container" ondragenter="return enter(event)" ondragover="return over(event)" ondrop="return drop(event)">
                                <div id="drag-yotengo" class="icon" draggable="true" ondragstart="return start(event)" ondragend="return end(event)">“Yo tengo”</div>
                                <div id="drag-yosoy" class="icon" draggable="true" ondragstart="return start(event)" ondragend="return end(event)">“Yo soy”</div>
                                <div id="drag-yoestoy" class="icon" draggable="true" ondragstart="return start(event)" ondragend="return end(event)">“Yo estoy”</div>
                                <div id="drag-yopuedo" class="icon" draggable="true" ondragstart="return start(event)" ondragend="return end(event)">“Yo puedo”</div>
                            </div>
                        </div>
                    </div>

                        <div class="row" style="margin-top: 50px">
                            <div class="col-sm-12 container-height">
                                <div id="dropzone-holder">

                                    <div class="col-sm-3 hitbox">
                                        <div id="dropzone-1" class="dropzone" ondragenter="return enter(event)" ondragover="return over(event)" ondrop="return drop(event)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col" style="padding-top: 15px">
                                    <p>
                                        Personas que me ponen límites para que aprenda a evitar peligros o problemas.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr />


                        <div class="row"  style="margin-top: 30px">
                            <div class="col-sm-12 container-height">
                                <div id="dropzone-holder">
                                    <div class="col-sm-3 hitbox">
                                        <div id="dropzone-2" class="dropzone" ondragenter="return enter(event)" ondragover="return over(event)" ondrop="return drop(event)">
                                        </div>

                                    </div>
                                    <div class="col" style="padding-top: 20px">
                                        <p>
                                            Feliz cuando hago algo bueno para los demás y les demuestro mi afecto
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div class="row"  style="margin-top: 30px">
                            <div class="col-sm-12 container-height">
                                <div id="dropzone-holder">
                                    <div class="col-sm-3 hitbox">
                                        <div id="dropzone-3" class="dropzone" ondragenter="return enter(event)" ondragover="return over(event)" ondrop="return drop(event)">
                                        </div>
                                    </div>
                                    <div class="col" style="padding-top: 20px">
                                        <p>
                                            Buscar la manera de resolver mis problemas.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                     <hr />

                        <div class="row"  style="margin-top: 30px">
                            <div class="col-sm-12 container-height">
                                <div id="dropzone-holder">
                                    <div class="col-sm-3 hitbox">
                                        <div id="dropzone-4" class="dropzone" ondragenter="return enter(event)" ondragover="return over(event)" ondrop="return drop(event)">
                                        </div>
                                    </div>
                                    <div class="col" style="padding-top: 20px">
                                        <p>
                                            Seguro de que todo saldrá bien.
                                        </p>
                                    </div>
                                </div>
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
            var padre3 = $("#drag-yopuedo").parent();
            var padre1 = $("#drag-yotengo").parent();
            var padre4 = $("#drag-yoestoy").parent();
            var padre2 = $("#drag-yosoy").parent();

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
            if(padre4[0].id  === "dropzone-4"){
                drop4 = true;
            }else{
                drop4 = false;
            }
            if(padre2[0].id  === "dropzone-2"){
                drop2 = true;
            }else{
                drop2 = false;
            }
        }

        function comprobar(){
            if(drop1 && drop2 && drop3 && drop4 && drop1 === true){
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
