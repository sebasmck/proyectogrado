@extends('partials.layout')

@section('title')
SEGUIR Y SEGUIR INTENTANDO

@endsection

@section('addcss')


@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
    <form class="form">
        <div class="card">

            <div class="card-head style-primary">
                <header> SEGUIR Y SEGUIR INTENTANDO </header>
            </div>

            <div class="card-body floating-label">

                <div class="row">
                    <div class="col-md-12">
                        A continuación, encontraras una serie de colores, números o letras que puedes utilizar para
                        jugar en casa con tu niño o niña.
                    </div>
                </div>



                <div class="col-md-5">

                    PENDING

                </div>

                <!-- <hr>
                <button onclick="readDropZone()">Get Object Data</button> -->

            </div>


            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/ssi_logrosObtenidos')}}"> <button type="button"
                            class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                </div>
            </div>

    </form>
</div>

@endsection

@section('addjs')

@endsection