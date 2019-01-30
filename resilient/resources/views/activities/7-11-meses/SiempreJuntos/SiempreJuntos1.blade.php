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
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Siempre juntos - Explicación</b> </h4>
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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">  <b> Siempre juntos - Musica </b> </h4>
         </div>

          <div class="modal-body">
             <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <p style="text-align:justify; text-justify: inter-word;">
                    En este momento podrás ver las canciones que te proponemos y el video correspondiente para que lo puedas escuchar con tu bebé.
               </p>      
             </div>

             <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <b>Barquitos</b>

                <div align="center">
                        <div id="video"></div>
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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b>Siempre juntos- Musica</b>  </h4>
         </div>

          <div class="modal-body">
             <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
               <b>El viejo MacDonald</b>
                    <div align="center">
                            <div id="video1"></div>
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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b> Siempre juntos  - Musica </b> </h4>
         </div>

         <div class="modal-body">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <b>La risa de las vocales</b>
                  <p style="text-align:justify; text-justify: inter-word;"> 
                        Mirar del minuto 0 a los 2:00 minutos
                   </p>
                       <div align="center">
                           <div id="video2"></div>
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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b> Siempre juntos  - Musica </b> </h4>
         </div>

         <div class="modal-body">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <b>El payaso plin</b>
                       <div align="center">
                           <div id="video3"></div>
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
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"><b> Siempre juntos - Musica </b></h4>
         </div>

         <div class="modal-body">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <b>Música para dormir </b>    
                       <div align="center">
                           <div id="video4"></div>
                       </div>
              </div> <!--modal body close -->

        </div><!--modal content close -->

          <div class="modal-footer">
           <span class="pull-right">
           <!-- SI acepta sigue el flujo normal de la aplicación-->
              <button id="btnMusicaDormir3" type="button" class="btn btn-primary" data-dismiss="modal">
                Siguiente
              </button>
           </span>
          </div>
    </div> <!--modal dialog close -->
     </div>  <!--modal fade close -->
</div>

<!-- Comienzo del modal de Inicio de posicion final -->
<div class="modal fade" id="finaldialog"
     tabindex="-1" role="dialog"
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">


     <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> <b> Siempre juntos  - Musica </b> </h4>
         </div>

         <div class="modal-body">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <b>Música para dormir</b>
                       <div align="center">
                           <div id="video5"></div>
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

        <script src="http://www.youtube.com/player_api"></script>

        <script type="text/javascript">

        function crearVideos(){

            window.player = new YT.Player('video', {
                width: '100%',
                height: '315',
                videoId: 'lD6e81Gt3mA'
            });

            window.player2 = new YT.Player('video1', {
                width: '100%',
                height: '315',
                videoId: 'h-GjHpoSpZs'
            });

            window.player3 = new YT.Player('video2', {
                width: '100%',
                height: '315',
                videoId: 'OHUktPPdTaM'
            });

            window.player4 = new YT.Player('video3', {
                width: '100%',
                height: '315',
                videoId: 'NsRz2ObXMsY'
            });

            window.player5 = new YT.Player('video4', {
                width: '100%',
                height: '315',
                videoId: '8o_qyvtSPlo'
            });

            window.player6 = new YT.Player('video5', {
                width: '100%',
                height: '315',
                videoId: 'zipFVUYa6Iw'
            });
        }

        setTimeout(function () {
            crearVideos();
        },2000);

    </script>

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
        window.player.stopVideo();
   });

   $("#btnStartpelotaf").click(function()
   {
     $('#posicionpelotafutbol').modal('toggle');
       window.player2.stopVideo();
   });

   $("#btnStartcercadeti").click(function()
   {
       $('#musicadormir1').modal('toggle');
       window.player3.stopVideo();
   });

   // continuar aqui el flujo de los modal

   $("#btnMusicaDormir2").click(function()
   {
       $('#musicadormir2').modal('toggle');
       window.player4.stopVideo();
   });

   $("#btnMusicaDormir3").click(function()
   {
       $('#finaldialog').modal('toggle');
       window.player5.stopVideo();
   });

   $("#btnFinalizar").click(function()
   {
        $("#initialContent").fadeOut("slow" , function()
        {
          window.location="{{URL::to('/actividades/siempre-juntos-3')}}";
        });
   });

});
</script>
@endsection