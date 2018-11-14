@extends('partials.layout')

@section('title')
    Cuando presto atención entiendo yo
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
                    

                    <hr />

                    <div style="text-align: right">
                        <a href="{{ route('/identificacion-control-emocional-3') }}"><button class="btn style-accent-light">Aquí vamos!</button> </a>
                    </div>
                </div>
        </div>
    </div>

@endsection