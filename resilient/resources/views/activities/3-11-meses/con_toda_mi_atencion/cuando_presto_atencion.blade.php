@extends('partials.layout')

@section('title')
    Cuando presto atención es cuando yo entiendo
@endsection

@section('addcss')
    <style>
        p {
            font-size: 1.2em;
        }
    </style>

@endsection


@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">

            <div class="card-head style-primary">
                <header>Cuando presto atención es cuando yo entiendo</header>
            </div>

            <div class="card-body">

                <p>
                    <b>Instrucción:</b> Poner la yema de tus dedos en las mejillas, simula un bostezo y has presión con los dedos..
                </p>

                <hr />

                <div style="text-align: right">
                    <a href=" {{route('/con-toda-mi-atencion-3')}} ">
                        <button type="button" class="btn btn-primary">Continuemos!</button>
                    </a>
                </div>
            </div>
        </div>
    </div>


@endsection
