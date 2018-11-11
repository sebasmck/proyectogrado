@extends('partials.layout')

@section('title')
    Cuando presto atención entiendo yo
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
            <div class="card-head style-accent-dark">
                    <header>Cuando presto atención es cuando entiendo yo</header>
                </div>

                <div class="card-body">
                    <h4><b>Lo primero que vas a hacer es activar tu atención
                            para que logres desarrollar con éxito las actividades que aquí se te proponen,
                            sigue los siguientes pasos </b></h4>
                    <p>
                        <b> 1. </b> Mueve  un brazo simultáneamente con la pierna de la parte opuesta del cuerpo.
                        Puedes hacerlo de diferentes formas:
                        dobla una rodilla y levántala para tocarla con la mano del lado opuesto o dobla la rodilla llevando el pie hacia atrás
                        y tócalo con la mano del lado contrario.

                    </p>

                    <p>
                         <b> 2. </b> Repite el ejercicio con la pierna y brazo contrario al que ya usaste.
                    </p>

                    <p>
                        <b> 3. </b> Haz el ejercicio seis veces.
                    </p>


                    <hr />

                    <div style="text-align: right">
                        <a href="{{ route('/dia-del-elogio-3') }}"><button class="btn style-accent-light">Aquí vamos!</button> </a>
                    </div>
                </div>
        </div>
    </div>

@endsection