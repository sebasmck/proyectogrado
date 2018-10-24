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
        id="favoritesModalLabel">Desarrollo de la actividad </h4>
      </div>
      <div class="modal-body">
<div id="scrolleable" style="overflow: scroll; height: 400px;">
<div style="text-align:center;">
   <p> Para la realización de estas actividades necesitarás de los siguientes materiales: 
1. Post-it o papeles adhesivos

En esta actividad se utilizarán post-it o papeles adhesivos, la idea es pegarlos con mensajes de cariño para su niña o niño.
En esta edad aún no tiene comprensión de las letras y de las palabras, pero si se utiliza los símbolos. De ellos se configura
 todo el mundo de los pequeños, por eso vas a utilizar esta herramienta para que sea posible expresar todo el amor y cariño.

Toma ejemplo de las siguientes imágenes:
</p>

   <div> <img style="display:none;" src="{{asset('img/postIt.JPG')}}" id="imgPostIt"></div>    



<p>Un beso de mamá</p>
<p>Una carita feliz </p>
<p>Dibujo de una familia </p>
<p>Un bigote de Papa </p>
<p>Un corazón </p>


<br>
 <p> 
 La idea de estos ejemplos de post it o papeles adhesivos son para que los implementes y los 
 coloques espontáneamente en un lugar que tu hijo lo pueda ver
Por ejemplo:
Si sales muy temprano de la casa y dejas a tu niño durmiendo déjale “Un beso de mamá”
Si le serviste el desayuno y mientras él come tú te alistas para salir “déjale una carita feliz”
Si le alistaste la maleta déjale “un dibujo de ti y de él en la cara de un cuaderno”
Si papá no puede regresar temprano a la casa déjale “un bigote de papá” para que lo vea cuando no esté.
 </p>

</div>
</div>
      </div>
      <div class="modal-footer">

        <span class="pull-right">
        <!-- SI acepta sigue el flujo normal de la aplicación-->
          <button id="btnStartActivity" type="button" class="btn btn-primary" data-dismiss="modal" disabled>
            Siguiente
          </button>
        </span>
      </div>
    </div>
  </div>
</div>
<!-- Fin del modal de Inicio de actividad-->



@endsection

@section('addjs')

<script>
$(document).ready(function(){

       $('#startActivityModal').modal('toggle');
       $("#imgPostIt").fadeIn(1500);

       
   $("#btnStartActivity").click(function(){
       $('#startActivityFirstModal').modal('toggle');
       $("#video2").fadeIn(2000);
   });


   $("#btnStartSecondStepActivity").click(function(){
       $('#startActivityFirstSecondStepModal').modal('toggle');
       $("#imgFadeEx").fadeIn(3500);
     });


  
$("#scrolleable").on("scroll", function() {
	var scrollHeight = $("#scrolleable").height();
	var scrollPosition = $("#scrolleable").scrollTop();
	if (scrollPosition > 400) {
	     $("#btnStartActivity").prop('disabled', false);
	}
});

$("#btnStartActivity").click(function(){
     $("#initialContent").fadeOut("slow" , function(){
      window.location="{{URL::to('/DignoCarino2')}}";
     });
});

});
</script>
@endsection