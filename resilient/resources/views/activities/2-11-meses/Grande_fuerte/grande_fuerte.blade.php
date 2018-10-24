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
        id="favoritesModalLabel">Cuando presto atención es cuando yo entiendo</h4>
      </div>
      <div class="modal-body">

<div style="text-align:center;">
   <p> <b>Instrucción:</b> Con el puño derecho
cerrado, levantar el dedo meñique. Al
mismo tiempo, con el puño izquierdo
cerrado, levanta dedo índice. Luego,
invierte los movimientos y hazlos con
la mano derecha, el índice, en la
izquierda, el meñique.</p>


<img style="display:none;" id="imagen1" src="{{asset('img/paraFuerte.JPG')}}" />
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
        id="favoritesModalLabel">Que tanto conoces a tu niña o niño</h4>
      </div>
      <div class="modal-body">

<div>
<label for="inp1">¿Qué actividades hace tu niño o niña en la mañana?</label>
<input id="inp1" class="form-control" type="text" />

<label for="inp2">¿Qué actividades hace tu niño o niña en la tarde?</label>
<input id="inp2" class="form-control" type="text" />

<label for="inp3">¿Qué actividades hace tu niño o niña en la noche?</label>
<input id="inp3" class="form-control" type="text" />

<label for="inp4">¿Cuáles actividades te gustaría que hiciera tu niño o niña en la mañana?</label>
<input id="inp4" class="form-control" type="text" />

<label for="inp5">¿Cuáles actividades te gustaría que hiciera tu niño o niña en la tarde?</label>
<input id="inp5" class="form-control" type="text" />

<label for="inp6">¿Cuáles actividades te gustaría que hiciera tu niño o niña en la noche?</label>
<input id="inp6" class="form-control" type="text" />

</div>


      </div>
      <div class="modal-footer">

        <span class="pull-right">
        <!-- SI acepta sigue el flujo normal de la aplicación-->
          <button id="btnStartSecondStepActivity" type="button" class="btn btn-primary">
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
      $("#imagen1").fadeIn(2000);



        $("#btnStartActivity").click(function(){
         $('#startActivityFirstModal').modal('toggle');
         $("#imgFadeIn").fadeOut("fast" , function(){
            $("#imgFadeIn").fadeIn(4000);
         });
         
      });


   $("#btnStartSecondStepActivity").click(function(){
       if( $("#inp1").val() == "" || $("#inp2").val() == "" || 
           $("#inp3").val() == "" || $("#inp4").val() == "" ||
           $("#inp5").val() == "" || $("#inp6").val() == ""){
       alert("Complete todos los campos");
       }else{
        $('#startActivityFirstModal').modal('hide');

        $('#startActivityFirstSecondStepModal').modal('toggle');
         $("#imgFadeInSilence").fadeOut("fast", function(){
            $("#imgFadeInSilence").fadeIn(4000);
         });
       }
     });


});
</script>
@endsection