@extends('partials.layout')

@section('title')
Descubriendo Las Emociones 
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/DescubriendoEmociones2')}}">
            <div class="card">

                <div class="card-head style-primary">
                   <header>  Descubriendo Las Emociones  - Parte Uno </header>
                </div>

              <div class="card-body floating-label">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:justify; text-justify: inter-word;">
                    La primera actividad será que escribas cuáles emociones conoces tú. 
                  </p>
                </div>  

                <div class="col-sm-13" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; text-align: center ">
                        <label  for="" style="color:black" >
                               ESCRIBE LAS EMOCIONES QUE CONOCES
                        </label>
                        <br>
                           <textarea cols="30"rows="5" name="textarea1" id="textarea" class="form-control" rows="3" placeholder="" required style="background-image:url({{asset('ActividadDescubriendoEmociones/nube.png')}});
                           background-size: 200px 150px;"></textarea>
                        <div class="form-control-line">

                        </div>
                   </div>
                   <br>
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
$(document).ready(function(){

$('#btnhid').change(function(){
   $("#labelpan").css("display","none");
   $("#buttonPass").fadeIn(1000);
});

});
</script>
@endsection