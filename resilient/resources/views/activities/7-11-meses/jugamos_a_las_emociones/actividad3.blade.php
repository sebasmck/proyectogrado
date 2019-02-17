@extends('partials.layout')

@section('title')
    ¿Jugamos a las emociones?
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
                    <header>Actividad 3</header>
                </div>

                <div class="card-body">

                    <p style="font-size: 1.2em">
                        <b>Instrucciones:</b>
                    </p>

                    <p style="font-size: 1.2em">
                        Podrás emplear las tarjetas que se encuentran <a style="color: lightskyblue" href="{{ route("/jugamos-a-las-emociones-10") }}">AQUÍ</a>, descargarlas e imprimirlas.
                        Después le dirás a tu bebé que tome una y deberás con un muñeco representar la emoción,
                        como si fueran títeres (Ejemplo: si tu hijo le enoja que le quiten un muñeco, pues puedes representar esa situación con los muñecos.
                        Así con cada emoción).
                    </p>





                    <hr />

                    <div style="text-align: right">
                                <button id="nextStage" class="btn btn-accent-light">
                                <a href="{{ route("/jugamos-a-las-emociones-5") }}">
                                    Vamos por ello
                                </a>
                            </button>
                    </div>
                </div>
        </div>
    </div>


@endsection

