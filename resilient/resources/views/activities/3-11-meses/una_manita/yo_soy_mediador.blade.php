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
                    <header>Yo soy el mediador</header>
                </div>

                <div class="card-body">

                    <p style="font-size: 1.2em">
                        <b>Instrucciones:</b> ¡Oye, tú! selecciona las formas que estas utilizando para favorecer escenarios
                        en los que tu niño se relaciona con las personas que mencionaste en la plantilla anterior.
                    </p>


                    <div id="caso-1">
                        <div class="space-content question">

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <span>
                                           <input type="checkbox" id="op1" name="option1" required/>
                                            <label class="grow" for="op1">
                                                <img src="{{ asset('/ActividadUM/011_mediador.png') }}" >
                                            </label>
                                        </span>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                         <span>
                                            <input type="checkbox" id="op2" name="option2" required/>
                                            <label class="grow" for="op2">
                                                <img src="{{ asset('/ActividadUM/012_mediador.png') }}" >
                                            </label>
                                        </span>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                         <span>
                                            <input type="checkbox" id="op3" name="option3" required/>
                                            <label class="grow" for="op3">
                                                <img src="{{ asset('/ActividadUM/013_mediador.png') }}" >
                                            </label>
                                        </span>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                            <span>
                                               <input type="checkbox" id="op4" name="option4" required/>
                                                <label class="grow" for="op4">
                                                    <img src="{{ asset('/ActividadUM/014_mediador.png') }}" >
                                                </label>
                                            </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <hr />

                    <div style="text-align: right">
                            <button id="nextStage" class="btn style-accent-light">
                                <a href="{{ route("/una-manita-7") }}">
                                    Entendido!
                                </a>
                            </button>
                    </div>
                </div>
        </div>
    </div>


@endsection

