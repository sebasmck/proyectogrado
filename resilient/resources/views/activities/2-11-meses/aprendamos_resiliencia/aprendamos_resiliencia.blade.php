@extends('partials.layout')

@section('title')
    Intro Actividad 1
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
            <form method="GET" action="{{ route('/actividades-aprendamosresiliencia') }}">
                <div class="card-head style-accent-dark">
                    <header>Pautas de Crianza resiliente</header>
                </div>

                <div class="card-body" style="text-justify: auto;">
                    Bienvenido al programa de pautas de Crianza Resilientes para padres. <br /> Este programa se
                    desarrolla en el transcurso de <b> ocho semanas </b> en las cuales se realizará una serie de
                    actividades en las cuales se le enseñaran habilidades resilientes que puede aplicar en el
                    proceso de crianza de tu niño o niña quien finalmente será el más beneficiado.
                    El objetivo de esta actividad es que se conozca sobre la resiliencia y si ya se sabe un poco
                    sobre ella, entonces que fortalezca sus conocimientos y así los puedas poner en práctica.
                    <hr />
                    <div style="text-align: right">
                        <button class="btn style-success">Aquí vamos!</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

@endsection

