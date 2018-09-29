@extends('partials.layout')

@section('title')
    Intro Actividad 1
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <form id="form" method="GET" action="{{ route('/actividades-aprendamos-resiliencia-3') }}">
        <div class="card">
            <div class="card-head style-accent-dark">
                <header>Esto es lo que yo pienso</header>
            </div>
            <div class="card-body">
                <b><h3>En tus palabras, escribe que crees que es la resiliencia</h3></b>
                <textarea name="input1" rows="15" cols="200" style="width: 100%"></textarea>
                <hr />
                <div style="text-align: right">
                    <button id="concepto" type="text" class="btn style-success"> Siguiente</button>
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection
