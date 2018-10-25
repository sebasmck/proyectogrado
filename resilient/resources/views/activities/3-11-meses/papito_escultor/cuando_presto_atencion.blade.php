@extends('partials.layout')

@section('title')
    Cuando presto atención es cuando yo entiendo
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">

            <div class="card-head style-primary">
                <header>Cuando presto atención es cuando yo entiendo</header>
            </div>

            <div class="card-body">
                <div style="width: 66%;margin: auto; text-align: center">
                    <img src=" {{ asset('ActividadPapitoEscultor/002_corazon.png') }}" />
                </div>

                <br />
                <br />
                <p>
                    <b>Instrucción:</b> Inicia activando tu atención para que logres desarrollar con éxito las actividades que se te proponen.
                </p>

                <h5><b>Tarea</b></h5>
                <p>
                    Haz imaginariamente un ocho acostado. Hazlo con el brazo estirado y la cabeza pegada al hombro del mismo lado.
                </p>

                <hr />

                <div style="text-align: right">
                    <a href=" {{route('/papito-escultor-3')}} ">
                        <button type="button" class="btn btn-primary">Aquí vamos!</button>
                    </a>
                </div>
            </div>
        </div>
    </div>


@endsection
