@extends('partials.layout')

@section('title')
Descubriendo Las Emociones 
@endsection
@section('content')

<div class="container" id="initialContent">
    <div align="center">
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
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Descubriendo Las Emociones  - Parte Tres </b> </h4>
              </div>

               <div class="modal-body">
                    <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                            <p style="text-align:justify; text-justify: inter-word;">
                                <b> Ya que sabes todo esto sobre aceptar las emociones y su curva; vamos a enseñarte 
                                    cómo definir una emoción y cómo puedes reconocerla. </b>
                            </p>
                          </div>  
                          
                          <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                              <p style="text-align:justify; text-justify: inter-word;">
                                      Durante años ha sido muy difícil dar una definición exacta de las emociones,
                                       pero se ha encontrado una forma de identificarlas.
                              </p> 
                              <p style="text-align:justify; text-justify: inter-word;">
                                      1. Las puedes identificar por lo <b>FISIOLÓGICO</b>, eso quiere decir que por las reacciones
                                       de cuerpo. Por ejemplo, puedes sentir cosas como estas:
                              </p>
                            </div>   
                              <div align="center">
                                    <img WIDTH="670" HEIGTH="670"  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/caso1.png')}}"/>
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

<!-- Comienzo del modal de Inicio de posicion frente a frente -->
<div class="modal fade" id="startActivityFirstModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

     <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">  <b> Descubriendo Las Emociones  - Parte Tres</b> </h4>
         </div>

          <div class="modal-body"> 
                      <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                          <p style="text-align:justify; text-justify: inter-word;">
                                  2. Las identificamos por lo <b>COGNITIVO</b>, ósea lo que pensamos en nuestra mente. Por ejemplo: 
                          </p>
      
                          <div align="center">
                                <img WIDTH="670" HEIGTH="670"  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/caso2.png')}}"/>
                          </div>
                      </div>
           </div> <!--modal body close -->

         <div class="modal-footer">
           <span class="pull-right">
           <!-- SI acepta sigue el flujo normal de la aplicación-->
              <button id="btnStartSecondStepActivity" type="button" class="btn btn-primary" data-dismiss="modal">
                Siguiente
              </button>
           </span>
         </div>
    </div><!--modal content close -->
</div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal de Inicio de actividad-->

<!-- Comienzo del modal de Inicio de posicion boca abajo -->
<div class="modal fade" id="posicionbocaabajo" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

     <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">  <b> Descubriendo Las Emociones  - Parte Tres</b>  </h4>
         </div>

         <div class="modal-body"> 
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                            3.	Las identificamos por lo <b>MOTOR</b>, ósea las acciones que llevamos a cabo. Por ejemplo:
                    </p>

                    <div align="center">
                          <img WIDTH="470" HEIGTH="470"  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/caso3.png')}}"/>
                    </div>
                </div>
     </div> <!--modal body close -->

         <div class="modal-footer">
           <span class="pull-right">
           <!-- SI acepta sigue el flujo normal de la aplicación-->
              <button id="btnStartpelotaf" type="button" class="btn btn-primary" data-dismiss="modal">
                Siguiente
              </button>
           </span>
         </div>
    </div><!--modal content close -->
</div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal de Inicio de actividad-->
@endsection

@section('addjs')

<script>
$(document).ready(function()
{
   $('#startActivityModal').modal('toggle');

   $("#btnStartActivity").click(function()
   {
     $('#startActivityFirstModal').modal('toggle');
   });

   $("#btnStartSecondStepActivity").click(function()
   {
        $('#posicionbocaabajo').modal('toggle');
   });
   
   $("#btnStartpelotaf").click(function()
   {
    $("#initialContent").fadeOut("slow" , function()
        {
          window.location="{{URL::to('/DescubriendoEmociones8')}}";
        });
   });  
});
</script>
@endsection