@extends('partials.layout')

@section('title')
Piel a piel después del baño
@endsection

@section('content')

<!-- Si necesitan animaciones shake (como se mueven los emoticones) ahi les dejo los links de
la documentación -->
<!-- https://github.com/elrumordelaluz/csshake-->
<!-- http://elrumordelaluz.github.io/csshake/-->
<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-slow.css')}}" />

<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-hard.css')}}" />

<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-crazy.css')}}" />

<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-little.css')}}" />

<!-- Otra libreria. animaciones para la tabla y animar los
números de la tabla use esta libreria. Ahí dejo el los links de la documentación-->
<!-- https://daneden.github.io/animate.css/ -->
<!-- -https://github.com/daneden/animate.css -->
<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/animate.css')}}" />


<form action="{{route('/RespirarActuar2') }}" method="get" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="col-lg-offset-2 col-md-8">

<div class="card">
<div class="card-head style-primary">
                    <header>Piel a piel después del baño</header>
                </div>
 <div class="card-body floating-label">

    <!-- INICIO ROW-->              
    <div class="row">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;" >
 <div id="titleTxt">
A continuación, vas a seleccionar el orden en el que te gustaría masajear a tu bebé, te sugerimos que lo hagas de abajo hacia arriba.
</div>


<div id="diParent" align="center">
<br><br>
    <img id="img1" class="map_dummy" usemap="#image-map" src="{{asset('img/bb.png')}}">

                                            <map name="image-map">
                                                <area title="Piernas y pies" id="opt1" alt="option1" coords="455,225,593,363" shape="rect" data-maphilight='{"strokeColor":"FFFFFF","strokeWidth":3,"fillColor":"000000","fillOpacity":0.5}'/>
                                                <area title="Espalda" id="opt2" alt="option2" coords="356,266,50" shape="circle" data-maphilight='{"strokeColor":"FFFFFF","strokeWidth":3,"fillColor":"000000","fillOpacity":0.5}'/>
                                                <area title="Estómago, vientre y pecho" id="opt3" alt="option3" coords="295,360,60" shape="circle" data-maphilight='{"strokeColor":"FFFFFF","strokeWidth":3,"fillColor":"000000","fillOpacity":0.5}'/>
                                                <area title="Manos" id="opt4" alt="option4" coords="415,398,30" shape="circle" data-maphilight='{"strokeColor":"FFFFFF","strokeWidth":3,"fillColor":"000000","fillOpacity":0.5}'/>
                                                <area title="Brazos" id="opt5" alt="option5" coords="403,340,40" shape="circle" data-maphilight='{"strokeColor":"FFFFFF","strokeWidth":3,"fillColor":"000000","fillOpacity":0.5}'/>
                                            </map>
    </div>

<div id="generic" style="display:none;">
<div class="animated jackInTheBox" style="border-style: dashed; border-color:#11EAE7;border-radius:12px;">
<div style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;">
- Para realizar el masaje recuerda que es importante que hagas contacto visual con el bebé<br>
- Puedes calentar tus manos, frotando tus palmas con un poco de crema o aceite con el que realizaras el masaje.<br>
- Asegúrate de acostar a tu bebé en una posición cómoda<br>
- Puedes ir hablándole al bebé, describiéndole cada movimiento que haces, decirle cuánto lo quieres, cantarle una canción que lo relaje, o sencillamente hacer contacto visual.<br>
- Los movimientos que encontrarás a continuación los realizarás de manera repetida, una y otra vez mientras te relajas con tu bebé y descubres esa conexión.<br>
- Recuerda que puedes realizar el masaje en compañía de la persona que te apoye en la crianza, todos pueden participar, un día cada uno.<br>
</div>
</div>
</div>

<div id="div1" style="display:none;">
<br>
<div class="animated fadeInUp delay-2s" style="border-style: dashed; border-color:#55FF00;border-radius:12px;">
<div style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;">
1) Vas a tomar una pierna y realizarás una leve presión de arriba hacia abajo hasta llegar al pie y repetirás el mismo movimiento, alterando las manos.<br>
2) En la planta del pie realizarás suaves movimientos circulares con tu dedo gordo.<br>
3) Vas a tomar al bebé por debajo de las rodillas y realizarás movimientos hacia el pecho, levantando suavemente su cadera una y otra vez.<br>
</div>
</div>
</div>


<div id="div2" style="display:none;">
<br>
<div class="animated rollIn delay-1s" style="border-style: dashed; border-color:#0900FF;border-radius:12px;">
<div style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;">
1) Toma al bebé boca abajo<br>
2) Vas a recorrer toda la espalda desde la nuca hasta las nalgas usan la palma de tus manos, haciendo una leve presión<br>
</div>
</div>
</div>



