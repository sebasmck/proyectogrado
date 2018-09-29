@extends('partials.layout')

@section('title')
Hasta el final
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
 <form class="form" method="GET" action="{{route('/HastaFinal2') }}">
{{csrf_field()}}
<div class="card">
<div class="card-head style-primary">
                    <header>Logros obtenidos</header>
                </div>
 <div class="card-body floating-label">
  <div class="row">

                           <!--     <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group"> 
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 40px;">
                                            <label> 
                                            Hasta el Final</label></div>
                                        </div>
                                    </div>
                                </div>-->

                 <div class="row">
                                   <div class="col-sm-7">
                                        <div class="form-group">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:gray;" >
                                            <label> 
                                            ¿Cuál fue la reacción de tu hijo al decirle estas frases?
                                           </label>

                                             </div>
                                        </div>
                                    </div> 

                                    <div class="col-sm-4">
                                    <textarea class="form-control" rows="4" cols="30"></textarea>
                                    </div>
                 </div>

                <br />
                <div class="row">
                                   <div class="col-sm-7">
                                        <div class="form-group">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:gray;" >
                                            <label> 
                                            ¿Cómo te sentiste al decirle estas palabras a tu hijo?
                                           </label>

                                             </div>
                                        </div>
                                    </div> 

                                    <div class="col-sm-4">
                                    <img id="reacciones" class="map_dummy" src="{{asset('img/Reacciones.JPG')}}" usemap="#reactions" />

                            <map name="reactions">
                            
                            <area id="happyFace"  alt="Feliz" coords="36,36,29" shape="circle" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="pokerFace"  alt="Normal" coords="105,36,29" shape="circle" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="sadBoy"  alt="Mal" coords="175,36,29" shape="circle" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            
                            <area id="chinese"  alt="Muy Mal" coords="36,108,29" shape="circle" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="iugh"  alt="Asco" coords="36,179,29" shape="circle" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            
                            <area id="good"  alt="Bien" coords="105,108,29" shape="circle" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="sleep"  alt="Sueño" coords="105,179,29" shape="circle" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                           
                            <area id="surprise"  alt="Sorprendido" coords="175,108,29" shape="circle" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            <area id="wtf"  alt="Muy Feliz" coords="175,179,29" shape="circle" data-maphilight='{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"ffffff","fillOpacity":0.5}' />
                            </map>
                                    </div>
                 </div>

<div class="row"><h4 id="reaccionContainer"></h4></div>

            <hr>     

        </div>
</div>

<div class="card-actionbar">
                <div class="card-actionbar-row">
                <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                    </div>
            </div>
</div>
 </form> 
</div>

@endsection

@section('addjs')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{asset('js/jquery.maphilight.js')}}"></script>
<script>

$(function () {
                $('.map_dummy').maphilight();
                
                $("#happyFace").click(function () {
                    removeAllSelectArea();
                    $(this).data('maphilight', {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                $("#reaccionContainer").text("Feliz");
                });

                $("#pokerFace").click(function () {
                    removeAllSelectArea();
                    $(this).data('maphilight', {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                    $("#reaccionContainer").text("Normal");
                });
                $("#sadBoy").click(function () {
                    removeAllSelectArea();
                    $(this).data('maphilight', {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                    $("#reaccionContainer").text("Triste");
                });
                $("#chinese").click(function () {
                    removeAllSelectArea();
                    $(this).data('maphilight', {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                    $("#reaccionContainer").text("Muy triste");
                });
                $("#iugh").click(function () {
                    removeAllSelectArea();
                    $(this).data('maphilight', {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                    $("#reaccionContainer").text("Asco");
                });
                $("#good").click(function () {
                    removeAllSelectArea();
                    $(this).data('maphilight', {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                    $("#reaccionContainer").text("Bien");
                });
                $("#sleep").click(function () {
                    removeAllSelectArea();
                    $(this).data('maphilight', {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                    $("#reaccionContainer").text("Sueño");
                });
                $("#surprise").click(function () {
                    removeAllSelectArea();
                    $(this).data('maphilight', {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                    $("#reaccionContainer").text("Sorpresa");
                });
                $("#wtf").click(function () {
                    removeAllSelectArea();
                    $(this).data('maphilight', {
                        alwaysOn: true
                    }).trigger('alwaysOn.maphilight');
                    $("#reaccionContainer").text("reaccion que ni idea");
                });

                
                function removeAllSelectArea() {

// Resetear select de maphilight
$('#happyFace').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');
$('#pokerFace').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');

$('#sadBoy').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');

$('#chinese').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');

$('#iugh').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');


$('#good').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');

$('#sleep').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');


$('#surprise').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');


$('#wtf').data('maphilight', {
    alwaysOn: false
}).trigger('alwaysOn.maphilight');



$('#happyFace').removeClass('selected');
$('#pokerFace').removeClass('selected');
$('#sadBoy').removeClass('selected');
$('#chinese').removeClass('selected');
$('#iugh').removeClass('selected');

$('#good').removeClass('selected');
$('#sleep').removeClass('selected');
$('#surprise').removeClass('selected');
$('#wtf').removeClass('selected');

}
              });


</script>



@endsection