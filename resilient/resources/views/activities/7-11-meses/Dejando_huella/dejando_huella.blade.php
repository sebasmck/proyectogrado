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
                    <header>Dejando Huella</header>
                </div>
 <div class="card-body floating-label">

 <!-- INICIO ROW-->
  <div class="row">
                 <div class="row">
                                   <div class="col-sm-12">
                                        <div class="animated bounceInDown delay-1s">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;">
                                            <label> 
                                            <p><b>Instrucciones:</b> Para esta ocasión, emplearas alrededor de 10 minutos.
                                            </p>
                                            </label>
                                            <br>
                                            <div align="center">
                                            <img class="animated flipInX" width="760" height="440" id="img1" src="{{asset('img/dejandoH.png')}}">
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
<b>1)</b> Vas a organizar un espacio amplio e iluminado para realizar la actividad.<br>
<b>2)</b> Te vas a asegurar colocar en el lugar una toalla, un periódico, algún elemento que puedas ensuciar.<br>
<b>3)</b> Vas a tomar la hoja y la vas a dividir por la mitad<br>
<b>4)</b> Pinta la palma de tu mano con la tempera, incluyendo tus dedos, en conjunto con tu bebé y pon tu huella en un lado de la hoja.<br>
<b>5)</b> Ahora realiza el mismo procedimiento con la palma de tu bebé.<br>
<b>6)</b> Puedes realizar lo mismo con la mano contraria y con las plantas de los pies.<br>
<b>7)</b> Mientras realizas esta actividad, irás contando y mostrando a tu bebé cual la huella más grande, cuál es la más pequeña y a quién pertenece cada una de ellas. <br><br>
Recuerda que para esta actividad pueden participar todos los integrantes de la familia y comparar sus huellas con las del bebé.<br>

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