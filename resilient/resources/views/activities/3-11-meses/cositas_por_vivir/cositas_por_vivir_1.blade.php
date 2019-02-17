@extends('layouts.app')

@section('content')
<div class="container" id="initialContent">
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

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" 
        id="favoritesModalLabel">Cuando presto atención es cuando entiendo</h4>
      </div>
      <div class="modal-body">

<div>
   <p> <b>Instrucción:</b> Lo primero que vas a hacer es activar tu atención para
    que logres desarrollar con éxito las actividades que se te presentan a continuación.</p>

    <p><b>1.</b> Estando de pie, cruza tus pies de forma que no pierdas el equilibrio.</p>

    <p><b>2.</b> Luego estira tus dos brazos hacia el frente y sepáralos el uno del otro, 
    las palmas de tus manos deben estar hacia fuera, con los pulgares apuntando
    hacia abajo, luego en esa misma posición entrelaza tus manos y dedos de forma que
    los pulgares sigan apuntando hacia abajo y lleva lentamente tus manos entrelazadas
    hacia tu pecho de forma que tus codos queden abajo y tus manos unidas debajo de tu 
    mentón. Mientras realizas estos movimientos debes apoyar tu lengua en tu paladar. </p>

    <p><b>3.</b> Repite cinco veces </p>

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

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" 
        id="favoritesModalLabel">Hoy estoy aprendiendo</h4>
      </div>
      <div class="modal-body">

<div>

<b>1.</b> Mira el video que a continuación se te presenta, 
en el encontraras la explicación del desarrollo cognitivo 
de los niños según su edad cronológica, desde la postura teórica de Jean Piaget.

<div style="text-align:center;" id="imgFadeIn">
<iframe width="560" height="315" src="https://www.youtube.com/embed/y8fh2e5O2UY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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


$("#btnStartDevelopActivity").click(function(){
    $('#startActivityDevelopModal').modal('toggle')
     });

$("#image1").click(function(){
     $("#image2").fadeIn(2000);
});


$("#image2").click(function(){
    $("#btnEndStepActivity").prop('disabled', false);
});

$("#btnEndStepActivity").click(function(){
     $("#initialContent").fadeOut("slow" , function(){
      window.location="{{URL::to('/HastaFinal3')}}";
     });
});


});
</script>
@endsection