@extends('partials.layout')

@section('title')
Creando Confianza 2
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Creando Confianza 2 </header>
                </div>

                <div class="card-body floating-label">

                 <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:#008efd;" > 
                       <p style="text-align:center; text-justify: inter-word;"><b>Actividad - Puente De La Confianza</b></p> 
                </div>

                  <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;" >
                  <label> <p style="text-align:justify; text-justify: inter-word;">
                  Como se vio anteriormente, existen características específicas de la confianza básica. 
                  Para recordar cuales son, te invitamos a ayudar a “Juan y Juanita”.</p></label>
                  </div>
                  
                  <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;" >
                  <label> <p style="text-align:justify; text-justify: inter-word;">
                  Ellos, quieren crear confianza básica en sus niños, pero primero tiene que pasar por un puente compuesto por 10 escalones,
                   los cuales solo aparecen si escoges las características adecuadas. </p></label>
                  </div>

                  <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;" >
                  <label> <p style="text-align:justify; text-justify: inter-word;">
                  En la siguiente tabla encontraras 30 palabras de las cuales solo 10 arman el puente para que Juan y Juanita puedan pasar,
                  recuerda la actividad anterior, esta te ayudara a seleccionar correctamente las características de 
                  la confianza básica.  ¡¡¡¡Buena Suerte!!!!</p></label>
                  </div>
                  {{-- ESCALONES --}}
                   <div class="title" >

                     <p style="text-align:center;"> 
                       <img class="map_dummy"  src="{{asset('ActividadCreandoConfianza/EscalonesFI.png')}}" alt="escalones" id="escalones" usemap="#escalon" >
                       <map name="escalon">
                            <area id="Escalon1" alt="Escalon1" coords="11,12,133,58" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon2" alt="Escalon2C" coords="10,74,132,118" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon3" alt="Escalon3" coords="12,133,134,176" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon4" alt="Escalon4" coords="13,191,133,235" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon5" alt="Escalon5C" coords="11,248,134,295" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />    
                            <area id="Escalon6" alt="Escalon6" coords="12,304,134,350" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            
                            <area id="Escalon7" alt="Escalon7C" coords="149,12,265,58" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon8" alt="Escalon8" coords="148,75,265,119" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon9" alt="Escalon9" coords="149,133,264,177" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon10" alt="Escalon10" coords="149,190,265,235" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon11" alt="Escalon11C" coords="148,250,264,294" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon12" alt="Escalon12" coords="150,307,262,350" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            
                            <area id="Escalon13" alt="Escalon13" coords="290,11,405,57" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon14" alt="Escalon14" coords="291,75,404,118" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon15" alt="Escalon15C" coords="293,131,406,177" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon16" alt="Escalon16C" coords="292,189,404,234" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon17" alt="Escalon17" coords="292,247,405,293" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon18" alt="Escalon18" coords="292,305,407,351" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            
                            <area id="Escalon19" alt="Escalon19" coords="434,12,561,56" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon20" alt="Escalon20C" coords="434,75,560,116" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon21" alt="Escalon21" coords="435,133,560,180" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon22" alt="Escalon22" coords="435,190,564,239" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon23" alt="Escalon23" coords="433,251,561,294" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon24" alt="Escalon24C" coords="435,306,562,348" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            
                            <area id="Escalon25" alt="Escalon25C" coords="583,12,696,59" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon26" alt="Escalon26" coords="583,74,696,120" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon27" alt="Escalon27" coords="584,133,698,177" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon28" alt="Escalon28" coords="584,189,697,234" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon29" alt="Escalon29C" coords="583,249,696,296" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="Escalon30" alt="Escalon30" coords="585,306,697,351" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                      </map>
                    </p>

                 </div>  
                 {{-- FIN -ESCALONES --}}
                 {{-- Puente --}}
                   <div class="title" >
                    <p style=" font-family: 'Raleway', sans-serif; text-align:center; text-justify: inter-word; font-size: 18px;color:black;">
                       <b> Puente de las Características de la Confianza Básica - El puente de "Juan y Juanita"<b> 
                    </p> 
                     <img src="{{asset('ActividadCreandoConfianza/JuanJuanita.png')}}" align="left"  alt="JuanJuani" id="JuanJuani">
                     <div align="center">

                         <img src="{{asset('ActividadCreandoConfianza/Escalon1.png')}}" align="left"  alt="E1" id="E1" style = "display:none;margin-top:50px;">
                         <img src="{{asset('ActividadCreandoConfianza/Escalon2.png')}}" align="left"  alt="E2" id="E2"  style = "display:none;margin-top:50px;">
                         <img src="{{asset('ActividadCreandoConfianza/Escalon3.png')}}" align="left"  alt="E3" id="E3"  style = "display:none;margin-top:50px;">
                         <img src="{{asset('ActividadCreandoConfianza/Escalon4.png')}}" align="left"  alt="E4" id="E4" style = "display:none;margin-top:50px;">
                         <img src="{{asset('ActividadCreandoConfianza/Escalon5.png')}}" align="left"  alt="E5" id="E5" style = "display:none;margin-top:50px;"> 
                         <img src="{{asset('ActividadCreandoConfianza/Escalon6.png')}}" align="left"  alt="E6" id="E6" style = "display:none;margin-top:50px;">
                         <img src="{{asset('ActividadCreandoConfianza/Escalon7.png')}}" align="left"  alt="E7" id="E7" style = "display:none;margin-top:50px;">
                         <img src="{{asset('ActividadCreandoConfianza/Escalon8.png')}}" align="left"  alt="E8" id="E8" style = "display:none;margin-top:50px;">
                         <img src="{{asset('ActividadCreandoConfianza/Escalon9.png')}}" align="left"  alt="E9" id="E9" style = "display:none;margin-top:50px;">

                     </div>
                     <img src="{{asset('ActividadCreandoConfianza/Final.png')}}" alt="Final" id="Final" style = "float:right; margin-right:290px;">
                 </div>  
                {{-- FIN-Puente --}}
                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction"  href="{{route('/CreandoConfianza3')}}"> <button type="button" id="boton" style="display:none" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>
        </div><!--end .card -->
        </form>
    </div>

@endsection
@section('addjs')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{asset('js/jquery.maphilight.js')}}"></script>
<script>
var tl = new TimelineLite();
        avatar = $('.avatar');

         var title = $('.title'),
        logo = $('#escalones');
        tl.from(title, 2.5, {left:100, opacity:0});

        //  content = $('.content-card');
        // tl.to(title, 1.5, {y:10});
        // tl.from(card1, .3, {left:100, opacity:0});  


$(function () {

                $('.map_dummy').maphilight();
                $("#Escalon2").click(function ()
                 {
                    removeAllSelectArea();
                    $(this).data('maphilight', 
                    {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                   var algo = "C";
                   var contadorDisplay= 0 ;
                    if ( ($("#Escalon2").attr("alt")).indexOf(algo)!= -1 && ($("#Escalon2").css("color")) != "rgb(255, 0, 0)")// aca preguntamos si el escalon es una pregunta correcta. el seleccionado algo.indexOf("#Escalon".$i).attr("alt")== -1  
                    {
                        $("#Escalon2").css("color","red");
                        console.log( $("#Escalon2").css("color"));

                        for (var i = 1; i < 11 ; i++) 
                        {
                            var displays = ($("#E"+i).css('display'));
                            if(displays == "block")
                            {
                               contadorDisplay ++;  
                            }
                            if(contadorDisplay == 9)
                            {
                                $('#boton').show();
                            }

                        }
                        $('#E'+ (contadorDisplay + 1)).show();
                    }
                   //  $('#E1').show(); atributo de css style "visibility" none o algo asi
                });
                $("#Escalon5").click(function ()
                 {
                    removeAllSelectArea();
                    $(this).data('maphilight', 
                    {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                   var algo = "C";
                   var contadorDisplay= 0 ;
                    if ( ($("#Escalon5").attr("alt")).indexOf(algo)!= -1 && ($("#Escalon5").css("color")) != "rgb(255, 0, 0)")// aca preguntamos si el escalon es una pregunta correcta. el seleccionado algo.indexOf("#Escalon".$i).attr("alt")== -1  
                    {
                        $("#Escalon5").css("color","red");
                        for (var i = 1; i < 11 ; i++) 
                        {
                            var displays = ($("#E"+i).css('display'));
                            if(displays == "block")
                            {
                               contadorDisplay ++;  
                            }
                            if(contadorDisplay == 9)
                            {
                                $('#boton').show();
                            }
                        }
                        $('#E'+ (contadorDisplay + 1)).show();
                    }
                   //  $('#E1').show(); atributo de css style "visibility" none o algo asi
                });
                $("#Escalon7").click(function ()
                 {
                    removeAllSelectArea();
                    $(this).data('maphilight', 
                    {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                   var algo = "C";
                   var contadorDisplay= 0 ;
                    if ( ($("#Escalon7").attr("alt")).indexOf(algo)!= -1 && ($("#Escalon7").css("color")) != "rgb(255, 0, 0)")// aca preguntamos si el escalon es una pregunta correcta. el seleccionado algo.indexOf("#Escalon".$i).attr("alt")== -1  
                    {
                        $("#Escalon7").css("color","red");
                        for (var i = 1; i < 11 ; i++) 
                        {
                            var displays = ($("#E"+i).css('display'));
                            if(displays == "block")
                            {
                               contadorDisplay ++;  
                            }
                            if(contadorDisplay == 9)
                            {
                                $('#boton').show();
                            }
                        }
                        $('#E'+ (contadorDisplay + 1)).show();
                    }
                   //  $('#E1').show(); atributo de css style "visibility" none o algo asi
                });
                $("#Escalon11").click(function ()
                 {
                    removeAllSelectArea();
                    $(this).data('maphilight', 
                    {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                   var algo = "C";
                   var contadorDisplay= 0 ;
                    if ( ($("#Escalon11").attr("alt")).indexOf(algo)!= -1 && ($("#Escalon11").css("color")) != "rgb(255, 0, 0)")// aca preguntamos si el escalon es una pregunta correcta. el seleccionado algo.indexOf("#Escalon".$i).attr("alt")== -1  
                    {
                        $("#Escalon11").css("color","red");
                        for (var i = 1; i < 11 ; i++) 
                        {
                            var displays = ($("#E"+i).css('display'));
                            if(displays == "block")
                            {
                                contadorDisplay ++;  
                            }
                            if(contadorDisplay == 9)
                            {
                                $('#boton').show();
                            }
                        }
                        $('#E'+ (contadorDisplay + 1)).show();
                    }
                   //  $('#E1').show(); atributo de css style "visibility" none o algo asi
                });
                $("#Escalon15").click(function ()
                 {
                    removeAllSelectArea();
                    $(this).data('maphilight', 
                    {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                   var algo = "C";
                   var contadorDisplay= 0 ;
                    if ( ($("#Escalon15").attr("alt")).indexOf(algo)!= -1 && ($("#Escalon15").css("color")) != "rgb(255, 0, 0)")// aca preguntamos si el escalon es una pregunta correcta. el seleccionado algo.indexOf("#Escalon".$i).attr("alt")== -1  
                    {
                        $("#Escalon15").css("color","red");
                        for (var i = 1; i < 11 ; i++) 
                        {
                            var displays = ($("#E"+i).css('display'));
                            if(displays == "block")
                            {
                                contadorDisplay ++;  
                            }
                            if(contadorDisplay == 9)
                            {
                                $('#boton').show();
                            }

                        }
                        $('#E'+ (contadorDisplay + 1)).show();
                    }
                   //  $('#E1').show(); atributo de css style "visibility" none o algo asi
                });
                $("#Escalon16").click(function ()
                 {
                    removeAllSelectArea();
                    $(this).data('maphilight', 
                    {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                   var algo = "C";
                   var contadorDisplay= 0 ;
                    if ( ($("#Escalon16").attr("alt")).indexOf(algo)!= -1 && ($("#Escalon16").css("color")) != "rgb(255, 0, 0)")// aca preguntamos si el escalon es una pregunta correcta. el seleccionado algo.indexOf("#Escalon".$i).attr("alt")== -1  
                    {
                        $("#Escalon16").css("color","red");
                        for (var i = 1; i < 11 ; i++) 
                        {
                            var displays = ($("#E"+i).css('display'));
                            if(displays == "block")
                            {
                                contadorDisplay ++;  
                            }
                            if(contadorDisplay == 9)
                            {
                                $('#boton').show();
                            }
                        }
                        $('#E'+ (contadorDisplay + 1)).show();
                    }
                   //  $('#E1').show(); atributo de css style "visibility" none o algo asi
                });
                $("#Escalon20").click(function ()
                 {
                    removeAllSelectArea();
                    $(this).data('maphilight', 
                    {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                   var algo = "C";
                   var contadorDisplay= 0 ;
                    if ( ($("#Escalon20").attr("alt")).indexOf(algo)!= -1 && ($("#Escalon20").css("color")) != "rgb(255, 0, 0)")// aca preguntamos si el escalon es una pregunta correcta. el seleccionado algo.indexOf("#Escalon".$i).attr("alt")== -1  
                    {
                        $("#Escalon20").css("color","red");
                        for (var i = 1; i < 11 ; i++) 
                        {
                            var displays = ($("#E"+i).css('display'));
                            if(displays == "block")
                            {
                                contadorDisplay ++;  
                            }
                            if(contadorDisplay == 9)
                            {
                                $('#boton').show();
                            }
                        }
                        $('#E'+ (contadorDisplay + 1)).show();
                    }
                   //  $('#E1').show(); atributo de css style "visibility" none o algo asi
                });
                $("#Escalon24").click(function ()
                 {
                    removeAllSelectArea();
                    $(this).data('maphilight', 
                    {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                   var algo = "C";
                   var contadorDisplay= 0 ;
                    if ( ($("#Escalon24").attr("alt")).indexOf(algo)!= -1&& ($("#Escalon24").css("color")) != "rgb(255, 0, 0)")// aca preguntamos si el escalon es una pregunta correcta. el seleccionado algo.indexOf("#Escalon".$i).attr("alt")== -1  
                    {
                        $("#Escalon24").css("color","red");
                        for (var i = 1; i < 11 ; i++) 
                        {
                            var displays = ($("#E"+i).css('display'));
                            if(displays == "block")
                            {
                                contadorDisplay ++;  
                            }
                            if(contadorDisplay == 9)
                            {
                                $('#boton').show();
                            }
                        }
                        $('#E'+ (contadorDisplay + 1)).show();
                    }
                   //  $('#E1').show(); atributo de css style "visibility" none o algo asi
                });
                $("#Escalon25").click(function ()
                 {
                    removeAllSelectArea();
                    $(this).data('maphilight', 
                    {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                   var algo = "C";
                   var contadorDisplay= 0 ;
                    if ( ($("#Escalon25").attr("alt")).indexOf(algo)!= -1 && ($("#Escalon25").css("color")) != "rgb(255, 0, 0)")// aca preguntamos si el escalon es una pregunta correcta. el seleccionado algo.indexOf("#Escalon".$i).attr("alt")== -1  
                    {
                        $("#Escalon25").css("color","red");
                        for (var i = 1; i < 11 ; i++) 
                        {
                            var displays = ($("#E"+i).css('display'));
                            if(displays == "block")
                            {
                                contadorDisplay ++;  
                            }
                            if(contadorDisplay == 9)
                            {
                                $('#boton').show();
                            }
                        }
                        $('#E'+ (contadorDisplay + 1)).show();
                    }
                   //  $('#E1').show(); atributo de css style "visibility" none o algo asi
                });
                $("#Escalon29").click(function ()
                 {
                    removeAllSelectArea();
                    $(this).data('maphilight', 
                    {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                   var algo = "C";
                   var contadorDisplay= 0 ;
                    if ( ($("#Escalon29").attr("alt")).indexOf(algo)!= -1 && ($("#Escalon29").css("color")) != "rgb(255, 0, 0)")// aca preguntamos si el escalon es una pregunta correcta. el seleccionado algo.indexOf("#Escalon".$i).attr("alt")== -1  
                    {
                        $("#Escalon29").css("color","red");
                        for (var i = 1; i < 11 ; i++) 
                        {
                            var displays = ($("#E"+i).css('display'));
                            if(displays == "block")
                            {
                                contadorDisplay ++;  
                            }
                            if(contadorDisplay == 9)
                            {
                                $('#boton').show();
                            }
                        }
                        $('#E'+ (contadorDisplay + 1)).show();
                    }
                   //  $('#E1').show(); atributo de css style "visibility" none o algo asi
                });
                           
function removeAllSelectArea() 
{
// Resetear select de maphilight poner el contador ...... poner boton de reiniciar remove class  

$('#Escalon1').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon2').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon3').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon4').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon5').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon6').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon7').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon8').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon9').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon10').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon11').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon12').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon13').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon14').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon15').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon16').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon17').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon18').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon19').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon20').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon21').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon22').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon23').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon24').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon25').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon26').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon27').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon28').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon29').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#Escalon30').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');

$('#Escalon1').removeClass('selected');
$('#Escalon2').removeClass('selected');
$('#Escalon3').removeClass('selected');
$('#Escalon4').removeClass('selected');
$('#Escalon5').removeClass('selected');
$('#Escalon6').removeClass('selected');
$('#Escalon7').removeClass('selected');
$('#Escalon8').removeClass('selected');
$('#Escalon9').removeClass('selected');
$('#Escalon10').removeClass('selected');
$('#Escalon11').removeClass('selected');
$('#Escalon12').removeClass('selected');
$('#Escalon13').removeClass('selected');
$('#Escalon14').removeClass('selected');
$('#Escalon15').removeClass('selected');
$('#Escalon16').removeClass('selected');
$('#Escalon17').removeClass('selected');
$('#Escalon18').removeClass('selected');
$('#Escalon19').removeClass('selected');
$('#Escalon20').removeClass('selected');
$('#Escalon21').removeClass('selected');
$('#Escalon22').removeClass('selected');
$('#Escalon23').removeClass('selected');
$('#Escalon24').removeClass('selected');
$('#Escalon25').removeClass('selected');
$('#Escalon26').removeClass('selected');
$('#Escalon27').removeClass('selected');
$('#Escalon28').removeClass('selected');
$('#Escalon29').removeClass('selected');
$('#Escalon30').removeClass('selected');
}
              });


</script>
@endsection  