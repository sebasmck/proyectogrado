@extends('partials.layout')

@section('title')
    Tareas para la semana:
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
            <div class="card-head style-accent-dark">
                    <header>Reflexión</header>
                </div>

                <div class="card-body" style="text-justify: auto">
                    <form method="get" action="{{ route("/eso-si-eso-no-4") }}">
                        <p>
                            Escribe en el cuadro que se presenta a continuación 3 de las situaciones que identificaste que pueden significar peligro para tu hijo y cuéntanos tu experiencia con la actividad.
                        </p>

                        <label>3 situaciones dentro de mi casa que son peligrosas para mi hijo/a.</label>
                        <textarea cols="30" rows="5" style="width: 100%" required></textarea>

                        <label>¿Cuáles son las situaciones de prevención que debo tener con mi hijo/a?</label>
                        <textarea cols="30" rows="5" style="width: 100%" required></textarea>

                        <label>Escribe aquí tres estrategias que empleaste para prevenir posibles accidentes en casa con tu hijo/a</label>
                        <textarea cols="30" rows="5" style="width: 100%" required></textarea>
                        <hr />

                        <div style="text-align: right">
                            <button class="btn style-accent-light">Aquí vamos!</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>

@endsection