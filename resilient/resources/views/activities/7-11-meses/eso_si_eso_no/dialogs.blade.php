@extends('partials.layout')
@section('title')
Actividad Una Vez Mas En Mis Brazos 1  
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
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Actividad ¡Eso sí! ¡Eso no!</b> </h4>
              </div>

               <div class="modal-body">

                  <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <b><i>Instrucciones</i></b>    
                    <p style="text-align:justify; text-justify: inter-word;">
                        Esta actividad puede realizarse una vez o dos veces a la semana, durante 5 a 10 minutos, alternando los materiales.
                        Inicialmente le mostrarás a tu bebé las imágenes de objetos y animales peligrosos 1, 2 y 3 mientras tanto le hablarás en tonos diferentes conformes le vas mostrando cada imagen, acompañado de gestos y relatos de por qué significan peligro, para qué sirven, qué son y por qué no es sugerirle acercarse.

                    </p>
                  </div>
                </div> <!--modal body close -->

              <div class="modal-footer">
                <span class="pull-right">
                <!-- SI acepta sigue el flujo normal de la aplicación-->
                   <button id="btnStartActivity" type="button" class="btn btn-primary" data-dismiss="modal">
                     ¡Aquí vamos!
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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">  <b> Ejemplo 1</b> </h4>
         </div>

          <div class="modal-body">

             <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">

                    <div align="center">
                     <img style="width:280px; height:200px;text-align:center;" id="imgFadeEx" src="{{asset('ActividadEsen/001.png')}}">
                        <p>
                            <b><i>Ejemplo de verbalización</i></b> - Poner los dedos en los enchufes nos pueden lastimar ya que tienen electricidad.
                        </p>
                        <p>
                            <i><b>Nota:</b> recuerda hacer uso de expresiones con tu rostro que le hagan entender el peligro que corre si realiza esta acción.</i>
                        </p>
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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b> Ejemplo 2 </b>  </h4>
         </div>

          <div class="modal-body">
              <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">

                  <div>
                      <div align="center">
                          <img style="width:280px; height:200px;text-align:center;" src="{{asset('ActividadEsen/002.png')}}">
                          <p>
                              <b><i>Ejemplo de verbalización</i></b> - Si nos acercamos al fuego nos podríamos quemar y nos dolería mucho.
                          </p>
                          <p>
                              <i><b>Nota:</b> recuerda hacer uso de expresiones con tu rostro que le hagan entender el peligro que corre si realiza esta acción.</i>
                          </p>
                      </div>

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

<!-- Comienzo del modal de Inicio de posicion Pelota de Fútbol -->
<div class="modal fade" id="posicionpelotafutbol" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

     <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b>Ejemplo 3</b> </h4>
         </div>

          <div class="modal-body">
              <div>
                  <div align="center">
                      <img style="width:280px; height:200px;text-align:center;" src="{{asset('ActividadEsen/003.png')}}">
                      <p>
                          <b><i>Ejemplo de verbalización</i></b> - los animales salvajes al no estar domesticados como los perros o los gatos nos pueden hacer daño, ya que ellos no tienen contacto con los humanos.
                          .
                      </p>
                  </div>
                  <p>
                      <i><b>Nota:</b> recuerda hacer uso de expresiones con tu rostro que le hagan entender el peligro que corre si realiza esta acción.</i>
                  </p>

                  <hr />

                  <p>Luego de ensayar estas situaciones con tu bebé es necesario que identifiques en tu casa qué objetos, animales entre otros,
                      pueden ser peligrosos para tu hijo/a, una vez establecidos es necesario que te acerques con él
                      y le expliques porque debe tener cuidado.
                  </p>

                  <p>
                      <i><b>Nota:</b> Recuerda que lo puedes hacer en tiempo real o con imágenes.</i>
                  </p>

                  Posteriormente le mostrarás a tu bebé las imágenes 4, 5 y 6 de comida, personas y cosas que no generan peligro mientras realizas esta acción,
                  le hablaras en tonos diferentes conformes le vas mostrando cada imagen, acompañado de gestos y relatos de por qué es bueno comerlo, para que sirve y quiénes son
              </div>
           </div> <!--modal body close -->

         <div class="modal-footer">
           <span class="pull-right">
           <!-- SI acepta sigue el flujo normal de la aplicación-->
              <button id="btnStartcercadeti" type="button" class="btn btn-primary" data-dismiss="modal">
                Siguiente
              </button>
           </span>
         </div>
    </div><!--modal content close -->
