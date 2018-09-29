@extends('partials.layout')

@section('title')
Creando Confianza 2
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Creando Confianza 2 </header>
                </div>

                <div class="card-body floating-label">

                 <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:#008efd;" > 
                       <p style="text-align:center; text-justify: inter-word;"><b>Actividad - Puente De La Confianza</b></p> 
                </div>

                  <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;" >
                  <label> <p style="text-align:justify; text-justify: inter-word;">
                  Después de tener los conocimientos necesarios sobre alguna de las características de la confianza básica, se puede ayudar a los cuidadores, ubicados en el extremo izquierdo de la siguiente imagen, a crear su puente. ¡Recuerda! cada uno de los escalones los ayudará a cruzar el puente de la confianza básica. 
                  Selecciona 10 escalones para completar los 10 pasos del puente que llevará a la confianza básica. </p></label>
                  </div>


                   <div class="title" >
                    <p style="text-align:left; text-justify: inter-word; font-size: 18px;color:black;">
                       <b> Tu Puente:<b> 
                    </p> 

                    <p style="text-align:center;"> 
                     <img src="{{asset('ActividadCreandoConfianza/PuenteEJ.png')}}" alt="Logo" id="logo">
                    </p> 
                 </div>  

                 <div class="title" >
                    <p style="text-align:left; text-justify: inter-word; font-size: 18px;color:black;">
                       <b> Escalones: A continuación, encontraras una cuadrilla de escalones que puedes utilizar para 
                       ayudar a construir el puente de la confianza básica. <b> 
                    </p> 
                     <p style="text-align:center;"> 
                      <img src="{{asset('ActividadCreandoConfianza/EscalonesEJ.png')}}" alt="Logo" id="logo">
                     </p> 
                 </div>  

                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href=" "> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>
        </div><!--end .card -->
        </form>
    </div>

@endsection
@section('addjs')
<script>
         var tl = new TimelineLite();
        avatar = $('.avatar');

         var title = $('.title'),
        logo = $('#logo');
        tl.from(title, 2.5, {left:100, opacity:0});
        //  content = $('.content-card');
        // tl.to(title, 1.5, {y:10});
        // tl.from(card1, .3, {left:100, opacity:0});  
</script>
@endsection  