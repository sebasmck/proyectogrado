@extends('partials.layout')

@section('title')
    Ojos abiertos y tacto dispuesto
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
            <div class="card-head style-accent-dark">
                    <header>Ojos abiertos y tacto dispuesto</header>
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('/dia-del-elogio-8') }}">
                        <h4>Escribe una cualidad de tu niño.</h4>
                        <textarea style="width: 100%" rows="5" required minlength="8"></textarea>
                        <h4> ¿Que ha hecho tu niño en estos días que se lo reconociste y elogiaste? Describe la manera en que lo hiciste.?</h4>
                        <textarea style="width: 100%" rows="5" required minlength="15"></textarea>
                        <h4> De las técnicas que aprendiste hoy, ¿habías usado alguna anteriormente?. Si tu respuesta es sí, escribe cuál de ellas has utilizado.</h4>
                        <textarea style="width: 100%" rows="5" required minlength="15"></textarea>
                        <h4> ¿Cuál de las técnicas que aprendiste hoy te gustaría practicar de manera frecuente?.</h4>
                        <textarea style="width: 100%" rows="5" required minlength="15"></textarea>

                        <div style="text-align: right">
                            <button type="submit" class="btn style-accent-light">Entendido!</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>

@endsection