</div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal de Inicio de actividad-->



<!-- Comienzo del modal de Inicio de posicion final -->
<div class="modal fade" id="startActivityFirstSecondStepModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

 
     <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b>Ejemplo 4</b> </h4>
         </div>

          <div class="modal-body">
              <div align="center">
                  <img style="width:280px; height:200px;text-align:center;" src="{{asset('ActividadEsen/004.png')}}">
                  <p>
                      <b><i>Ejemplo de verbalización</i></b> - Los juguetes nos sirven para divertirnos.
                  </p>

                  <p>
                      <i><b>Nota:</b> recuerda hacer uso de expresiones con tu rostro que le hagan entender el peligro que corre si realiza esta acción.</i>
                  </p>
              </div>
           </div> <!--modal body close -->

         <div class="modal-footer">
           <span class="pull-right">
           <!-- SI acepta sigue el flujo normal de la aplicación-->
              <button id="btnStartThirdStepActivity" type="button" class="btn btn-primary" data-dismiss="modal">
                Siguiente
              </button>
           </span>
         </div>
    </div><!--modal content close -->
</div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal de Inicio de primera actividad segundo Paso   btnStartThirdStepActivity-->



<!-- Comienzo del modal de Inicio de posicion final -->
<div class="modal fade" id="imagen5"
     tabindex="-1" role="dialog"
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">


    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b>Ejemplo 5</b> </h4>
            </div>

            <div class="modal-body">
                <div align="center">
                    <img style="width:280px; height:200px;text-align:center;" src="{{asset('ActividadEsen/005.png')}}">
                    <p>
                        <b><i>Ejemplo de verbalización</i></b> - Las frutas y verduras nos ayudan a crecer sanos y fuertes. .
                    </p>
                    <p>
                        <i><b>Nota:</b> recuerda hacer uso de expresiones con tu rostro que le hagan entender el peligro que corre si realiza esta acción.</i>
                    </p>
                </div>
            </div> <!--modal body close -->

            <div class="modal-footer">
           <span class="pull-right">
           <!-- SI acepta sigue el flujo normal de la aplicación-->
              <button id="btnimagen5" type="button" class="btn btn-primary" data-dismiss="modal">
                Siguiente
              </button>
           </span>
            </div>
        </div><!--modal content close -->
    </div> <!--modal dialog close -->
</div>  <!--modal fade close -->


<!-- Comienzo del modal de Inicio de posicion final -->
<div class="modal fade" id="imagen6"
     tabindex="-1" role="dialog"
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">


    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b>Ejemplo 6</b> </h4>
            </div>

            <div class="modal-body">
                <div align="center">
                    <img style="width:280px; height:200px;text-align:center;" src="{{asset('ActividadEsen/006.png')}}">
                    <p>
                        <b><i>Ejemplo de verbalización</i></b> - Papá y mamá siempre estarán para ayudarte.
                    </p>
                    <p>
                        <i><b>Nota:</b> recuerda hacer uso de expresiones con tu rostro que le hagan entender el peligro que corre si realiza esta acción.</i>
                    </p>
                    <p>
                        <i><b>Nota:</b> si deseas mostrarle otras fotografías a tu bebé lo puedes hacer. </i>
                    </p>
                </div>
            </div> <!--modal body close -->

            <div class="modal-footer">
           <span class="pull-right">
           <!-- SI acepta sigue el flujo normal de la aplicación-->
              <button id="btnimagen6" type="button" class="btn btn-primary" data-dismiss="modal">
                Siguiente
              </button>
           </span>
            </div>
        </div><!--modal content close -->
    </div> <!--modal dialog close -->
</div>  <!--modal fade close -->
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
     $('#posicionpelotafutbol').modal('toggle');
   });  

   $("#btnStartcercadeti").click(function()
   {
       $('#startActivityFirstSecondStepModal').modal('toggle');     
   });

    $("#btnStartThirdStepActivity").click(function()
    {
        $('#imagen5').modal('toggle');
    });

    $("#btnimagen5").click(function()
    {
        $('#imagen6').modal('toggle');
    });

   $("#btnimagen6").click(function()
   {
        $("#initialContent").fadeOut("slow" , function()
        {
          window.location="{{URL::to('/actividades/eso-si-eso-no-3')}}";
        });
   });

});
</script>
@endsection