@extends('partials.layout')

@section('title')
    Tareas para la semana:
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
            <div class="card-head style-accent-dark">
                    <header>Tareas para la semana:</header>
                </div>

                <div class="card-body" style="text-justify: auto">

                    <p>
                        Identificar una emoción de tristeza, una de ira y una de alegría en la relación con tu hijo,
                        encontrar las maneras asertivas para lograr regular las emociones que se sienten en ese momento sin usar regaños,
                        castigos físicos o verbales o de otro tipo, recuerda que puedes llamarle la atención y enseñar con amor,
                        resulta más efectivo y placentero para el aprendizaje de los niños.

                    </p>

                    <b>Tips</b>

                    <ul>
                        <li>Busca por lo menos 20 minutos diarios para conversar con tu hijo sobre un tema de interés e identifica las emociones en su relato</li>
                        <li>Busca un espacio tranquilo en el que puedas enseñar a respirar de la siguiente manera “inhala profundo contando hasta 5, mantén la respiración contando hasta 4 y exhala suavemente contando hasta 6… repite 3 veces seguidas”</li>
                        <li> Encuentra una actividad de ocio para desarrollar con tu hijo y regular emociones por ejemplo – pintar, escuchar música de su agrado,  cantar su canción favorita o  salir al parque y respirar -
                        </li>
                    </ul>


                    <hr />

                    <div style="text-align: right">
                        <a href="{{ route('/identificacion-control-emocional-5') }}"><button class="btn style-accent-light">Aquí vamos!</button> </a>
                    </div>
                </div>
        </div>
    </div>

@endsection