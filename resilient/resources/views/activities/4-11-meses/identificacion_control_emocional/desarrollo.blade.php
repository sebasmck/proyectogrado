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

        input[type="radio"][id^="op"] {
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
            height: 200px;
            width: 200px;
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
            width: 17%;
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
                    <header>Desarrollo de la actividad</header>
                </div>

                <div class="card-body">

                    <p>
                        Los padres deberán leer los casos presentados a continuación e identificar qué emoción se genera según la situación.
                    </p>

                    <div id="caso-1">
                        <h1>Caso No.1</h1>
                        <p>
                            “Pepito, juega a los carritos con su vecino, de repente cae un fuerte aguacero y
                            el vecino empieza a llorar desconsolado porque no le gusta  el sonido de las gotas caer sobre el techo de la casa,
                            pues relaciona el sonido con una situación en la que estando solo en casa se fue la luz”
                            ¿Qué emoción se observa en el vecino de Pepito?
                        </p>

                        <div style="text-align: center">
                            <img class="text-center" src="{{ asset('/ActividadIce/imagen_casos.png') }}" style="width: 66%" />
                        </div>

                        <hr />

                        <div class="space-content question">
                            <span>
                               <input type="radio" id="op1" name="option1" required value="1"/>
                                <label class="grow" for="op1">Alegría</label>
                            </span>
                            <span>
                                <input type="radio" id="op2" name="option1" required value="2"/>
                                <label class="grow" for="op2">Miedo</label>
                              </label>
                            </span>
                            <span>
                                <input type="radio" id="op3" name="option1" required value="3"/>
                                <label class="grow" for="op3">Rabia</label>
                              </label>
                            </span>
                            <span>
                                <input type="radio" id="op4" name="option1" required value="4"/>
                                <label class="grow" for="op4">Tristeza</label>
                              </label>
                            </span>
                            <span>
                                <input type="radio" id="op5" name="option1" required value="5"/>
                                <label class="grow" for="op5">Sorpresa</label>
                              </label>
                            </span>
                        </div>
                    </div>


                    <div id="caso-2" style="clear: left; top: 20px; display: none;">
                        <h1>Caso No.2</h1>
                        <p>
                            “Lolita, juega sola a las muñecas, pues no tiene otros niños o adultos cerca con quien jugar,
                            les habla a sus muñecas sobre tomar el té, y además menciona cómo se siente al estar sola,
                            ella disfruta de la compañía de sus muñecas, con ellas canta y baila una hora al día casi todos los días de la semana”
                            ¿Cuál es la emoción de Lolita al jugar con las muñecas?
                        </p>

                        <div style="text-align: center">
                            <img class="text-center" src="{{ asset('/ActividadIce/imagen_casos.png') }}" style="width: 66%" />
                        </div>

                        <hr />

                        <div class="space-content question">
                            <span>
                               <input type="radio" id="op6" name="option2" value="1"/>
                                <label class="grow" for="op6">Alegría</label>
                            </span>
                            <span>
                                <input type="radio" id="op7" name="option2" value="2"/>
                                <label class="grow" for="op7">Miedo</label>
                                </label>
                            </span>
                            <span>
                                <input type="radio" id="op8" name="option2" value="3"/>
                                <label class="grow" for="op8">Rabia</label>
                                </label>
                            </span>
                            <span>
                                <input type="radio" id="op9" name="option2" value="4"/>
                                <label class="grow" for="op9">Tristeza</label>
                                </label>
                            </span>
                            <span>
                                <input type="radio" id="op10" name="option2" value="5"/>
                                <label class="grow" for="op10">Sorpresa</label>
                                </label>
                            </span>
                        </div>
                    </div>


                    <div id="caso-3" style="display: none;">
                        <h1>Caso No.3 </h1>
                        <p>
                            “Pablito, quiere jugar al balón con su mejor amigo y pide a su madre que le deje salir,
                            sin embargo la madre se opone porque Pablito no ha realizado sus dos tareas del colegio,
                            ni se ha quitado el uniforme del jardín” ¿Que emoción se genera en Pablito?
                        </p>

                        <div style="text-align: center">
                            <img class="text-center" src="{{ asset('/ActividadIce/imagen_casos.png') }}" style="width: 66%" />
                        </div>

                        <hr />

                        <div class="space-content question">
                            <span>
                               <input type="radio" id="op11" name="option3" value="1"/>
                                <label class="grow" for="op11">Alegría</label>
                            </span>
                            <span>
                                <input type="radio" id="op12" name="option3" value="2"/>
                                <label class="grow" for="op12">Miedo</label>
                                </label>
                            </span>
                            <span>
                                <input type="radio" id="op13" name="option3" value="3"/>
                                <label class="grow" for="op13">Rabia</label>
                                </label>
                            </span>
                            <span>
                                <input type="radio" id="op14" name="option3" value="4"/>
                                <label class="grow" for="op14">Tristeza</label>
                                </label>
                            </span>
                            <span>
                                <input type="radio" id="op15" name="option3" value="5"/>
                                <label class="grow" for="op15">Sorpresa</label>
                                </label>
                            </span>
                        </div>
                    </div>


                    <div id="caso-4" style="display: none;">
                        <h1>Caso No.4</h1>
                        <p>
                            “María, es una niña a quien los niños de su curso no la dejan jugar a las cogidas porque corre muy despacio,
                            y aunque ella solicita a sus compañeritos que la dejen jugar, los niños nunca acceden, pero un día,
                            sin imaginarselo, algunos compañeros decidieron jugar otra dinámica, pato-pato-ganzo e invitaron a Maria a jugar junto con ellos”
                            ¿qué emoción tuvo maría al ser invitada?
                        </p>

                        <div style="text-align: center">
                            <img class="text-center" src="{{ asset('/ActividadIce/imagen_casos.png') }}" style="width: 66%" />
                        </div>

                        <hr />

                        <div class="space-content question">
                            <span>
                               <input type="radio" id="op16" name="option4" value="1"/>
                                <label class="grow" for="op16">Alegría</label>
                            </span>
                            <span>
                                <input type="radio" id="op17" name="option4" value="2"/>
                                <label class="grow" for="op17">Miedo</label>
                                </label>
                            </span>
                            <span>
                                <input type="radio" id="op18" name="option4" value="3"/>
                                <label class="grow" for="op18">Rabia</label>
                                </label>
                            </span>
                            <span>
                                <input type="radio" id="op19" name="option4" value="4"/>
                                <label class="grow" for="op19">Tristeza</label>
                                </label>
                            </span>
                            <span>
                                <input type="radio" id="op20" name="option4" value="5"/>
                                <label class="grow" for="op20">Sorpresa</label>
                                </label>
                            </span>
                        </div>
                    </div>

                    <hr />

                    <div style="text-align: right">
                            <button id="nextStage" class="btn style-accent-light" onClick="continuar();" disabled>Continuar!</button>
                    </div>
                </div>
        </div>
    </div>

@endsection

@section('addjs')

    <script>

        var contentActual = 1;

        function continuar(){
            if(contentActual < 4)
            {
                $("#nextStage").attr('disabled',true);
                selectedQuestion = null;
                $("#caso-"+contentActual).hide();
                window.contentActual ++;
                $("#caso-"+contentActual).fadeIn(300);
            }else{
                window.location.href = "{{ route('/identificacion-control-emocional-3') }}" ;
            }
        }

        var selectedQuestion = null;

        $(".question").on("click",function (event) {
            var target = event.target;
            if(target.id.indexOf("op") > -1){
                if(window.selectedQuestion == null){
                    $("#nextStage").attr('disabled',false);
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
                        $("#op"+i).attr('checked',false);
                    }
                    var input = $("#op"+matches[0]).attr('checked',true);
                }

            }
        })
    </script>

@endsection