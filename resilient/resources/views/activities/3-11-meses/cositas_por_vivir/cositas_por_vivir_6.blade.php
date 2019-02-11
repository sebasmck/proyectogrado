@extends('partials.layout')

@section('title')
Cositas por vivir
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
                    <header>Cositas por vivir</header>
                </div>
 <div class="card-body floating-label">

 <!-- INICIO ROW-->
  <div class="row">
                 <div class="row">
                                   <div class="col-sm-12">
                                        <div class="animated bounceInDown delay-1s">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;" >
                                            <label> 
                                            <p><b>Tarea</b></p>
                                            </label>

                                             </div>
                                        </div>
                                    </div> 
                 </div>
</div>
<!-- FIN ROW -->

<!-- INICIO ROW-->              
<div class="row">
    <div class="row">
    <div class="col-sm-12">
    <div class="animated bounceInRight">
    <label><h3>
    En casa, presenta a tu niño situaciones problemáticas con mayor probabilidad de ocurrencia y dale la oportunidad de resolverlo.
    <br/>
    <br/>
    <b>Ejemplo:</b>
    <br/> 
    <br/> 
¿Si he roto una taza que puedo hacer?
    <br/>
Tu niño responde: 
    <textarea  rows="5" cols="80"></textarea>

    <br/> 
    <br/> 
¿Si alguien extraño toca a la puerta que debo hacer? 
    <br/> 
Tu niño responde: 
<textarea  rows="5" cols="80"></textarea>

    <br/> 
    <br/> 
    ¿Si quiero comer helado pero no hay dinero que puedo hacer?
    <br/> 
Tu niño responde: 
<textarea  rows="5" cols="80"></textarea>

    </h3>
         </label>


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

var clickedAle = false;
var clickedMie = false;
var clickedRab = false;
var clickedTri = false;

  $("#lastLoad").delay(1000).fadeIn(2000);
  
  var count = 1;

  $("#alegria").click(function(){  
      if(!clickedAle){
        $("#al").text(count);
        $("#al").addClass("animated infinite bounce delay-2s");
        $("#alegIn").val(count);
        count = count + 1;
        clickedAle = true;
           if(clickedMie == true && clickedRab == true && clickedTri == true){
               $("#next").prop('disabled', false);
           }    
      }
  });

   $("#miedo").click(function(){
       if(!clickedMie){
        $("#mi").text(count);
        $("#mi").addClass("animated infinite shake delay-2s");
        $("#miedoIn").val(count);
        count = count + 1;
        clickedMie = true;

        if(clickedAle == true && clickedRab == true && clickedTri == true){
               $("#next").prop('disabled', false);
           }   
       }

  });

   $("#rabia").click(function(){
    if(!clickedRab){
    $("#rab").text(count);
    $("#rab").addClass("animated infinite rubberBand delay-2s");
    $("#rabiaIn").val(count);
    count = count + 1;
    clickedRab = true

    if(clickedAle == true && clickedMie == true && clickedTri == true){
               $("#next").prop('disabled', false);
    } 

    }
  });

   $("#triste").click(function(){
    if(!clickedTri){
    $("#tri").text(count);
    $("#tri").addClass("animated infinite wobble delay-2s");
    $("#trisIn").val(count);
    count = count + 1;
    clickedTri = true;

    if(clickedAle == true && clickedMie == true && clickedRab == true){
               $("#next").prop('disabled', false);
    } 

    }
  });

  $("#reboot").click(function(){
    count = 1
       clickedAle = false;
       clickedMie = false;
       clickedRab = false;
       clickedTri = false;

    $("#tri").text("");
    $("#tri").removeClass("animated infinite wobble delay-2s");
    $("#trisIn").val("");

    $("#rab").text("");
    $("#rab").removeClass("animated infinite rubberBand delay-2s");
    $("#rabiaIn").val("");

    $("#mi").text("");
    $("#mi").removeClass("animated infinite shake delay-2s");
    $("#miedoIn").val("");
    
    $("#al").text("");
    $("#al").removeClass("animated infinite bounce delay-2s");
    $("#alegIn").val("");
    
    $("#next").prop('disabled', true);
  });


});
 
</script>

@endsection