@extends('partials.layout')

@section('title')
CUALIDADES NIÑOS RESILIENTES
@endsection

@section('addcss')

<style>

 li{
    list-style-type: none;
 }

textarea{
    margin-top: 20px;
}

</style>

@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
    <form class="form">
        <div class="card">

            <div class="card-head style-primary">
                <header> LAS EMOCIONES DE NUESTROS PADRES /CUIDADORES
                    </header>
            </div>

            <div class="card-body floating-label">

                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;">

                        <p style="text-align:justify; text-justify: inter-word;"> <b>
                                ¡Buen trabajo!, gracias a esta actividad se pueden diferenciar las características de
                                cada una de las emociones las cuales tienen diferentes reacciones fisiológicas como
                                verbales.
                                Ahora que con la ayuda de la película conoces cada una de las emociones y sus
                                características puedes describir en que situaciones aparece cada uno de los personajes
                                en el niño y también en ti.
                                A continuación, se te invita a describir las situaciones, lugares o personas en donde
                                logres identificar las emociones de tus niños:
                            </b> </p>
                            
                </div>
                <br>
                <div>
                    <div class="row">
                            <div class="col-md-3">
                                    <li><img src="{{asset('ActividadLenp/lenp1.png')}}" style="width:150px; height:auto;" alt="lenp1"></li>
                            </div>
                            <div class="col-md-3">
                                    <li><img src="{{asset('ActividadLenp/lenp2.png')}}" style="width:150px; height:auto;" alt="lenp1"></li>
                            </div>
                            <div class="col-md-3">
                                    <li><img src="{{asset('ActividadLenp/lenp3.png')}}" style="width:150px; height:auto;" alt="lenp1"></li>
                            </div>
                            <div class="col-md-3">
                                    <li><img src="{{asset('ActividadLenp/lenp4.png')}}" style="width:150px; height:auto;" alt="lenp1"></li>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-md-3">
                                <textarea rows="14"></textarea>
                            </div>
                            <div class="col-md-3">
                                <textarea rows="14"></textarea>
                            </div>
                            <div class="col-md-3">
                                    <textarea rows="14"></textarea>
                            </div>
                            <div class="col-md-3">
                                    <textarea rows="14"></textarea>
                            </div>
                    </div>
                </div>
            </div>
            <!--end .card -->

            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/lenp5')}}"> <button
                            type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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