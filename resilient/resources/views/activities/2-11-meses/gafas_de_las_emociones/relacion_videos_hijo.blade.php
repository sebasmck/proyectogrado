@extends('partials.layout')

    @section('title')
    Cuando presto atención es cuando entiendo yo
@endsection

@section('addcss')
    <style>
        .selected {
            border: dashed lightskyblue 4px;
            padding: 1px;
        }
    </style>
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
                <div class="card-head style-primary">
                    <header>Evaluación videos</header>
                </div>

                <div class="card-body">
                    <p>
                        A través de estos videos se logró identificar que las experiencias de la vida
                        cotidiana generan emociones y estas su vez permiten ver el mundo de un color u otro.
                        Habiendo aclarado esto, identifica:
                    </p>

                    <p><b>1.</b> ¿Cuáles son las gafas que utilizas con mayor frecuencia en la relación con tu hijo?</p>

                    <div class="question" style="display: flex; width: 66%; margin: auto" >
                        <div style="padding-left: 50px">
                            <input id="option-input-1" style="display: none" type="radio" name="option5" value="1" />
                            <img id="option-1" src="{{ asset('ActividadGafasDeLasEmociones/004_gafas.png') }}" width="80%" height="50px"/>
                        </div>
                        <div>
                            <input id="option-input-2" style="display: none" type="radio" name="option5" value="2" />
                            <img id="option-2" src="{{ asset('ActividadGafasDeLasEmociones/003_gafas.png') }}" width="80%" height="50px" />
                        </div>
                        <div>
                            <input id="option-input-3" style="display: none" type="radio" name="option5" value="3" />
                            <img id="option-3" src="{{ asset('ActividadGafasDeLasEmociones/002_gafas.png') }}" width="80%" height="50px" />
                        </div>
                        <div>
                            <input id="option-input-4" style="display: none" type="radio" name="option5" value="4" />
                            <img id="option-4" src="{{ asset('ActividadGafasDeLasEmociones/001_gafas.png') }}" width="80%" height="50px" />
                        </div>
                    </div>

                    <br />

                    <p><b>2.</b> ¿Crees que tu hijo reconozca la diferencia entre las gafas en relación
                        con las emociones que representan? Si tu respuesta es no, ¿qué necesitarías para lograrlo</p>

                    <div style="width: 66%; margin: auto; text-align: center">
                        <label id="si" class="radio radio-styled radio-inline">
                            <input type="radio" name="option6" value="1"  required="true" checked="checked" />
                            <img src=" {{ asset('ActividadGafasDeLasEmociones/005_aprove.png') }}" width="100px" height="100px" />
                        </label>

                        <label id="no" class="radio radio-styled radio-inline">
                            <input type="radio" name="option6"  value="2"  required="true" />
                            <img src=" {{ asset('ActividadGafasDeLasEmociones/006_deny.png') }}" width="100px" height="100px" />
                        </label>
                    </div>


                    <div id="justificacion" style="display: none">
                        <textarea rows="5" name="option7" cols="40" style="width: 100%"></textarea>
                    </div>

                    <div style="text-align: right">
                        <a href="{{route('/gafas-de-las-emociones-4')}}">
                            <button type="button" class="btn btn-primary">Enviar</button>
                        </a>
                    </div>
                </div>
        </div>
    </div>

@endsection

@section('addjs')
    <script type="text/javascript">

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

                var matches = target.id.match("\\d");
                if(matches.length > 0){
                    for(var i = 1; i < 5; i++){
                        $("#option-input-"+i).attr('checked',false);
                    }
                    var input = $("#option-input-"+matches[0]).attr('checked',true);
                }

            }
        })

        $("#si").on("click",function () {
            $("#justificacion").hide();
        })

        $("#no").on("click",function () {
            $("#justificacion").show();
        })

    </script>
    @endsection