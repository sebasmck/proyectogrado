@extends('partials.layout')
@section('title')
Actividad Siempre Contigo 
@endsection
<style>
        ul {
            list-style-type: none;
          }
          input[type="radio"][id^="cb"] {
            display: none;
          }
          label {
            border: 1px solid #fff;
            padding: 10px;
            display: block;
            position: relative;
            margin: 10px;
            cursor: pointer;
          }
          label::before {
            background-color: white;
            color: white;
            content: " ";
            display: block;
            border-radius: 50%;
            border: 1px solid grey;
            position: absolute;
            top: -5px;
            left: -5px;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 28px;
            transition-duration: 0.4s;
            transform: scale(0);
          }
          
          label img {
            height: 100px;
            width: 100px;
            transition-duration: 0.2s;
            transform-origin: 50% 50%;
          }
          
          :checked + label {
            border-color: #ddd;
          }
          
          :checked + label::before {
            content: "✓";
            background-color: grey;
            transform: scale(1);
          }
          
          :checked + label img {
            transform: scale(0.9);
            box-shadow: 0 0 5px #333;
            z-index: -1;
          }
          
          .grow { transition: all .2s ease-in-out; }
          .grow:hover { transform: scale(0.9); }
      
      
          .objects {
              display:inline-table;
              background-color: #FFF3CC;
              border: #DFBC6A 1px solid;
              width: 150px; 
              height: 30px;
              margin: 10px;
              padding: 8px;
              font-size: 12px;
              text-align: center;
              box-shadow: 2px 2px 2px #999;
              cursor: move;
          }
          .drop_zone {
              background-color: #EEE; 
              border: #999 1px solid;
              width: 200px; 
              height: 150px;
              padding: 5px;
              font-size: 18px;
              margin-left: 140%;
          }
          .row, b{
              margin-bottom: 30px;
          }
          #qualities{
              margin-right: 25px;
              margin-left: 15px;
              font-size: 18px;
          }
           .actContainer{
              display: inline-block;
              margin-bottom: 20px;
              margin-left: 20px;
          }
      
          </style>
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/CulminacionSiempreContigo')}}">
        <div class="card">

                <div class="card-head style-primary">
                   <header>   Siempre Contigo   - Cuentos </header>
                </div>

              <div class="card-body floating-label">
                

                <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:justify; text-justify: inter-word;">
                   A continuación encontrarás un link con gran cantidad de cuentos que puedes descargar <a style="color:blue" href="http://www.cuentosinfantilesadormir.com/descargarcuentosinfantiles.htm " target="_blank" >AQUÍ
                             </a> 
                     </p>
                 </div> 

             <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                <p style="text-align:justify; text-justify: inter-word;">
                   <b>Cuentos de los hermanos Grimm </b>  
               </p>    
             <p style="text-align:justify; text-justify: inter-word;">
               - Link:                   
               <a style="color:blue" href="https://www.imprentanacional.go.cr/editorialdigital/libros/literatura%20infantil/cuentos_hermanos_grimm_edincr.pdf " target="_blank" >clic aqui
                         </a> 
                 </p>
              </div> 
                
              <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                <p style="text-align:justify; text-justify: inter-word;">
                     También te enseñaremos unos cuentos en audio que le puedes colocar a tu bebé y que tal vez le gusten mucho. 
                  </p>
               </div> 
                  

               <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                <p style="text-align:justify; text-justify: inter-word;">
                   <b>Caperucita roja</b>  
                </p>   
                <iframe width="560" height="315" src="https://www.youtube.com/embed/yYEWzB89xqo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
              </div> 

              <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                <p style="text-align:justify; text-justify: inter-word;">
                   <b>Blanca nieves</b>  
                </p>  
                <iframe width="560" height="315" src="https://www.youtube.com/embed/ZzZn9HWvxTc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  
              </div> 

              <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                <p style="text-align:justify; text-justify: inter-word;">
                   <b>Pinocho</b>  
                </p>    
                <iframe width="560" height="315" src="https://www.youtube.com/embed/mW92gIr6FaI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div> 
              <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                <p style="text-align:justify; text-justify: inter-word;">
                   <b>Los tres cerditos</b>  
                </p> 
                <iframe width="560" height="315" src="https://www.youtube.com/embed/ViRUaVU9Fzc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>   
              </div> 
   <br>
                <div id="otro" class="col-sm-13" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; background-color: lightcyan;">
                                <label id="labelOtro" for="" style="color:black" >
                                  En el siguiente cuadro debes escribir qué día le leíste o escuchaste con él un cuento. 
                                </label>
                                <br>
                                   <textarea name="textarea1" id="textarea" class="form-control" rows="3" placeholder="" required></textarea>
                                <div class="form-control-line">
        
                                </div>
                </div>         


             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" > <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
@section('addjs')

<script type="text/javascript">

$(document).ready(function()
{
$('#btnhid').change(function(){
   $("#labelpan").css("display","none");
   $("#buttonPass").fadeIn(1000);
});

});
</script>
@endsection