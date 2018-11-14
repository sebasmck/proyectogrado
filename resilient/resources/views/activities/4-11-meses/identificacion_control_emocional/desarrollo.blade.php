@extends('partials.layout')

@section('title')
    Cuando presto atención entiendo yo
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
                        <img class="text-center" src="{{ asset('/ActividadIce/imagen_casos.png') }}" />

                    </div>


                    <div id="caso-2">
                        <h1>Caso No.2</h1>
                        <p>
                            “Lolita, juega sola a las muñecas, pues no tiene otros niños o adultos cerca con quien jugar,
                            les habla a sus muñecas sobre tomar el té, y además menciona cómo se siente al estar sola,
                            ella disfruta de la compañía de sus muñecas, con ellas canta y baila una hora al día casi todos los días de la semana”
                            ¿Cuál es la emoción de Lolita al jugar con las muñecas?
                        </p>
                        <img class="text-center" src="{{ asset('/ActividadIce/imagen_casos.png') }}" />
                    </div>


                    <div id="caso-3">
                        <h1>Caso No.3</h1>
                        <p>
                            “Pablito, quiere jugar al balón con su mejor amigo y pide a su madre que le deje salir,
                            sin embargo la madre se opone porque Pablito no ha realizado sus dos tareas del colegio,
                            ni se ha quitado el uniforme del jardín” ¿Que emoción se genera en Pablito?
                        </p>
                        <img class="text-center" src="{{ asset('/ActividadIce/imagen_casos.png') }}" />
                    </div>


                    <div id="caso-4">
                        <h1>Caso No.4</h1>
                        <p>
                            “María, es una niña a quien los niños de su curso no la dejan jugar a las cogidas porque corre muy despacio,
                            y aunque ella solicita a sus compañeritos que la dejen jugar, los niños nunca acceden, pero un día,
                            sin imaginarselo, algunos compañeros decidieron jugar otra dinámica, pato-pato-ganzo e invitaron a Maria a jugar junto con ellos”
                            ¿qué emoción tuvo maría al ser invitada?
                        </p>
                        <img class="text-center" src="{{ asset('/ActividadIce/imagen_casos.png') }}" />
                    </div>

                    <hr />

                    <div style="text-align: right">
                        <a href="{{ route('/identificacion-control-emocional-3') }}"><button class="btn style-accent-light">Aquí vamos!</button> </a>
                    </div>
                </div>
        </div>
    </div>

@endsection