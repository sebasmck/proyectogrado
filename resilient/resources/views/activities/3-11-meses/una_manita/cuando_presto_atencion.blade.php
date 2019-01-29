@extends('partials.layout')

@section('title')
    Cuando presto atención es cuando yo entiendo
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">

            <div class="card-head style-accent-dark">
                <header>Cuando presto atención es cuando entiendo</header>
            </div>

            <div class="card-body">
                <p>
                    <b>Instrucción:</b> Lo primero que vas a hacer hoy es activar tu atención para que con éxito logres desarrollar
                    todas las actividades que a continuación se te proponen.
                </p>

                <h5><b>Tarea</b></h5>
                <p>
                    <b>1.</b> Dibuja de forma imaginaria o con lápiz y papel, un ocho grande “acostado”.<br/>
                    <b>2.</b> Se comienza a dibujar en el centro.<br/>
                    <b>3.</b> Se continúa hacia la izquierda hasta llegar al punto de partida.<br/>
                    <b>4.</b> Se debe estirar el brazo con el que estes dibujando el ocho.<br/>
                </p>

                <hr />

                <div style="text-align: right">
                    <a href=" {{route('/una-manita-3')}} ">
                        <button type="button" class="btn btn-primary">Trabajo hecho!</button>
                    </a>
                </div>
            </div>
        </div>
    </div>


@endsection
