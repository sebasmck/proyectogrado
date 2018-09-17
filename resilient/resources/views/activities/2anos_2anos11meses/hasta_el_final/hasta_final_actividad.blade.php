@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
                <img style="width:300px;height:300px;text-align:center;" src="{{asset('img/logo.png')}}">
     

    </div>
</div>


<!-- Comienzo del modal de Inicio Actividad-->
<div class="modal fade" id="startActivityModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" 
        id="favoritesModalLabel">Preparando Motores</h4>
      </div>
      <div class="modal-body">

<div>
   <p> A continuación, encontrarás ejemplos de situaciones en las que tu niño o niña se enfrenta diariamente.
    Lo que se requiere es que intencionalmente se modifique por tu parte el grado de dificultad y con esto 
    te estaremos dando la oportunidad de aplicar destrezas para impulsar la autonomía en tu niño. 
    ¡¡Recuerda!!  estas actividades están dadas para que se implementen en cualquier espacio durante
    tu rutina o la de tu hijo, así que puedes escoger y utilizar los elementos que tienes a la mano para
    cumplir con esta.</p>

    </p>Apagar la luz, alcanzar las cosas del comedor, alcanzar un juguete a una altura, recoger
    todos los objetos para llevarlos a otro lado, poder ver por la ventana más alta, todas 
    estas actividades aquí descritas enfrentan a nuestro niño a un problema a resolver. Para 
    realizar la actividad realiza los siguientes pasos:</p>
</div>


      </div>
      <div class="modal-footer">

        <span class="pull-right">
        <!-- SI acepta sigue el flujo normal de la aplicación-->
          <button id="btnStartActivity" type="button" class="btn btn-primary" data-dismiss="modal">
            Siguiente
          </button>
        </span>
      </div>
    </div>
  </div>
</div>
<!-- Fin del modal de Inicio de actividad-->
<!-- Comienzo del modal de Inicio de primera Actividad-->
<div class="modal fade" id="startActivityFirstModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" 
        id="favoritesModalLabel">Alcanzar los objetivos deseados</h4>
      </div>
      <div class="modal-body">

<div>

<b>1.</b> Identifica la situación (en este caso se utilizara una donde trate de alcanzar los switches de la luz)

<div style="text-align:center;" id="imgFadeIn">
<img style="width:250px;height:250px;" src="http://2.bp.blogspot.com/-XUqNplm61Dc/TxnVkzHWIaI/AAAAAAAAB9M/PLoUgfVixno/s1600/INTERRUPTOR.jpg"/>
</div>

</div>


      </div>
      <div class="modal-footer">

        <span class="pull-right">
        <!-- SI acepta sigue el flujo normal de la aplicación-->
          <button id="btnStartSecondStepActivity" type="button" class="btn btn-primary" data-dismiss="modal">
            Siguiente
          </button>
        </span>
      </div>
    </div>
  </div>
</div>
<!-- Fin del modal de Inicio de primera actividad-->



<!-- Comienzo del modal de Inicio de primera Actividad Segundo Paso-->
<div class="modal fade" id="startActivityFirstSecondStepModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" 
        id="favoritesModalLabel">Alcanzar los objetivos deseados</h4>
      </div>
      <div class="modal-body">
      
<div>
<b>2.</b> No le dejes saber que está realizando esta actividad
<div style="text-align:center;" id="imgFadeInSilence">
<img style="width:200px;height:250px;" src="https://st2.depositphotos.com/1967477/7091/v/950/depositphotos_70912545-stock-illustration-cartoon-boy-with-finger-over.jpg"/>
</div>

</div>
      </div>
      <div class="modal-footer">
        <span class="pull-right">
        <!-- SI acepta sigue el flujo normal de la aplicación-->
          <button id="btnStartThirdStepActivity" type="button" class="btn btn-primary" data-dismiss="modal">
            Siguiente
          </button> 
        </span>
      </div>
    </div>
  </div>
</div>
<!-- Fin del modal de Inicio de primera actividad segundo Paso-->


<!-- Comienzo del modal de Inicio de primera Actividad Tercer Paso-->
<div class="modal fade bd-example-modal-lg" id="startActivityFirstThirdStepModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" 
        id="myLargeModalLabel">Alcanzar los objetivos deseados</h4>
      </div>
      <div class="modal-body">

<div>

 <b>3.</b> Mira si persiste o desiste de una vez y pronuncia las siguientes frases:
<ul>
<li>
  Si persiste: empieza a apoyarlo con palabras como "yo sé que lo puedes hacer”, “Tú eres capaz” 
  “sigue intentándolo” “ya casi lo logras” “yo estoy aquí contigo”
