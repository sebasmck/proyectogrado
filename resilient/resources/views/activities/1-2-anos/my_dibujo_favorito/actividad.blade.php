@extends('partials.layout')

@section('title')
    Mi dibujo favorito
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


                    <b><h3>Descripción:</h3></b>
                <ol>
                    <li>Busca un lugar cómodo y tranquilo en el cual tu y tu hijo se sientan cómodos (se recomienda que la actividad se realice sobre una mesa). </li>
                    <li>Pon encima de la mesa los materiales sugeridos en esta actividad (plastilina de diferentes colores y ⅛ de cartulina del color que desee el niño). </li>
                    <li>Explícale al niño que van a realizar entre los dos figuras con plastilina.</li>
                    <li>Pregúntale al niño con cual color de plastilina quiere empezar, si el niño no sabe puedes mencionarle dos opciones y él elegirá el que más le guste. </li>
                    <li>Una vez elegido el color de la plastilina pídele a tu hijo que mencioné con qué figura quiere empezar,
                        pueden empezar por hacer un sol, un árbol, las nubes, lo que prefieran. </li>
                    <li>Recuerda que inicialmente serás la guía que le permitirá al niño realizar diferentes figuras y le darás la opción de elegir la que él prefiera,
                        sin embargo cuando evidencies que el niño empieza a realizar la actividad por sí solo, anímalo y díle palabras como <b>Por ejemplo:</b> “lo estás haciendo muy bien”,
                        “has elegido muy bien los elementos de nuestro dibujo”, “que buen trabajo”, hasta que culminen la actividad.</li>
                    <li>Finalmente cuando terminen la actividad  responde las preguntas que se encuentran a continuación. </li>
                </ol>

                <p><b>Nota: </b> Este ejercicio que hoy hiciste procura hacerlo a lo largo de la semana en las actividades que realices con tu bebé, es importante que fortalezcas sus procesos de elección. </p>

                <hr />

                <div style="text-align: right">
                    <button id="nextStage" class="btn btn-accent-light">
                        <a href="{{ route("/mi-dibujo-favorito-3") }}">
                            Buen trabajo
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>


@endsection

