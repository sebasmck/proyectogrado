@extends('partials.layout')

@section('title')
Aprendiendo de pautas con Sofi
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
                    <header>Aprendiendo de pautas de crianza con Sofi</header>
                </div>
 <div class="card-body floating-label" align="center">

 <!-- INICIO ROW-->
  <div class="row">
                 <div class="row">
                                   <div class="col-sm-12">
                                        <div>
                                        <div id="diParent" class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;" >
                                             <img class="animated flipInX" id="img1" src="{{asset('img/1Sabias.jpg')}}">
                                             <img id="img2" style="display:none;" src="{{asset('img/2Sabias.jpg')}}">
                                             <img id="img3" style="display:none;" src="{{asset('img/3Sabias.jpg')}}">
                                             <img id="img4" usemap="#image-map" class="map_dummy" style="display:none;" src="{{asset('img/4Sabias.jpg')}}">
                                             
                                             <map name="image-map">
                                                <area id="opt1" alt="option1" coords="353,55,537,143" shape="rect" data-maphilight='{"strokeColor":"FFFFFF","strokeWidth":3,"fillColor":"000000","fillOpacity":0.5}'/>
                                                <area id="opt2" alt="option2" coords="353,170,537,258" shape="rect" data-maphilight='{"strokeColor":"0000FF","strokeWidth":3,"fillColor":"000000","fillOpacity":0.5}'/>
                                                <area id="opt3" alt="option3" coords="353,288,537,376" shape="rect" data-maphilight='{"strokeColor":"FFFF00","strokeWidth":3,"fillColor":"000000","fillOpacity":0.5}'/>
                                                <area id="opt4" alt="option4" coords="581,120,766,207" shape="rect" data-maphilight='{"strokeColor":"DE00FF","strokeWidth":3,"fillColor":"000000","fillOpacity":0.5}'/>
                                                <area id="opt5" alt="option5" coords="581,240,766,328" shape="rect" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"000000","fillOpacity":0.5}'/>
                                            </map>

                                            <img id="img5" style="display:none;" src="{{asset('img/5Sabias.jpg')}}">
                                            <img id="img6" style="display:none;" src="{{asset('img/6Sabias.jpg')}}">
                                            <img id="img7" style="display:none;" src="{{asset('img/7Sabias.jpg')}}">

                                            <img id="img8" style="display:none;" src="{{asset('img/8Sabias.jpg')}}">
                                            <img id="img9" style="display:none;" src="{{asset('img/9Sabias.jpg')}}">
                                            <img id="img10" style="display:none;" src="{{asset('img/10Sabias.jpg')}}">

                                            <img id="img11" style="display:none;" src="{{asset('img/11Sabias.jpg')}}">
                                            <img id="img12" style="display:none;" src="{{asset('img/12Sabias.jpg')}}">
                                            <img id="img13" style="display:none;" src="{{asset('img/13Sabias.jpg')}}">

                                            <img id="img14" style="display:none;" src="{{asset('img/14Sabias.jpg')}}">
                                            <img id="img15" style="display:none;" src="{{asset('img/15Sabias.jpg')}}">

                                            <img id="img16" style="display:none;" src="{{asset('img/16Sabias.jpg')}}">
                                            <img id="img17" style="display:none;" src="{{asset('img/17Sabias.jpg')}}">
                                             </div>
                                        </div>
                                    </div> 
                 </div>
</div>


<!-- FIN ROW -->
                <br />