</li>
<li>
  Si desiste: motívale para que regrese a realizar la actividad, deja que lo intente nuevamente
  diciéndole "yo sé que lo puedes hacer”, “Tú eres capaz” “sigue intentándolo” “ya casi lo logras”
   “yo estoy aquí contigo”
   </li>
</ul>

<div style="text-align:center;" id="imgFadeInFamily">
<img style="width:150px;height:150px;" src="https://i.pinimg.com/originals/c8/e9/6a/c8e96af4a308ca30a3b6068658f7ef4e.png"/>
</div>

</div>
      </div>
      <div class="modal-footer">
        <span class="pull-right">
        <!-- SI acepta sigue el flujo normal de la aplicación-->
          <button id="btnStartFourthStepActivity" type="button" class="btn btn-primary" data-dismiss="modal">
            Siguiente
          </button> 
        </span>
      </div>
    </div>
  </div>
</div>
<!-- Fin del modal de Inicio de primera actividad Tercer Paso-->


<!-- Comienzo del modal de Inicio de primera Actividad Cuarto Paso-->
<div class="modal fade" id="startActivityFirstFourthStepModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" 
        id="favoritesModalLabel">Alcanzar los objetivos deseados</h4>
      </div>
      <div class="modal-body">

<div>

<b>4.</b> Si lo logra hacer felicítalo con un abrazo muy grande y exprésale
   frases como “sabía que lo podrías hacer” “te felicito hijo”

<div style="text-align:center;" id="imgFadeInHuge">
<img style="width:250px;height:250px;" src="http://1.bp.blogspot.com/-PoaiCXZsCRk/TemCFhlpC6I/AAAAAAAAADc/4U3_i9cR614/s1600/familia.png"/>
</div>

</div>
      </div>
      <div class="modal-footer">
        <span class="pull-right">
        <!-- SI acepta sigue el flujo normal de la aplicación-->
          <button id="btnStartFiveStepActivity" type="button" class="btn btn-primary" data-dismiss="modal">
            Siguiente
          </button> 
        </span>
      </div>
    </div>
  </div>
</div>
<!-- Fin del modal de Inicio de primera actividad Cuarto Paso-->


<!-- Comienzo del modal de Inicio de primera Actividad Quinto Paso-->
<div class="modal fade" id="startActivityFirstfifthStepModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" 
        id="favoritesModalLabel">Alcanzar los objetivos deseados</h4>
      </div>
      <div class="modal-body">

<div>

<b>5</b>. Si no lo logra hacer,
 da la iniciativa de cómo lo podría lograr, en esta
 situación podría traer un banquillo para ayudarlo a alcanzar los switches de la luz
 y de igual forma exprésale frases como “sabía que lo podrías hacer” “te felicito hijo”

<div style="text-align:center;" id="imgFadeInChildren">
<img style="width:250px;height:250px;" src="https://cdn.pixabay.com/photo/2016/04/01/09/47/boy-1299574_960_720.png"/>
</div>

</div>
      </div>
      <div class="modal-footer">
        <span class="pull-right">
        <!-- SI acepta sigue el flujo normal de la aplicación-->
          <button id="btnStartStepActivity" type="button" class="btn btn-primary" data-dismiss="modal">
            Siguiente
          </button> 
        </span>
      </div>
    </div>
  </div>
</div>
<!-- Fin del modal de Inicio de primera actividad Quinto Paso-->


@endsection

@section('addjs')
<script>
$(document).ready(function(){

      $('#startActivityModal').modal('toggle');


        $("#btnStartActivity").click(function(){
         $('#startActivityFirstModal').modal('toggle');
         $("#imgFadeIn").fadeOut("fast" , function(){
            $("#imgFadeIn").fadeIn(4000);
         });
         
      });


   $("#btnStartSecondStepActivity").click(function(){
    $('#startActivityFirstSecondStepModal').modal('toggle');
         $("#imgFadeInSilence").fadeOut("fast", function(){
            $("#imgFadeInSilence").fadeIn(4000);
         });
     });

      $("#btnStartThirdStepActivity").click(function(){
    $('#startActivityFirstThirdStepModal').modal('toggle');
         $("#imgFadeInFamily").fadeOut("fast", function(){
            $("#imgFadeInFamily").fadeIn(4000);
         });
     });


       $("#btnStartFourthStepActivity").click(function(){
    $('#startActivityFirstFourthStepModal').modal('toggle')
         $("#imgFadeInHuge").fadeOut("fast", function(){
            $("#imgFadeInHuge").fadeIn(4000);
         });
     });

         $("#btnStartFiveStepActivity").click(function(){
    $('#startActivityFirstfifthStepModal').modal('toggle')
         $("#imgFadeInChildren").fadeOut("fast", function(){
            $("#imgFadeInChildren").fadeIn(4000);
         });
     });


});
</script>
@endsection