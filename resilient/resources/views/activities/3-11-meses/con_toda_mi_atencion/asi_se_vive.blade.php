@extends('partials.layout')

@section('title')
    Cuando presto atención es cuando yo entiendo
@endsection


@section('addcss')
    <style>
        p {
            font-size: 1.2em;
        }
    </style>

    @endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">

            <div class="card-head style-primary">
                <header>Así se vive en casa</header>
            </div>

            <div class="card-body">

                <form method="GET" action="{{ route('/con-toda-mi-atencion-4') }}">

                <p>
                    <b>Instrucción:</b> Identifica las situaciones que te molestan con relación al comportamiento de tu hijo y escríbelas a continuación:
                </p>

                <label style="display:block;" for="situaciones">
                    <textarea class="form-control" id="situaciones" type="text" minlength="5" maxlength="1000" required ></textarea>
                </label>

                <p>Describe tu manera de afrontarlas: <b>(Dialogo, indiferencia, maltrato físico, maltrato verbal).</b></p>

                <label style="display:block;" for="solucion">
                    <textarea class="form-control" id="solucion" type="text" minlength="5" maxlength="1000" required ></textarea>
                </label>

                <hr />

                <div style="text-align: right">
                    <button type="submit" class="btn btn-primary">Listo!</button>
                </div>

                </form>
            </div>
        </div>
    </div>


@endsection