<div id="div3" style="display:none;">
<br>
<div class="animated bounceInDown delay-1s" style="border-style: dashed; border-color:#FF00FF;border-radius:12px;">
<div style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;">
1) Vas a masajear desde la boca del estómago, alternando una y otra mano, hasta el vientre bajo, con movimientos suaves.<br>
2) Puedes poner tus dos pulgares en la boca del estómago del bebé y separarlos lentamente siguiendo el contorno de las costilla s, como dibujando una forma de corazón, volviendo al centro y después hacia los lados.<br>
3) Igualmente, en su pecho, vas a realizar movimientos circulares en el sentido de las agujas del reloj con las palmas de las manos abiertas, de nuevo vas a dibujar un corazón con ambas manos sobre el pecho del bebé.<br>
</div>
</div>
</div>



<div id="div4" style="display:none;">
<br>
<div class="animated flipInX delay-1s" style="border-style: dashed; border-color:#FF0000;border-radius:12px;">
<div style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;">
1) Vas a poner una mano del bebé en reposo, es decir la colocarás sobre el pecho del bebé y tomarás su otra mano.<br>
2) El masaje será recorriendo la palma de la mano en círculos, de arriba hacia abajo y viceversa.<br>
3) Luego pondrás mano masajeada en reposo y harás lo mismo con la otra.<br>
</div>
</div>
</div>



<div id="div5" style="display:none;">
<br>
<div class="animated zoomInDown delay-1s" style="border-style: dashed; border-color:#EFFF00;border-radius:12px;">
<div style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;">
1) Vas a tomar un brazo y masajearas desde los hombros hasta las muñecas, realizando suaves movimientos de forma giratoria y alternando las manos.<br>
</div>
</div>
</div>

    
                </div>

            </div> 

    </div>
    <br/>
    </div>
    <!-- FIN ROW-->

              

<div class="card-actionbar">
                <div class="card-actionbar-row" id="butt">
                <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark" id="next" disabled>¡He realizado todos los masajes al bebe!</button></a>
                    </div>
            </div>
</div>


</div>

</form>
@endsection

@section('addjs')
<script src="{{asset('js/jquery.maphilight.js')}}"></script>
<script>
$(document).ready(function(){
    $('.map_dummy').maphilight();
    var imgLabelDef;
    var preventButtonE = false;



    function removeMapHigh(){
        imgLabelDef = $("#img1");
        $("#img1").parent().get(0).remove();
        imgLabelDef.removeAttr("style");
        imgLabelDef.removeClass("maphilighted");
        imgLabelDef.css("display","none");
        $("#diParent").append(imgLabelDef);

        $("#next").text("Siguiente");
        $("#next").prop("disabled", false);
    }

    $("#opt1").click(function(){
        removeMapHigh();
        $("#generic").css("display", "block");
        $("#div1").css("display", "block");
        $("#opt1").addClass("ok");
        $("#titleTxt").text("Instrucción (Piernas y pies):");
        preventButtonE = true;
    });

        $("#opt2").click(function(){
        removeMapHigh();
        $("#generic").css("display", "block");
        $("#div2").css("display", "block");
        $("#opt2").addClass("ok");
        $("#titleTxt").text("Instrucción (Espalda):");
        preventButtonE = true;
    });

        $("#opt3").click(function(){
        removeMapHigh();
        $("#generic").css("display", "block");
        $("#div3").css("display", "block");
        $("#opt3").addClass("ok");
        $("#titleTxt").text("Instrucción (Estómago, vientre y pecho):");
        preventButtonE = true;
    });

        $("#opt4").click(function(){
        removeMapHigh();
        $("#generic").css("display", "block");
        $("#div4").css("display", "block");
        $("#opt4").addClass("ok");
        $("#titleTxt").text("Instrucción (Manos):");
        preventButtonE = true;
    });

    $("#opt5").click(function(){
        removeMapHigh();
        $("#generic").css("display", "block");
        $("#div5").css("display", "block");
        $("#opt5").addClass("ok");
        $("#titleTxt").text("Instrucción (Brazos):");
        preventButtonE = true;
    });

    $("#next").click(function(e){
     if(preventButtonE){
        e.preventDefault();
        imgLabelDef.css("display","block");
        $('.map_dummy').maphilight();
        $("#next").text("¡He realizado todos los masajes al bebe!");
        $("#titleTxt").text("A continuación, vas a seleccionar el orden en el que te gustaría masajear a tu bebé, te sugerimos que lo hagas de abajo hacia arriba.");
        $("#next").prop("disabled", true);

        $("#generic").css("display", "none");
        $("#div1").css("display", "none");
        $("#div2").css("display", "none");
        $("#div3").css("display", "none");
        $("#div4").css("display", "none");
        $("#div5").css("display", "none");

        if( $("#opt1").hasClass("ok") &&  $("#opt2").hasClass("ok") && $("#opt3").hasClass("ok") && $("#opt4").hasClass("ok") && $("#opt5").hasClass("ok") ){
            $("#next").prop("disabled", false);
            preventButtonE = false; 
        }
     }
    });


});
 
</script>

@endsection