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
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>1. Posición de cuna</b> </h4>
              </div>

               <div class="modal-body">
                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                      <b>Edad permitida:</b> Esta posición la puedes usar desde los 0 meses
                    </p>      
                  </div>

                  <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <b><i>Instrucciones</i></b>    
                    <p style="text-align:justify; text-justify: inter-word;"> 
                      Primero que deberás hacer, es recostar a tú bebé en un lugar donde 
                      haya espacio y comodidad (por ejemplo la cama). Ahora desliza tu mano
                       derecha entre su cabeza y su cuello; y la izquierda debajo de su cola, 
                       y mientras haces esto, tu mano derecha se irá deslizando de su cabeza 
                       hasta llegar al final de su espalda y tu mano izquierda deberá estar 
                       sosteniendo su colita y sus piernas, de forma que al final la cabeza
                       y la espalda de tu bebé queden acostados sobre tu brazo derecho, y 
                       su colita y sus piernas estarán sostenidas por tu brazo izquierdo.
                     </p>
                     <p style="text-align:justify; text-justify: inter-word;">
                      Ahora verás una imagen que te ayudará a ver como es la posición de cuna.
                     </p>
                         <div align="center">
                          <img style="width:280px; height:200px; text-align:center;" id="img1" src="{{asset('ActividadUnaVezBrazos/brazos1.png')}}">
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

<!-- Comienzo del modal de Inicio de posicion frente a frente -->
<div class="modal fade" id="startActivityFirstModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

     <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">  <b> 2. Frente a Frente</b> </h4>
         </div>

          <div class="modal-body">
             <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <p style="text-align:justify; text-justify: inter-word;">
                 <b>Edad permitida:</b> Esta posición la puedes usar desde los 0 hasta los 6 meses.
               </p>      
             </div>

             <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <b><i>Instrucciones</i></b>    
               <p style="text-align:justify; text-justify: inter-word;"> 
                Primero deberás acostar a tu bebé en un lugar donde haya espacio y comodidad, 
                luego coloca tu mano derecha detrás de su cuello y cabeza, y con la mano izquierda
                 lo sostendrás justo debajo de su cola, cuando lo tengas así, álzalo con mucho cuidado
                  y delicadeza, y ponlo frente a ti.
                </p>
                <p style="text-align:justify; text-justify: inter-word;">
                  Ahora verás una imagen que te ayudará a entender cómo es la posición frente a frente
                </p>
                    <div align="center">
                     <img style="width:280px; height:200px;text-align:center;" id="imgFadeEx" src="{{asset('ActividadUnaVezBrazos/brazos2.png')}}">
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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b>3. Boca abajo</b>  </h4>
         </div>

          <div class="modal-body">
             <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <p style="text-align:justify; text-justify: inter-word;">
                 <b>Edad permitida:</b>  Esta posición la puedes usar desde los 0 hasta los 6 meses
               </p>      
             </div>

             <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <b><i>Instrucciones</i></b>    
               <p style="text-align:justify; text-justify: inter-word;"> 
                Primero deberás acostar a tu bebé en un lugar donde haya espacio y comodidad. 
                Luego lo vas a alzar y a colocar boca abajo sobre tu antebrazo derecho, 
                de forma que tu mano quede sosteniendo su entrepierna. 
                Es importante que coloques su rostro de medio lado en tu 
                antebrazo para que esté cómodo.

                </p>
                <p style="text-align:justify; text-justify: inter-word;">
                  En seguida encontrarás una imagen de la forma en que debes acomodar a tu bebé.
                </p>
                    <div align="center">
                     <img style="width:280px; height:200px;text-align:center;" id="imgFadeEx" src="{{asset('ActividadUnaVezBrazos/brazos3.png')}}">
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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b>4. Pelota de Fútbol</b> </h4>
         </div>

          <div class="modal-body">
             <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <p style="text-align:justify; text-justify: inter-word;">
                 <b>Edad permitida:</b>  Esta posición la puedes usar desde los 4 meses. Es importante que sepas 
                 que esta capacidad de sostenerse aún no se ha desarrollado, pues su curvatura lumbar aún no 
                 tiene la madurez suficiente.
               </p>      
             </div>

             <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <b><i>Instrucciones</i></b>    
               <p style="text-align:justify; text-justify: inter-word;"> 
                Primero deberás acostar a tu bebé en un lugar donde haya espacio y comodidad. Ahora alza a tu bebé
                 y apoya su espalda sobre tu pecho, luego con tu brazo derecho rodea el pecho de tu bebé, mientras
                  que tu mano izquierda está sosteniendo su cola.
                </p>
                <p style="text-align:justify; text-justify: inter-word;">
                 <b> Nota:</b> Asegúrate de que su cabeza no deje de apoyarse contra tu pecho. Si estás sentado, puedes apoyar a tu
                   bebé sobre tu regazo y así ya no tendrás que cargarlo desde abajo.
                </p>
                <p style="text-align:justify; text-justify: inter-word;">
                  Mira a continuación la imagen que te ayudará a entender mejor cómo cargarlo.
                </p>
                    <div align="center">
                     <img style="width:280px; height:200px;text-align:center;" id="imgFadeEx" src="{{asset('ActividadUnaVezBrazos/brazos4.png')}}">
                   </div>    
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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b>5. Cerca de ti</b> </h4>
         </div>

          <div class="modal-body">
             <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <p style="text-align:justify; text-justify: inter-word;">
                 <b>Edad permitida:</b>  Esta posición la puedes usar desde los 0 meses 
               </p>      
             </div>

             <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <b><i>Instrucciones</i></b>    
               <p style="text-align:justify; text-justify: inter-word;"> 
                Primero deberás acostar a tu bebé en un lugar donde haya espacio y comodidad, luego alza a tu hijo de forma que quede 
                frente a ti, con tu mano derecha sostén su espalda, mientras hagas esto, sostén a tu bebé con tu brazo 
                izquierdo de su cola. Debe quedar sentado en tu brazo. Ahora lleva tu bebé hacia tu pecho, de forma que permanezca 
                recostado sobre ti.
                </p>
                <p style="text-align:justify; text-justify: inter-word;">
                  Puedes ver una imagen que te ayudará a entender mejor la posición cerca de ti.
                </p>
                    <div align="center">
                     <img style="width:280px; height:200px;text-align:center;" id="imgFadeEx" src="{{asset('ActividadUnaVezBrazos/brazos5.png')}}">
                   </div>    
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
        $("#initialContent").fadeOut("slow" , function()
        {
          window.location="{{URL::to('/UnaVezBrazos2')}}";
        });
   });

});
</script>
@endsection