@extends('partials.layout')

@section('title')
    Intro Actividad 1
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <form method="GET" action="{{ route('/actividades-aprendamos-resiliencia-3') }}">
        <div class="card">
            <div class="card-head style-accent-dark">
                <header>Prendiendo motores</header>
            </div>
            <div class="card-body">
                <b><h3> Realiza estas acciones con tu hijo/a</h3></b>
                Mano derecha sobre la rodilla izquierda, luego mano izquierda sobre la rodilla derecha
                Se puede realizar también tocando en un movimiento hacia atrás derecha con pie izquierdo y viceversa.
                <hr />
                <div style="text-align: right">
                    <button type="text" class="btn style-success"> Completado!</button>
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection

