@extends('partials.layout')

@section('title')
Descubriendo Las Emociones 
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/DescubriendoEmociones3')}}">
            <div class="card">

                <div class="card-head style-primary">
                   <header>  Descubriendo Las Emociones  - Parte Uno </header>
                </div>

              <div class="card-body floating-label">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <div style="text-align:center">
                     <img  style="display:none;" id="imagen1" src="{{asset('ActividadDescubriendoEmociones/texto1.png')}}"/>
                  </div>
                  
                  <div style="text-align:center">
                     <img style="display:none;margin-right:10%" id="imagen2" src="{{asset('ActividadDescubriendoEmociones/texto2.png')}}"/>
                     <img style="display:none;" id="imagen3" src="{{asset('ActividadDescubriendoEmociones/texto3.png')}}"/>
                  </div>

                  <div style="text-align:center">
                  <img style="display:none;" id="imagen4" src="{{asset('ActividadDescubriendoEmociones/texto4.png')}}"/>
                  </div>
                </div>  

                <div class="col-sm-13" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; text-align: center ">
                    
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
  $("#imagen2").delay(5000).fadeIn(2000);
  $("#imagen3").delay(9000).fadeIn(2000);
  $("#imagen4").delay(12000).fadeIn(2000);
  $("#butt").delay(13000).fadeIn(2000);
});
</script>
@endsection