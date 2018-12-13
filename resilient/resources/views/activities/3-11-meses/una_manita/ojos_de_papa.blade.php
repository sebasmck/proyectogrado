@extends('partials.layout')

@section('title')
    Desarrollo
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
            height: 250px;
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
                    <header>Los ojos grandes de papá</header>
                </div>

                <div class="card-body">

                    <p style="font-size: 1.2em">
                        <b>Instrucciones:</b> Identifica situaciones que consideras representan riesgo para un niño, da click en la imagen que consideras lo representa.
                    </p>


                    <div id="caso-1">
                        <div class="space-content question">

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <span>
                                           <input type="checkbox" id="op1" name="option1" required/>
                                            <label class="grow" for="op1">
                                                <img src="{{ asset('/ActividadUM/001_ojos.png') }}" >
                                            </label>
                                        </span>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                         <span>
                                            <input type="checkbox" id="op2" name="option2" required/>
                                            <label class="grow" for="op2">
                                                <img src="{{ asset('/ActividadUM/002_ojos.png') }}" >
                                            </label>
                                        </span>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                         <span>
                                            <input type="checkbox" id="op3" name="option3" required/>
                                            <label class="grow" for="op3">
                                                <img src="{{ asset('/ActividadUM/003_ojos.png') }}" >
                                            </label>
                                        </span>
                                    </div>



                                <div class="col-md-4 col-sm-6">
                                        <span>
                                           <input type="checkbox" id="op4" name="option4" required/>
                                            <label class="grow" for="op4">
                                                <img src="{{ asset('/ActividadUM/004_ojos.png') }}" >
                                            </label>
                                        </span>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                         <span>
                                            <input type="checkbox" id="op5" name="option5" required/>
                                            <label class="grow" for="op5">
                                                <img src="{{ asset('/ActividadUM/005_ojos.png') }}" >
                                            </label>
                                        </span>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                         <span>
                                            <input type="checkbox" id="op6" name="option6" required/>
                                            <label class="grow" for="op6">
                                                <img src="{{ asset('/ActividadUM/006_ojos.png') }}" >
                                            </label>
                                        </span>
                                </div>



                                <div class="col-md-4 col-sm-6">
                                        <span>
                                           <input type="checkbox" id="op7" name="option7" required/>
                                            <label class="grow" for="op7">
                                                <img src="{{ asset('/ActividadUM/007_ojos.png') }}" >
                                            </label>
                                        </span>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                         <span>
                                            <input type="checkbox" id="op8" name="option8" required/>
                                            <label class="grow" for="op8">
                                                <img src="{{ asset('/ActividadUM/008_ojos.png') }}" >
                                            </label>
                                        </span>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                         <span>
                                            <input type="checkbox" id="op9" name="option9" required/>
                                            <label class="grow" for="op9">
                                                <img src="{{ asset('/ActividadUM/009_ojos.png') }}" >
                                            </label>
                                        </span>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>


                    <hr />

                    <div style="text-align: right">
                            <button id="nextStage" style="display: none" class="btn style-accent-light" onClick="continuar();">
                                <a href="{{ route("/una-manita-4") }}">
                                    Entendido!
                                </a>
                            </button>
                    </div>
                </div>
        </div>
    </div>


    <div class="modal fade" id="resultado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div    class="modal-header">
                <b><h3 class="modal-title" style="display: inline" id="resultado">Felicidades!</h3></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src=" {{ asset("/ActividadUM/010_ojos_resultado.png") }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('addjs')

    <script>

        var contentActual = 0;

        $(".question").on("click",function (event) {
            var target = event.target;
            if(target.id.indexOf("op") > -1){
                if($("#"+target.id).attr("checked")){
                    contentActual ++;
                }else{
                    contentActual --;
                }
                comprobar();
            }
        })

        function comprobar(){
            if(contentActual === 9){
                $("#nextStage").show();
                $("#resultado").modal();
            }else{
                $("#nextStage").hide();
            }
        }
    </script>

@endsection