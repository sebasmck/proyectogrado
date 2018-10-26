@extends('partials.layout')

@section('title')
COSAS DE GRANDE
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
    <form class="form">
        <div class="card">

            <div class="card-head style-primary">
                <header> COSAS DE GRANDE</header>
            </div>

            <div class="card-body floating-label">

                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:#008efd;">
                    <p style="text-align:center; text-justify: inter-word;"><b>Desarrollo Actividad</b></p>
                    <img class="pull-right" src="{{asset('img/avatar.png')}}" alt="avatar">
                </div>
                <div class="col-md-8">
                    <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;">
                        <label>
                            <p style="text-align:justify; text-justify: inter-word;">
                                Para esta oportunidad se utilizarán todas las actividades o tareas que diariamente se
                                realizan en la casa como parte de la rutina. A continuación, encontrarás 4 situaciones
                                diarias de una rutina de niños de 2 a 3 años en donde le otorgarás un papel importante
                                a tu hijo. Como ves son actividades que se realizan a diario o que se realizan por lo
                                menos una vez a la semana. Ten presente las recomendaciones antes, durante y después de
                                la actividad.
                            </p>
                        </label>
                    </div>
                </div>

            </div>
            <!--end .card -->

            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/cdg2')}}"> <button type="button"
                            class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                </div>
            </div>

    </form>
</div>

@endsection
{{-- @section('addjs')
<script>
    var tl = new TimelineLite();
    avatar = $('.avatar');
        //  content = $('.content-card');
        // tl.to(title, 1.5, {y:10});
        // tl.from(card1, .3, {left:100, opacity:0});  
</script>
@endsection --}}