<div class="card-actionbar">
                <div class="card-actionbar-row" id="butt">
                <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark" id="next" disabled>Siguiente</button></a>
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
var counter = 1;
var currImg = "#img";
var imgLabel;

    $("#next").prop("disabled" , false);
    $("#next").click(function(e){
        if( !($("#opt1").hasClass("selected")) ||  !($("#opt2").hasClass("selected")) || !($("#opt3").hasClass("selected")) || !($("#opt4").hasClass("selected")) || !($("#opt5").hasClass("selected")) || counter != 4 ){
            if(counter !=5 && counter != 8 && counter != 11 && counter != 14 && counter != 16 && counter != 18){
                if(counter == 1){
                    e.preventDefault();
                    $("#img1").addClass("flipOutX");
                    $("#img1").css("display","none");
                    $("#img2").fadeIn();
                    counter = counter + 2;
                }else if(counter != 4){
                    e.preventDefault();
                    $(currImg + (counter - 1)).css("display","none");
                    $(currImg + counter).fadeIn();
                    counter = counter + 1;
                }else if(counter == 4){
                    e.preventDefault(); 
                    $(currImg + (counter - 1)).css("display","none");
                    $(currImg + counter).css("display","block");
                    $('.map_dummy').maphilight();
                    counter = counter + 1;
                    $("#next").prop("disabled" , true);
                }
            }else{
                e.preventDefault();
                $(currImg + (counter -1)).css("display","none");
                imgLabel.css("display","block");
                counter = 5;
                $('.map_dummy').maphilight();
                $("#next").prop("disabled" , true);
                if( $("#opt1").hasClass("selected") &&  $("#opt2").hasClass("selected") && $("#opt3").hasClass("selected") && $("#opt4").hasClass("selected") && $("#opt5").hasClass("selected")){
                    $("#next").prop("disabled" , false);
                }
            }    
        }
    }); 

    $("#opt1").click(function(){
            counter = 5;
            $("#img4").siblings().remove();
             imgLabel = $("#img4");
            $("#img4").parent().get(0).remove();
            imgLabel.removeAttr("style");
            imgLabel.removeClass("maphilighted");
            imgLabel.css("display","none");
            $("#diParent").append(imgLabel);
            $(currImg + counter).fadeIn();
            $("#opt1").addClass("selected");
            $("#next").prop("disabled" , false);
            counter = counter + 1;
    });

        $("#opt2").click(function(){
            counter = 11;
            $("#img4").siblings().remove();
             imgLabel = $("#img4");
            $("#img4").parent().get(0).remove();
            imgLabel.removeAttr("style");
            imgLabel.removeClass("maphilighted");
            imgLabel.css("display","none");
            $("#diParent").append(imgLabel);
            $(currImg + counter).fadeIn();
            $("#opt2").addClass("selected");
            $("#next").prop("disabled" , false);
            counter = counter + 1;
    });

        $("#opt3").click(function(){
            counter = 14;
            $("#img4").siblings().remove();
             imgLabel = $("#img4");
            $("#img4").parent().get(0).remove();
            imgLabel.removeAttr("style");
            imgLabel.removeClass("maphilighted");
            imgLabel.css("display","none");
            $("#diParent").append(imgLabel);
            $(currImg + counter).fadeIn();
            $("#opt3").addClass("selected");
            $("#next").prop("disabled" , false);
            counter = counter + 1;
    });

            $("#opt4").click(function(){
            counter = 8;
            $("#img4").siblings().remove();
             imgLabel = $("#img4");
            $("#img4").parent().get(0).remove();
            imgLabel.removeAttr("style");
            imgLabel.removeClass("maphilighted");
            imgLabel.css("display","none");
            $("#diParent").append(imgLabel);
            $(currImg + counter).fadeIn();
            $("#opt4").addClass("selected");
            $("#next").prop("disabled" , false);
            counter = counter + 1;
    });

            $("#opt5").click(function(){
            counter = 16;
            $("#img4").siblings().remove();
             imgLabel = $("#img4");
            $("#img4").parent().get(0).remove();
            imgLabel.removeAttr("style");
            imgLabel.removeClass("maphilighted");
            imgLabel.css("display","none");
            $("#diParent").append(imgLabel);
            $(currImg + counter).fadeIn();
            $("#opt5").addClass("selected");
            $("#next").prop("disabled" , false);
            counter = counter + 1;
    });

});
 
</script>

@endsection