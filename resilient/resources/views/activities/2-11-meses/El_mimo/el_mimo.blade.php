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

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" 
        id="favoritesModalLabel">Tu hijo el mimo</h4>
      </div>
      <div class="modal-body">

<div style="text-align:center;">
   <p> Tal vez tu niño no necesite gorro negro, pintarse la cara o utilizar guantes blancos, 
   sin embargo, en esta edad es igual que un mimo, imita a las personas que tiene a su alrededor.
</p>
    
   <div>
   <img style="display:none;" id="imagen1" src="{{asset('img/mimo1.JPG')}}" />
  </div>

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
        id="favoritesModalLabel">Aprendiendo a emprender</h4>
      </div>
      <div class="modal-body">

<div style="text-align:center;">

 <p> <iframe style="display:none;" id="video2" width="560" height="315" src="https://www.youtube.com/embed/Rj6UtCq-8-8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></p>

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

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" 
        id="favoritesModalLabel">Aprendiendo a emprender</h4>
      </div>
      <div class="modal-body">
      
<div style="text-align:center;">
<p><b>1. </b>identifica tres actividades de diversión entre tu hijo y tú por medio de
 alguna de estas opciones. (Cocinar, pintar con temperas un pliego de papel, pensar y
 elegir un juego de los niños, vestir un muñeco con diferentes prendas de vestir).</p> 

<p><b>2. </b>Identifica junto con tu hijo cuáles son los objetivos de la actividad y define 
los pasos para dar cumplimiento a los objetivos.</p>

<p><b>¡Alienta a tu hijo a tomar las decisiones!</b></p>
<p><b>3. </b>Al terminar, sube fotografías a estos cuadros según corresponda el paso a paso
 que eligió tu hijo en la actividad y cuál fue el resultado de la tarea. Mira a continuación
 un ejemplo:</p>


<img style="width:200px;height:200px;text-align:center;display:none;" id="imgFadeEx" src="{{asset('img/EjemploActividad.JPG')}}">


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


@endsection

@section('addjs')

<script>
$(document).ready(function(){

      $('#startActivityModal').modal('toggle');

      $("#imagen1").fadeIn(2000); 
       
   $("#btnStartActivity").click(function(){
     $('#startActivityFirstModal').modal('toggle');
     $("#video2").fadeIn(2000);
   });


   $("#btnStartSecondStepActivity").click(function(){
    $('#startActivityFirstSecondStepModal').modal('toggle');
    $("#imgFadeEx").fadeIn(3500);
     });


});
</script>
@endsection