@extends('partials.layout')

@section('title')
Como Loros
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Como Loros  </header>
                </div>

                <div class="card-body floating-label">

                 <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;" > 
                       <p style="text-align:center; text-justify: inter-word;"><b>Desarrollo Actividad</b></p>  
                      <!-- <img class="pull-right" src="{{asset('img/avatar.png')}}" alt="avatar">-->
                  </div>

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 16px;color:black;">
                    <p style="text-align:left; text-justify: inter-word;">
                         <b>Cuando presto atención es cuando yo entiendo</b></p>
                  </div> 

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <img class="pull-left" src="{{asset('ActividadNinoResiliente/Principal.png')}}" alt="avatar" style="margin-left=90px;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        <b>Instrucción:</b> Sigue paso a paso el siguiente ejercicio de gimnasia cerebral y 
                        prepara tu organismo para una mejor respuesta en la adquisición del aprendizaje. </p>
                         <p style="text-align:justify; text-justify: inter-word;">
                            <b>1.</b> Las piernas moderadamente abiertas.</p>
                            <p style="text-align:justify; text-justify: inter-word;">
                                <b>2.</b> Abre totalmente los dedos de las manos y de los pies hasta sentir un poquito de dolor.</p>
                                <p style="text-align:justify; text-justify: inter-word;">
                                    <b>3.</b>Párate sobre la punta de los pies, estira los brazos hacia arriba lo más alto que puedas. </p>
                                    <p style="text-align:justify; text-justify: inter-word;">
                                        <b>4.</b> Al estar muy estirado, toma aire y guárdalo durante diez segundos, estírate más y echa tu cabeza hacia atrás.</p>
                                       <img class="pull-left" src="{{asset('ActividadNinoResiliente/Principal.png')}}" alt="avatar" style=" visibility: hidden;">
                                        <p style="text-align:justify; text-justify: inter-word;">
                                            <b>5.</b> A los diez segundos, expulsa el aire con un pequeño grito y afloja hasta
                                             abajo tus brazos y tu cuerpo, como si te dejaras caer.</p>
                                            
                   </div>
                   


                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/ComoLoros2')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
{{--  @section('addjs')
<script>
        var tl = new TimelineLite();
        avatar = $('.avatar');
        //  content = $('.content-card');
        // tl.to(title, 1.5, {y:10});
        // tl.from(card1, .3, {left:100, opacity:0});  
</script>
@endsection  --}}