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
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Contigo Siempre - Explicación</b> </h4>
              </div>

               <div class="modal-body">
                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                      Las actividades que realizarás con tu bebé serán leerle cuentos y cantar para esto encontrarás 
                      una serie de opciones en donde puedes hacer click para visualizar cuentos en audio, si tienes en
                       tu casa algunos cuentos, los puedes utilizar. Para las canciones también tendrás unos links y letras
                        de las canciones. Esta actividad no te tomará más de 10 a 15 minutos, la puedes hacer en las noches
                         cuando lo llevas a dormir, cuando lo estás amamantando, dándole el biberón o cuando lo estas bañando.
                    </p>      
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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">  <b> Contigo Siempre - Musica </b> </h4>
         </div>

          <div class="modal-body">
             <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <p style="text-align:justify; text-justify: inter-word;">
                    En este momento podrás ver las canciones que te proponemos y el video correspondiente para que lo puedas escuchar con tu bebé.
               </p>      
             </div>

             <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <b>Estrella dónde estás</b> <p style="text-align:justify; text-justify: inter-word;"> 
                    Mirar del minuto 0 al minuto 1:16
                </p> 
                <div align="center">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/ZM5syHyHDYE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b>Contigo Siempre - Musica</b>  </h4>
         </div>

          <div class="modal-body">
             <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <b>Pin Pon</b>    
               <p style="text-align:justify; text-justify: inter-word;"> 
                    Mirar del minuto 1:25 minutos al 3:00
                </p>
                    <div align="center">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/ZM5syHyHDYE?start=85" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b> Contigo Siempre  - Musica </b> </h4>
         </div>

         <div class="modal-body">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <b>Debajo del botón</b>    
                  <p style="text-align:justify; text-justify: inter-word;"> 
                        Mirar del minuto 3:00 minutos al 4:14
                   </p>
                       <div align="center">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/ZM5syHyHDYE?start=180" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
<div class="modal fade" id="musicadormir1" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

 
     <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b> Contigo Siempre  - Musica </b> </h4>
         </div>

         <div class="modal-body">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <b>Música para dormir </b>    
                       <div align="center">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/LeHdjrsEmFM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>    
                </div>
              </div> <!--modal body close -->

         <div class="modal-footer">
           <span class="pull-right">
           <!-- SI acepta sigue el flujo normal de la aplicación-->
              <button id="btnMusicaDormir2" type="button" class="btn btn-primary" data-dismiss="modal">
                Siguiente
              </button>
           </span>
         </div>
    </div><!--modal content close -->
</div> <!--modal dialog close -->
</div>  <!--modal fade close -->

<!-- Comienzo del modal de Inicio de posicion final -->
<div class="modal fade" id="musicadormir2" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

 
     <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"><b> Contigo Siempre  - Musica </b></h4>
         </div>

         <div class="modal-body">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <b>Música para dormir </b>    
                       <div align="center">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/xNv9u5Qv2cE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>    
                </div>
              </div> <!--modal body close -->

         <div class="modal-footer">
           <span class="pull-right">
           <!-- SI acepta sigue el flujo normal de la aplicación-->
              <button id="btnMusicaDormir3" type="button" class="btn btn-primary" data-dismiss="modal">
                Siguiente
              </button>
           </span>
         </div>
    </div><!--modal content close -->
</div> <!--modal dialog close -->
</div>  <!--modal fade close -->

<!-- Comienzo del modal de Inicio de posicion final -->
<div class="modal fade" id="musicadormir3" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

 
     <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b> Contigo Siempre  - Musica </b> </h4>
         </div>

         <div class="modal-body">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <b>Música para dormir </b>    
                       <div align="center">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/zipFVUYa6Iw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>    
                </div>
              </div> <!--modal body close -->

         <div class="modal-footer">
           <span class="pull-right">
           <!-- SI acepta sigue el flujo normal de la aplicación-->
              <button id="btnFinalizar" type="button" class="btn btn-primary" data-dismiss="modal">
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
       $('#musicadormir1').modal('toggle');     
   });

   // continuar aqui el flujo de los modal 

   $("#btnMusicaDormir2").click(function()
   {
       $('#musicadormir2').modal('toggle');     
   });

   $("#btnMusicaDormir3").click(function()
   {
       $('#musicadormir3').modal('toggle');     
   });
   $("#btnFinalizar").click(function()
   {
        $("#initialContent").fadeOut("slow" , function()
        {
          window.location="{{URL::to('/ContigoSiempre2')}}";
        });
   });

});
</script>
@endsection