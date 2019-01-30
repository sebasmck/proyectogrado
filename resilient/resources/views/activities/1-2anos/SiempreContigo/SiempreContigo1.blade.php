@extends('partials.layout')
@section('title')
Actividad Siempre Contigo 
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
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Siempre Contigo - Explicación</b> </h4>
              </div>

               <div class="modal-body">
                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                      Las actividades que realizarás con tu bebé serán leerle cuentos, cantar y hablar, para esto 
                      encontrarás una serie de opciones en donde puedes hacer clic para visualizar cuentos en audio,
                       si tienes en tu casa algunos cuentos, los puedes utilizar. Para las canciones también tendrás
                        unos links y letras de las canciones. Esta actividad no te tomará más de 10 a 15 minutos,
                         la puedes hacer en las noches cuando lo llevas a dormir, cuando lo estás amamantando, dándole 
                         el biberón o cuando lo estas bañando.

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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">  <b> Siempre Contigo  - Musica </b> </h4>
         </div>

          <div class="modal-body">
             <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <b>Chuchuwa </b>
                <div align="center">
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/bwl5ohtqmfQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b>Siempre Contigo - Musica</b>  </h4>
         </div>

          <div class="modal-body">
             <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <b>Ganas de aplaudir</b>    
                    <div align="center">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/D6NFFBDJ8Y8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                  <b>Itsy Bitsy araña</b>    
                  <p style="text-align:justify; text-justify: inter-word;"> 
                        Mirar del minuto 0:00 al 1:02
                   </p>
                       <div align="center">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/iI1lcPy8FqQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b> Siempre Contigo  - Musica </b> </h4>
         </div>

         <div class="modal-body">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <b>La risa de las vocales</b>    
                       <div align="center">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/OHUktPPdTaM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
    $("#initialContent").fadeOut("slow" , function()
        {
          window.location="{{URL::to('/SiempreContigo2')}}";
        });    
   });

});
</script>
@endsection