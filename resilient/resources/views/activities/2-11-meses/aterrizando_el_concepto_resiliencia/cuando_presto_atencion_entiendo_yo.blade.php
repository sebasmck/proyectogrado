@extends('partials.layout')

@section('title')
    Cuando presto atención es cuando entiendo yo
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
            <form method="GET" action="{{ route('/aterrizando-el-concepto-resiliencia-3') }}">
                <div class="card-head style-primary">
                    <header>Cuando presto atención es cuando entiendo yo</header>
                </div>

                <div class="card-body">
                    <h4><b>Realiza las siguientes tareas</b></h4>
                    <p>
                       <b> 1. </b> Imagina un reloj del tamaño de lo que logras ver en tu campo visual,
                        desplaza la mirada lentamente y detenidamente, entre la 1 y las 7,
                        de las 11 a las 5, de las 10 a las 4, debes hacer combinaciones diferentes de extremo a extremo.
                    </p>

                    <p>
                       <i> <b> 2. </b> Respira profundo mientras realizas cada movimiento y concéntrate en lo que tu cuerpo logra sentir. </i>
                    </p>

                    <hr />

                    <div style="text-align: right">
                        <button class="btn style-primary">Quiero saber más!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection