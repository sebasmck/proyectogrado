@extends('partials.layout')

@section('title')
Descubriendo Las Emociones 
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/CulminacionHoraAmamantar')}}">
            <div class="card">

                <div class="card-head style-primary">
                   <header>  Descubriendo Las Emociones  - Parte Uno </header>
                </div>

              <div class="card-body floating-label">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <b>EMOCIONES BÁSICAS DE UN ADULTO</b>
                </div>  

                <div class="col-sm-13" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; text-align: center ">
                    <div class="row">
                        <img style="display:none;" WIDTH="150" HEIGTH="100"  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/alegria.png')}}"/>
                        <img style="display:none;" WIDTH="150" HEIGTH="100"  id="imagen2" src="{{asset('ActividadDescubriendoEmociones/enojo.png')}}"/>
                        <img  style="display:none;" WIDTH="150" HEIGTH="100" id="imagen3" src="{{asset('ActividadDescubriendoEmociones/tristeza.png')}}"/>
                        <img  style="display:none;" WIDTH="150" HEIGTH="100"  id="imagen4" src="{{asset('ActividadDescubriendoEmociones/miedo.png')}}"/>
                    </div>
                </div>

                     <div  id="bebe" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; display:none;">
                       <b>EMOCIONES BÁSICAS DE TU BEBÉ</b>
                     </div>  
     
                     <div class="col-sm-13" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; text-align: center ">
                         <div class="row">
                             <img style="display:none;" WIDTH="150" HEIGTH="100" id="imagen5" src="{{asset('ActividadDescubriendoEmociones/alegria1.png')}}"/>
                             <img style="display:none;" WIDTH="150" HEIGTH="100"  id="imagen6" src="{{asset('ActividadDescubriendoEmociones/enojo1.png')}}"/>
                             <img  style="display:none;" WIDTH="150" HEIGTH="100"  id="imagen7" src="{{asset('ActividadDescubriendoEmociones/tristeza1.png')}}"/>
                         </div>
                     </div>
                   
             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" > <button id="butt" style="display:none;" type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
@section('addjs')

<script type="text/javascript">
$(document).ready(function(){
  $("#imagen1").delay(1000).fadeIn(2000);
  $("#imagen2").delay(3000).fadeIn(2000);
  $("#imagen3").delay(6000).fadeIn(2000);
  $("#imagen4").delay(8000).fadeIn(2000);
  $("#bebe").delay(9000).fadeIn(2000);
  $("#imagen5").delay(10000).fadeIn(2000);
  $("#imagen6").delay(12000).fadeIn(2000);
  $("#imagen7").delay(14000).fadeIn(2000);
  $("#butt").delay(15000).fadeIn(2000);
});
</script>
@endsection