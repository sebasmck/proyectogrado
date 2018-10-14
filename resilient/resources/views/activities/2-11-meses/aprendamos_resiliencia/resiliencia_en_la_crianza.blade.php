@extends('partials.layout')

@section('title')
    Intro Actividad 1
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <form id="form" method="GET" action="{{ route('/logros') }}">
        <div class="card">
            <div class="card-head style-accent-dark">
                <header>La resiliencia en la crianza</header>
            </div>
            <div class="card-body">
                <b><h3>Escribe cómo crees que se puede integrar este modelo en tu modelo de crianza </h3></b>
                <textarea name="opcion3" rows="15" cols="200" style="width: 100%"></textarea>
                <hr />
                <div style="text-align: right">
                    <button id="concepto" type="text" class="btn style-success"> Siguiente</button>
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection
