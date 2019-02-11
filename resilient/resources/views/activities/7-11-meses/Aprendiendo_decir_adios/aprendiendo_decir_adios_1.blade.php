@extends('partials.layout')

@section('title')
aprendiendo a decir adiós
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
                    <header>Aprendiendo a decir adiós</header>
                </div>
 <div class="card-body floating-label">

 <!-- INICIO ROW-->
  <div class="row">
                 <div class="row">
                                   <div class="col-sm-12">
                                        <div class="animated bounceInDown delay-1s">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;">

                                            <div align="center">
                                            <img class="animated flipInX" width="760" height="440" id="img1" src="{{asset('img/adios.png')}}">
</div>
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
 
<div class="animated jackInTheBox delay-2s" style="border-style: dashed; border-color:#11EAE7;border-radius:12px;">
<div style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;">
<b>Descripción de la actividad: </b><br>
En esta actividad encontrarás dos situaciones, las cuales puedes realizar durante la semana en cualquier momento. A continuación, se explicarán en detalle:<br>
<b>●</b>	 Llevarás a tu bebé a dormir solo/a en la cuna le leerás un cuento y le indicarás que allí estarás para él o ella un rato y que después te irás, sin embargo, es importante que le menciones que nada le va a pasar y que vas a estar pendiente en cualquier momento.
<br>
<b>●</b>	En la habitación, cuarto de juguetes o donde prefieras, elige un momento para jugar con tu bebé, escoge sus juguetes favoritos e indícale que te iras a la habitación del lado, que siga jugando que ya vuelves, mientras estas ausentes lo animarás para que siga jugando en tu ausencia y luego volverás y observaras su reacción.
<br>
<b>Nota:</b><br> 
-	Vuelve. Cúmplele a tu hijo cuando realices esta afirmación.<br>
-	Háblale desde afuera. <br>
-	Hazle saber que estás ahí, aunque él no te esté viendo. <br><br>

Es muy importante que identifiques diferentes situaciones en tu vida cotidiana donde evidencies ansiedad por separación en tu bebé, es por esto que a continuación deberás diligenciar el siguiente cuadro:

</div>
</div>
    
                </div>
            </div> 

    </div>
    <br/>
    </div>
    <!-- FIN ROW-->


    <!-- INICIO ROW-->              
    <div class="row">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;" >
 
<div class="animated jackInTheBox delay-2s" style="border-style: dashed; border-color:green;border-radius:12px;">
<div style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;">




  <div id="divInput3" class="input-group-content">
  <p>Durante la semana identificarás 2 situaciones
 donde evidencies ansiedad ante la separación en tu hijo/a:</p>
 <br>
                           <input placeholder="1." type="text" class="form-control" id="input3" name="input3">
                           <label for="input3"></label>
                            </div>
                            <br>
                              <div id="divInput4" class="input-group-content">
                              <p style="color:white;">Durante la semana identificarás 2 situaciones
 donde evidencies ansiedad ante la separación</p>
                              <input  placeholder="2." type="text" class="form-control" id="input4" name="input4">
                              <label for="input4"></label>
                            </div>
<br>
  <div id="divInput5" class="input-group-content">
  Cómo manejaste la situación que produjo ansiedad en tu hijo:
                                                    <input type="text" class="form-control" id="input5" name="input5">
                                                    <label for="input5"></label>
                            </div>
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
                <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark" id="next">Siguiente</button></a>
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