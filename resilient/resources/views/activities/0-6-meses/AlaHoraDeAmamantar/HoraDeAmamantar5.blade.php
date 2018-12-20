@extends('partials.layout')

@section('title')
 A La Hora De Amamantar
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/CulminacionHoraAmamantar')}}">
            <div class="card">

                <div class="card-head style-primary">
                   <header>  A La Hora De Amamantar - NUESTROS LOGROS  </header>
                </div>

              <div class="card-body floating-label">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:center; text-justify: inter-word;">
                    <b>¡Cuéntanos tu experiencia!</b>
                  </p>
                </div>   
                <div class="col-sm-13" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; background-color: lightcyan">
                        <label for="" style="color:black" >
                                ¿Qué aspectos nuevos aprendiste? Nombra 2. 
                        </label>
                        <br>
                           <textarea name="textarea1" id="textarea" class="form-control" rows="3" placeholder="" required></textarea>
                        <div class="form-control-line">

                        </div>
                   </div>
                   <br>
                   <div class="col-sm-13" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; background-color: lightcyan">
                        <label for="" style="color:black" >
                                ¿Qué mitos lograste desmentir? Nombra 2.
                        </label>
                        <br>
                           <textarea name="textarea2" id="textarea2" class="form-control" rows="3" placeholder="" required></textarea>
                        <div class="form-control-line">
                        </div>
                   </div> 

                   <div class="card-body floating-label">
                        <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                          <p style="text-align:justify; text-justify: inter-word;">
                           Recuerda tener a la mano la información que consideres importante sobre tu centro de atención
                            en salud más cercano y/o tu médico de confianza.
                        </p>
                            <p style="text-align:justify; text-justify: inter-word;">
                            Puedes pedirle a un familiar o persona que te apoye que te tome una fotografía mientras alimentas a tu hijo. 

                          </p>
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
$(document).ready(function(){

$('#btnhid').change(function(){
   $("#labelpan").css("display","none");
   $("#buttonPass").fadeIn(1000);
});

});
</script>
@endsection