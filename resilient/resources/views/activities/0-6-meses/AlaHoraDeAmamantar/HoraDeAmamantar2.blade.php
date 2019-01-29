@extends('partials.layout')

@section('title')
 A La Hora De Amamantar
@endsection
<style>
    ul{
    list-style-type: none;
  }
  li {
    display: inline-block;
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
    width: 150px;
    transition-duration: 0.2s;
    transform-origin: 50% 50%;
  }
  :checked + label {
    border-color: #ddd;
  }
  :checked + label::before {
    content: "X";
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
  </style>
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/HoraAmamantar3')}}">
            <div class="card">

                <div class="card-head style-primary">
                   <header>  A La Hora De Amamantar - Actividad de identificación  </header>
                </div>

              <div class="card-body floating-label">
                <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:justify; text-justify: inter-word;">
                    En ocasiones, se presentan dificultades a la hora de lactar, las madres primerizas suelen
                     asustarse cuando presentan algunos síntomas. Si deseas consultar mitos y realidades sobre 
                     la lactancia, puedes consultar <a style="color:blue" href="https://www.unicef.org/Mitos_de_la_lactancia_materna.pdf" target="_blank" >AQUÍ
                     </a> información presentada por UNICEF.
                  </p>
                </div> 

                <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:justify; text-justify: inter-word;">
                    Recuerda que es completamente normal que presentes algunas molestias, también es importante que identifiques
                     si presentas alguna de las siguientes y que sepas qué hacer. 
                     <b> Te invitamos a que selecciones las afirmaciones con las que te sientas
                        identificada.</b>
                  </p>
                </div>
                
                <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        <b> DOLOR EN EL PEZÓN </b>
                    </p>
                    <ul>
                        <li><input type="checkbox" id="cb1" />
                            <label class="grow" for="cb1"> ¿Presentas sensibilidad y molestia en el pezón? </label>
                        </li>
                        <li><input type="checkbox" id="cb2" />
                            <label class="grow" for="cb2"> ¿La molestia ha superado la primera semana? </label>
                        </li>
                        <li><input type="checkbox" id="cb3" />
                            <label class="grow" for="cb3"> ¿Nadie te dio información sobre la manera apropiada en la que el bebé debe sujetarse del pezón?  </label>
                        </li>
                    </ul>
                </div>

                <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        <b>  CONGESTIÓN MAMARIA O LLENURA DE LA MAMA </b>
                    </p>
                    <ul>
                        <li><input type="checkbox" id="cb4" />
                            <label class="grow" for="cb4"> ¿Sientes que el seno se inflama demasiado? </label>
                        </li>
                        <li><input type="checkbox" id="cb5" />
                            <label class="grow" for="cb5"> 	¿Sientes que el seno se endurece y sientes dolor?  </label>
                        </li>
                        <li><input type="checkbox" id="cb6" />
                            <label class="grow" for="cb6"> ¿Has estado estresada o te has sentido muy ansiosa? </label>
                        </li>
                        <li><input type="checkbox" id="cb6" />
                          <label class="grow" for="cb6"> Tienes leche acumulada pero no logras amamantar de manera adecuada? </label>
                      </li>
                    </ul>
                </div>


                <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        <b>  MASTITIS </b>
                    </p>
                    <ul>
                        <li><input type="checkbox" id="cb7" />
                            <label class="grow" for="cb7"> ¿Has notado que tienes zonas rojas en el seno?  </label>
                        </li>
                        <li><input type="checkbox" id="cb8" />
                            <label class="grow" for="cb8"> 	¿Has sentido zonas adoloridas, duras, sensibles al tacto e inusualmente calientes? </label>
                        </li>
                        <li><input type="checkbox" id="cb9" />
                            <label class="grow" for="cb9"> ¿Has presentado escalofríos?</label>
                        </li>
                        <li><input type="checkbox" id="cb10" />
                          <label class="grow" for="cb10"> ¿Has tenido fiebre de 38 grados centígrados o más? </label>
                      </li>
                      <li><input type="checkbox" id="cb11" />
                        <label class="grow" for="cb12"> ¿Te has sentido fatigada?  </label>
                    </li>
                    </ul>
                </div>

                <div  id="afirmativo" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" >
                    <p style="text-align:justify; text-justify: inter-word;">
                        Si tienes más de 3 respuestas afirmativas es importante que te pongas en contacto 
                        con tu personal de salud. No dejes pasar ninguna de estos signos.
                    </p>
                </div>
                

             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" > <button onclick="validar()" type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
@section('addjs')

<script type="text/javascript">

function validar ()
    {
        if($('input[type=checkbox]:checked').length == 0)
        {
            alert("Debe seleccionar por lo menos una afirmación ");
            event.preventDefault();
            return false;
        }
        else 
        {
            document.getElementById("formulario").submit();
            return true;
        }

    }   
$(document).ready(function(){

$('#btnhid').change(function(){
   $("#labelpan").css("display","none");
   $("#buttonPass").fadeIn(1000);
});


});
</script>
@endsection