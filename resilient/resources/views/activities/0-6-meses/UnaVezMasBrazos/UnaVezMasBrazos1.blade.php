@extends('partials.layout')
@section('title')
Actividad Una Vez Mas En Mis Brazos 1  
@endsection

@section('addcss')
<!-- Comienzo del modal de Inicio Actividad-->
<div class="modal fade" id="startActivityModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">
       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel">1. Posición de cuna </h4>
              </div>

               <div class="modal-body">
                   

                  <div style="text-align:center;">
                        <p> A continuación, se te presentan un par de videos que probablemente te permitan 
                            identificar momentos que en la cotidianidad puedes generar para fortalecer la confianza 
                            en tu hijo y que ello le aporte para tomar decisiones.
                        </p>
                        <div>
                          <iframe width="560" height="315" id="video1" style="display:none;" src="https://www.youtube.com/embed/mfeCeebBZVQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>    
                  </div>
                </div> <!--modal body close -->

              <div class="modal-footer">
                <span class="pull-right">
                <!-- SI acepta sigue el flujo normal de la aplicación-->
                   <button id="btnStartActivity" type="button" class="btn btn-primary" data-dismiss="modal">
                     Siguiente
                   </button>
                </span>
              </div>
         </div><!--modal content close -->
     </div> <!--modal dialog close -->
</div>  <!--modal fade close -->
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
      <div id="scrolleable" style="overflow: scroll; height: 400px;">
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

      $("#video1").fadeIn(2000); 
       
   $("#btnStartActivity").click(function(){
     $('#startActivityFirstModal').modal('toggle');
     $("#video2").fadeIn(2000);
   });


   $("#btnStartSecondStepActivity").click(function(){
    $('#startActivityFirstSecondStepModal').modal('toggle');
    $("#imgFadeEx").fadeIn(3500);
     });

     $("#btnStartThirdStepActivity").click(function(){
     $("#initialContent").fadeOut("slow" , function(){
      window.location="{{URL::to('/MasTeGuste3')}}";
     });
});


});
</script>
@endsection