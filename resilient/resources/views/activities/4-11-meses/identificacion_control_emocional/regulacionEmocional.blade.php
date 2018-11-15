@extends('partials.layout')

@section('title')
    Regulación y control emocional
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

        .grow { transition: all .2s ease-in-out; float: left; text-align: center; }
        .grow:hover { transform: scale(0.9); }
    </style>
@endsection


@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
            <div class="card-head style-accent-dark">
                    <header>Regulación de las emociones</header>
                </div>

                <div class="card-body">

                    <p>
                        Elige la forma más adecuada que consideras para  regular las emociones de los niños ante las diferentes situaciones de la vida.
                    </p>

                    <div class="space-content">
                            <div>
                               <input type="radio" id="op1" name="option1" value="1" class="col-md-3 col-sm-6"/>
                                <label class="grow" for="op1"><img src="{{ asset('/ActividadIce/actividad_ocio.png') }}"  /><h4 style="display: block">Actividad de ocio</h4></label>
                            </div>
                            <div>
                                <input type="radio" id="op2" name="option1" value="2" class="col-md-3 col-sm-6"/>
                                <label class="grow" for="op2"><img src="{{ asset('/ActividadIce/conversacion.png') }}" /><h4 style="display: block">Conversación</h4></label>
                            </label>
                            </div>
                            <div>
                                <input type="radio" id="op3" name="option1" value="3" class="col-md-3 col-sm-6"/>
                                <label class="grow" for="op3"><img src="{{ asset('/ActividadIce/fomenta_miedo.png') }}" /><h4 style="display: block">Fomenta miedo</h4></label>
                            </label>
                            </div>
                            <div>
                                <input type="radio" id="op4" name="option1" value="4" class="col-md-3 col-sm-6"/>
                                <label class="grow" for="op4"><img src="{{ asset('/ActividadIce/respiracion.png') }}" /><h4 style="display: block">Respiraciòn</h4></label>
                            </label>
                            </div>
                            <div>
                                <input type="radio" id="op5" name="option1" value="5" class="col-md-3 col-sm-6"/>
                                <label class="grow" for="op5"><img src="{{ asset('/ActividadIce/rompe_objetos.png') }}" /><h4 style="display: block">Rompe objetos</h4></label>
                            </label>
                            </div>
                    </div>


                    <hr style="clear: left" />

                    <div style="text-align: right">
                        <a href="{{ route('/identificacion-control-emocional-4') }}"><button class="btn style-accent-light">Aquí vamos!</button> </a>
                    </div>
                </div>
        </div>
    </div>

@endsection