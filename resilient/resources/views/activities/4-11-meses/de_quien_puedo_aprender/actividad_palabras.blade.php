@extends('partials.layout')

@section('title')
    de quien puedo aprender
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
                    <header>Encuentra tus palabras</header>
                </div>

                <div class="card-body">

                    <p style="font-size: 1.2em">
                        <b>Instrucciones:</b> Evalúa que palabras te gustaría incluir en tu rol como padre con pautas de crianza resilientes y elige las que tú consideras correctas.


                    <div id="caso-1">
                        <div class="space-content question">

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <span>
                                           <input type="checkbox" id="op8" name="option8" required/>
                                            <label class="grow" for="op8">
                                                <p>AMBICIÓN</p>
                                            </label>
                                        </span>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                                                <span>
                                                                   <input type="checkbox" id="op1" name="option1" required/>
                                                                    <label class="grow" for="op1">
                                                                        <p>ABONO</p>
                                                                    </label>
                                                                </span>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                                                <span>
                                                                   <input type="checkbox" id="op2" name="option2" required/>
                                                                    <label class="grow" for="op2">
                                                                        <p>SEMILLA</p>
                                                                    </label>
                                                                </span>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                                                <span>
                                                                   <input type="checkbox" id="op3" name="option3" required/>
                                                                    <label class="grow" for="op3">
                                                                        <p>CRECIMIENTO</p>
                                                                    </label>
                                                                </span>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                                                <span>
                                                                   <input type="checkbox" id="op4" name="option4" required/>
                                                                    <label class="grow" for="op4">
                                                                        <p>CUIDADO</p>
                                                                    </label>
                                                                </span>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                                                <span>
                                                                   <input type="checkbox" id="op5" name="option5" required/>
                                                                    <label class="grow" for="op5">
                                                                        <p>RAÍCES</p>
                                                                    </label>
                                                                </span>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                                                <span>
                                                                   <input type="checkbox" id="op6" name="option6" required/>
                                                                    <label class="grow" for="op6">
                                                                        <p>COSECHA</p>
                                                                    </label>
                                                                </span>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                                                <span>
                                                                   <input type="checkbox" id="op7" name="option7" required/>
                                                                    <label class="grow" for="op7">
                                                                        <p>FRUSTRACIÓN</p>
                                                                    </label>
                                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr />

                    <div style="text-align: right">
                                <button id="nextStage" class="btn btn-accent-light">
                                <a href="{{ route("/de-quien-puedo-aprender-4") }}">
                                    Entendido!
                                </a>
                            </button>
                    </div>
                </div>
        </div>
    </div>


@endsection

