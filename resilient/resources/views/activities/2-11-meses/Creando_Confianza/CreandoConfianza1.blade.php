@extends('partials.layout')

@section('title')
Creando Confianza
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">
                <div class="card-head style-primary">
                   <header> Creando Confianza </header>
                </div>
                
                <div class="card-body floating-label">

                 <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:#008efd;" > 
                       <p style="text-align:center; text-justify: inter-word;"><b>Desarrollo Actividad</b></p> 
                </div>

                  <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;" >
                  <label> <p style="text-align:justify; text-justify: inter-word;">Para fomentar la confianza básica, es necesario ayudar 
                  a los cuidadores a construir una especie de puente. Este puente se construye implementando las características que 
                  se presentarán a continuación: </p></label>
                  </div>


                   <div class="title" >
                    <p style="text-align:left; text-justify: inter-word; font-size: 18px;color:black;">
                       <b> Características de la Confianza Básica:<b> 
                    </p> 

                    <p style="text-align:center;"> 
                     <img src="{{asset('ActividadCreandoConfianza/Imagen1.png')}}" alt="Logo" id="logo">
                    </p> 
                 </div>  

                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href=" {{route('/CreandoConfianza2')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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