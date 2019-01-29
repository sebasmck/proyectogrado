@extends('partials.layout')

@section('title')
    Ojos abiertos y tacto dispuesto
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
            <div class="card-head style-accent-dark">
                    <header>Tareas para la semana</header>
                </div>

                <div class="card-body">
                    <b>Tarea</b>

                    <p>1. haz un dibujo que para ti represente cada una de las técnicas que hoy aprendiste y pégalas en un lugar visible para ti; así recordaras que debes hacer uso de ella para mejorar la relación con tu niño.</p>
                    <p>2. Después siéntate con tu niño y empieza a asignarle responsabilidades de acuerdo a lo que tú sabes que él puede hacer, ejemplo: recoger juguetes.</p>
                    <p>3. Cuando esté realizando las responsabilidades asignadas en el trascurso del día utiliza las técnicas utilizadas.</p>
                    <p>4. Observa el comportamiento de tu niño o niña cuando lo elogias y anótalo en un libro que ahora llamaras “bitácora de los elogios”.</p>
                    <p>5. Después de elogiarlo piensa cómo te sientes tú y también regístralo en tu bitácora de los elogios</p>

                    <div style="text-align: right">
                        <a href="{{ route('/dia-del-elogio-9') }}"><button class="btn style-accent-light">Completado!</button> </a>
                    </div>
                </div>
        </div>
    </div>

@endsection