@extends('partials.layout')

@section('title')
Niños Resilientes
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Niños Resilientes  </header>
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
                        <b>Instrucción:</b> sigue paso a paso el siguiente ejercicio de gimnasia cerebral
                         y prepara tu organismo para una mejor respuesta en la adquisición de aprendizaje. </p>
                         <p style="text-align:justify; text-justify: inter-word;">
                            <b>1.</b> Inhala aire por la nariz y frótala rápidamente diez veces.</p>
                            <p style="text-align:justify; text-justify: inter-word;">
                                <b>2.</b> Exhala ya sin frotarla.</p>
                                <p style="text-align:justify; text-justify: inter-word;">
                                    <b>3.</b>Repite el ejercicio cinco veces más. </p>
                                    <p style="text-align:justify; text-justify: inter-word;">
                                        <b>4.</b> Cada vez que lo hagas nota si el aire que tomas entra por ambas fosas nasales.</p>
                   </div>
                   


                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/NinosResilientes2')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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