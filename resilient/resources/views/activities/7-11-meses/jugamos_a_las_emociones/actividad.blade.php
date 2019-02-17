@extends('partials.layout')

@section('title')
    ¿Jugamos a las emociones?
@endsection

@section('addcss')
    <style>

    </style>

@endsection

    @section('content')

<div class="col-lg-offset-2 col-md-8">
        <div class="card">

            <div class="card-head style-accent-dark">
                <header>Actividad 1</header>
            </div>

            <div class="card-body" style="text-justify: auto; font-size: 1.2em">

                <p>
                    <b>Instrucciones:</b> <br /> Deberás imprimir las caras que tenemos para ti,
                    luego recortarlas y pegarlas por la parte de atrás un palo de paleta pequeño,
                    así las podrás sostener cuando se las vayas a mostrar a tu hijo.  Dale click <a style="color: lightskyblue" href="{{ route("/jugamos-a-las-emociones-8") }}">Aquí</a> para descargar las caras.
                </p>

                <p>
                    El objetivo de la actividad es que ayudes a tu bebé a conocer sus emociones usando
                    las caras que imprimiste y palabras que le permitan aprender a identificar cual es la emoción que está sintiendo en ese momento.
                    Esto lo puedes hacer cuando tu hijo está experimentando una emoción de forma intensa.
                    Además, puedes decirle cosas como “¿Estás sintiendo alegría?” “¿Estas sintiendo enojo?” y le señalas la cara correspondiente a la emoción que él niño está demostrando.
                </p>


                <p>
                    Ahora debes llenar este registro durante esta semana. Donde dice <b>situación</b> colocarás que fue lo que hizo que tu bebé se enojara,
                    estuviera alegre o triste. Luego en <b>día</b> escribirás la fecha en la que sucedió eso, ejemplo: lunes 15/04/2018.
                    <b>En cara que le mostraste </b> pondrás si fue una de tristeza, alegría o enojo, y en <b> reacción del bebé </b> cómo reaccionó él ante la cara que le mostraste.
                </p>

                <div align="center">
                    <div><img src="{{ asset('/ActividadJugamosALasEmociones/001.png')}}"  /></div>
                    <a href="{{ route("/jugamos-a-las-emociones-9") }}" style="color: lightskyblue;">Descargar registro</a>
                </div>


                <hr />

                <div style="text-align: right">
                    <button id="nextStage" class="btn btn-accent-light">
                        <a href="{{ route("/jugamos-a-las-emociones-3") }}">
                            CONTINUEMOS
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>


@endsection

