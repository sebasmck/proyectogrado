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
        id="favoritesModalLabel">Semáforo emocional</h4>
      </div>
      <div class="modal-body" style="text-align:center;">

<div>
   <p> A continuación se presentará un video para la comprensión de esta actividad que se
       llama el semáforo emocional</p>
</div>

<div id="video1" style="display:none;">
<iframe width="560" height="315" src="https://www.youtube.com/embed/QjH6FaluEVQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
        id="favoritesModalLabel">Respiro, pienso y actúo</h4>
      </div>
      <div class="modal-body">

<div id="dialogFade" style="text-align:justify;display:none;">
<p style="border-radius:5px;border: 4px solid #22A295;border-style: dotted; padding:30px;">Una manera efectiva de controlar las emociones es a partir de la respiración, primero
toma una bomba de caucho e ínflala, luego suelta el orificio por donde se infló, así
lograra desinflarse o quedar en su estado inicial, tal vez con un par de aspectos que la
transformaron al inflarse.
Posteriormente piensa que esa bomba hace parte de tu cuerpo y que está ubicada en tu
estómago, cuenta lentamente de uno a cuatro mientras tomas aire, como cuando se
estaba inflando la bomba… ahora mantén el aire contando de uno a seis, como si no
dejaras salir el aire de la bomba, por último, expulsa el aire muy suavemente contando
de uno a seis como si hubieras dejado salir el aire de la bomba. Repite el ejercicio por lo
menos tres veces.</p>


</div>


      </div>
      <div class="modal-footer">

        <span class="pull-right">
        <!-- SI acepta sigue el flujo normal de la aplicación-->
         <button id="btnStartSecondStepActivity" type="button" class="btn btn-primary" data-dismiss="modal">
            Hecho
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
      $("#video1").fadeIn(2000);


        $("#btnStartActivity").click(function(){
         $('#startActivityFirstModal').modal('toggle');
         $("#dialogFade").fadeIn(2000);
      });


$("#btnStartSecondStepActivity").click(function(){
      $("#initialContent").fadeOut(1000);
      window.location="{{URL::to('/RespirarActuar1')}}";
     });
});

</script>
@endsection