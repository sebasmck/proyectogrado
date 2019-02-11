@extends('partials.layout')

@section('title')
Descubriendo Las Emociones 
@endsection
<style>
        ul {
            list-style-type: none;
          }
          input[type="radio"][id^="cb"] {
            display: none;
          }
          input[type="checkbox"][id^="cb"] {
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
          .imagenes 
          {
            height: 50px;
            width: 150px;
            transition-duration: 0.2s;
            transform-origin: 50% 50%;
          }
      
          </style>
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/CulminacionDescubriendoEmociones')}}">
            <div class="card">

                <div class="card-head style-primary">
                   <header>  Descubriendo Las Emociones  - Nuestros Logros </header>
                </div>

              <div class="card-body floating-label">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:justify; text-justify: inter-word;">
                    ¿Se te dificulto reconocer alguna emoción?
                  </p>
                </div>  

                <div class="row">
                    <div class="col-sm-2">
                        <input type="radio" id="cb1" name="optionsRadios" value="1" required/>
                        <label class="grow" for="cb1"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/si.png') }}" style="margin-inline-start:10%"/> 
                        </label>
                    </div>   
                    <div class="col-sm-2">
                            <input type="radio" id="cb2" name="optionsRadios" value="2"/>
                            <label class="grow" for="cb2"><img WIDTH="100" HEIGTH="100"  id="imagen2" src="{{asset('ActividadDescubriendoEmociones/no.png') }}" style="margin-inline-start:10%"/> 
                            </label>
                        </div>  
                </div>  

                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                        <p style="text-align:justify; text-justify: inter-word;">
                            Selecciona cuál o cuáles de las siguientes emociones se te dificultaron más reconocer
                        </p>
                </div> 
                <div class="row">
                        <div class="col-sm-2">
                            <input type="checkbox" id="cb3" name="optionsRadios1" value="1" />
                            <label class="grow" for="cb3"><img class="imagenes" id="imagen3" src="{{asset('ActividadDescubriendoEmociones/bAlegria.png') }}" style="margin-inline-start:10%"/> 
                            </label>
                        </div>   
                        <div class="col-sm-2">
                                <input type="checkbox" id="cb4" name="optionsRadios1" value="2"/>
                                <label class="grow" for="cb4"><img  class="imagenes"  id="imagen4" src="{{asset('ActividadDescubriendoEmociones/bEnojo.png') }}" style="margin-inline-start:10%"/> 
                                </label>
                            </div>  
                            <div class="col-sm-2">
                                    <input type="checkbox" id="cb5" name="optionsRadios1" value="1"/>
                                    <label class="grow" for="cb5"><img  class="imagenes" id="imagen5" src="{{asset('ActividadDescubriendoEmociones/bMiedo.png') }}" style="margin-inline-start:10%"/> 
                                    </label>
                                </div>   
                                <div class="col-sm-2">
                                        <input type="checkbox" id="cb6" name="optionsRadios1" value="2"/>
                                        <label class="grow" for="cb6"><img  class="imagenes" id="imagen6" src="{{asset('ActividadDescubriendoEmociones/bTristeza.png') }}" style="margin-inline-start:10%"/> 
                                        </label>
                                    </div>  
                </div>   

                <div  id="mostrar" align="center" class="row" style="display:none">
                        <div class="col-sm-3">
                            <img  id="imagen3" src="{{asset('ActividadDescubriendoEmociones/final.png') }}" style="margin-inline-start:10%"/> 
                        </div>   
                        <div class="col-sm-4" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                                <p style="text-align:justify; text-justify: inter-word;">
                                        NO IMPORTA QUE TAN FÁCIL O DIFÍCIL HAYA SIDO RECONOCER TUS EMOCIONES, EN ESTE MOMENTO 
                                        YA TIENE CONOCIMIENTOS CON LOS CUALES PODRÁS AYUDAR A TU BEBÉ EN ESE PROCESO.
                                </p>
                        </div>      
                </div>   
     
                
             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" > <button  onclick="validar()" type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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

$('#cb1').click(function() {
    if($("input[type=radio]:checked").length == 1 && $("input[type=checkbox]:checked").length >=1)
    {
        $("#mostrar").fadeIn(); 
    }
});
$('#cb2').click(function() {
    if($("input[type=radio]:checked").length == 1 && $("input[type=checkbox]:checked").length >=1)
    {
        $("#mostrar").fadeIn(); 
    }
});
$('#cb3').click(function() {
    if($("input[type=radio]:checked").length == 1 && $("input[type=checkbox]:checked").length >=1)
    {
        $("#mostrar").fadeIn(); 
    }
});
$('#cb4').click(function() {
    if($("input[type=radio]:checked").length == 1 && $("input[type=checkbox]:checked").length >=1)
    {
        $("#mostrar").fadeIn(); 
    }
});
$('#cb5').click(function() {
    if($("input[type=radio]:checked").length == 1 && $("input[type=checkbox]:checked").length >=1)
    {
        $("#mostrar").fadeIn(); 
    }
});
$('#cb6').click(function() {
    if($("input[type=radio]:checked").length == 1 && $("input[type=checkbox]:checked").length >=1)
    {
        $("#mostrar").fadeIn(); 
    }
});
  
});

function validar ()
    {
        if($('input[type=checkbox]:checked').length == 0 && $("input[type=radio]:checked").length == 0)
        {
            alert("debes responder la pregunta y tambien debes seleccionar por lo menos una emoción");
            event.preventDefault();
            return false;
        }
        else 
        {
            document.getElementById("formulario").submit();
            return true;
        }

    }   
</script>
@endsection