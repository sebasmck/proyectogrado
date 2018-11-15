@extends('partials.layout')

@section('title')
    Aprende estrategias
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
            <div class="card-head style-accent-dark">
                    <header>Aprende estrategias</header>
                </div>

                <div class="card-body">
                    <h4><b>Debes aprender algunas estrategias, lee atentamente el recuadro que aquí se te presentan:</b></h4>
                    <h4>1. Describe lo que vez</h4>
                    <div style="text-align: center">
                        <img src="{{ asset('ActividadDiaDelElogio/004_nino_juguetes.png') }}">
                    </div>

                    <div style="text-align: center;">
                        <img src="{{ asset('ActividadDiaDelElogio/005_trensito_lugar.png') }}">
                    </div>

                    <div style="text-align: center">
                         <textarea name="option2" style="width: 50%; margin-top: 30px" rows="2" disabled>Papá: "Me hace muy feliz que hayas dejado todo el su lugar"
                        </textarea>
                    </div>
                    <hr />
                    <h4>2. Describe lo que sientes</h4>
                    <div style="text-align: center;">
                        <img src="{{ asset('ActividadDiaDelElogio/006_describe_sientes.png') }}">
                    </div>

                    <div style="text-align: center">
                         <textarea name="option2" style="width: 50%; margin-top: 30px" rows="3" disabled>Papá: "He visto que los libros estaban en el suelo y tu los organizaste, así es un niño organizado""
                        </textarea>
                    </div>
                    <hr />

                    <div style="text-align: right">
                        <a href="{{ route('/dia-del-elogio-7') }}"><button class="btn style-accent-light">Entendido!</button> </a>
                    </div>
                </div>
        </div>
    </div>

@endsection