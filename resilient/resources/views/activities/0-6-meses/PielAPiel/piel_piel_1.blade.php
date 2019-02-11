@extends('partials.layout')

@section('title')
Piel a piel después del baño
@endsection

@section('content')

<!-- Si necesitan animaciones shake (como se mueven los emoticones) ahi les dejo los links de
la documentación -->
<!-- https://github.com/elrumordelaluz/csshake-->
<!-- http://elrumordelaluz.github.io/csshake/-->
<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-slow.css')}}" />

<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-hard.css')}}" />

<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-crazy.css')}}" />

<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-little.css')}}" />

<!-- Otra libreria. animaciones para la tabla y animar los
números de la tabla use esta libreria. Ahí dejo el los links de la documentación-->
<!-- https://daneden.github.io/animate.css/ -->
<!-- -https://github.com/daneden/animate.css -->
<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/animate.css')}}" />


<form action="{{route('/RespirarActuar2') }}" method="get" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="col-lg-offset-2 col-md-8">

<div class="card">
<div class="card-head style-primary">
                    <header>Piel a piel después del baño</header>
                </div>
 <div class="card-body floating-label">

 <!-- INICIO ROW-->
  <div class="row">
                 <div class="row">
                                   <div class="col-sm-12">
                                        <div class="animated bounceInDown delay-1s">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;" >
                                            <label> 
                                            <p>Una vez terminado el baño, puedes extender este agradable momento, a continuación aprenderás algunos beneficios del contacto táctil para ti y el bebé:
                                            </p>
                                            </label>

                                             </div>
                                        </div>
                                    </div> 
                 </div>
</div>
<!-- FIN ROW -->
                <br />


    <!-- INICIO ROW-->              
    <div class="row">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;" >
 
<div class="animated jackInTheBox delay-2s" style="border-style: dashed; border-color:#17B0CE;border-radius:12px;">
<div style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;">
Lo más importante es que promueves una interacción más afectuosa y empática.<br>
Contribuyes con su desarrollo psicomotor.<br>
Contribuye al desarrollo de una mayor resiliencia, una mejor modulación de los estados de activación, una menor reactividad al estrés.<br>
Reduces su dolor y/o cólicos infantiles.<br>
Ayudas a desarrollar mejores competencias cognitivas en el niño en desarrollo.<br>
Calmar a tu bebé y reducir su llanto.<br>
Ayudarás a tu bebé a dormir mejor y más profundo en la noche.<br>
Ayudas a desarrollar un buen tono muscular, coordinación y flexibilidad.
</div>
</div>
    
        <br>
<div class="animated zoomInDown delay-2s"  style="border-style: dashed; border-color:#1CE804;border-radius:12px;">
<div style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;">
<b>Otros efectos positivos son:</b><br>
Lograrás calmar y relajar a tu bebé y también te ayudará a relajarte a ti.<br>
Aumentarás la confianza con tu bebé.<br>
Ayudas en el aumento de peso diario.<br>
Contribuyes a un aumento de su atención y funciones inmunes.<br>
La estimulación táctil la debes realizar en todo el cuerpo del bebé. Para ello necesitarás:<br>
Un espacio de manera horizontal donde tu bebé esté cómodo.<br>
Alguna crema o aceite previamente consultado con tu pediatra.<br>
Relajarte.
</div>
                    </div>
                </div>
            </div> 

    </div>
    <br/>
    </div>
    <!-- FIN ROW-->

              

<div class="card-actionbar">
                <div class="card-actionbar-row" id="butt">
                <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark" id="next" disabled>Siguiente</button></a>
                    </div>
            </div>
</div>


</div>

</form>
@endsection

@section('addjs')
<script>
$(document).ready(function(){

});
 
</script>

@endsection