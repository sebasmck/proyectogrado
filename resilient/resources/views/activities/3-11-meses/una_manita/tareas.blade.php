@extends('partials.layout')

@section('title')
   Una manita
@endsection

@section('addcss')
    <style>
        .card-body{
            font-size: 1.1em;
        }

        .componente-oculto{
            display: none;
        }
    </style>
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8 margin-bottom-lg">
        <div class="card">

            <div class="card-head style-accent-dark">
                <header>Tarea</header>
            </div>

            <div class="card-body">
                <p>
                    <b>1.</b> Realiza la actividad “piensa en redes de apoyo” con tu niño y cuéntale de que manera estas personas pueden ayudarlo.<br />
                    <b>2.</b> Realiza por lo menos un encuentro semanal con las personas relacionadas en la planilla y favorece la cercanía en tu niño,
                    siempre y cuando tu niño lo desee, para ellos debes preguntárselo de manera explícita. Ejemplo: “Tú quieres…”.
                </p>

                <hr />

                <div style="text-align: right">
                    <button id="nextStage" class="btn style-accent-light">
                        <a href="{{ route("/una-manita-8") }}">
                            Entendido!
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>





@endsection
