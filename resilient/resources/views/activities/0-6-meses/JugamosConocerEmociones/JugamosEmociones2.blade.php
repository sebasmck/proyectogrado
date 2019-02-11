@extends('partials.layout')

@section('title')
Actividad juguemos a conocer nuestras emociones
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="post" action="{{route('/JuguemosEmociones3')}}">
            {{ csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                   <header>  Instrucción - Actividad 3 </header>
                </div>

                <div class="card-body floating-label"> 
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                        <p style="text-align:justify; text-justify: inter-word;">
                                En esta actividad vas a tomarle una foto a tu hijo(a) cuando está enojado, triste o alegre,
                                 y le vas a mostrar su rostro diciéndole “Tú está enojado aquí cierto?” “Quién está feliz aquí”,
                                  ayudando a que identifique que esa persona de la foto es él y la emociones que estaba teniendo.
                                   Después vas a subir una foto de tu hijo(a) con cada una de las emociones.
                        </p>
                </div> 
                
                <div class="row" align="center">
                        <label id="labelpan" class="btn btn-default btn-file" style="background-color:#0097A7;color:white;  border-radius: 25px;">
                                Seleccionar imagen de alegria <input required type="file" name="fileToUpload1" style="display: none;" id="btnhid">
                            </label>
                            <button id="buttonPass" style="color:black;background-color:green;display:none;border-radius:15px;border: 2px solid gray;" disabled>Imagen de alegria  ya seleccionada</button>

                            <label id="labelpan2" class="btn btn-default btn-file" style="background-color:#AFB42B; color:white;border-radius: 25px;">
                                    Seleccionar imagen de tristeza <input required type="file" name="fileToUpload2" style="display: none;" id="btnhid2">
                                </label>
                                <button id="buttonPass2" style="color:black;background-color:green;display:none;border-radius:15px;border: 2px solid gray;" disabled>Imagen de tristeza ya  seleccionada</button>
                                     
                                <label id="labelpan3" class="btn btn-default btn-file" style="background-color:#388E3C;color:white;  border-radius: 25px;">
                                Seleccionar imagen de enojo  <input required type="file" name="fileToUpload3" style="display: none;" id="btnhid3">
                            </label>
                            <button id="buttonPass3" style="color:black;background-color:green;display:none;border-radius:15px;border: 2px solid gray;" disabled>Imagen de enojo ya seleccionada </button>    

                </div>


             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" > <button style="display:none;"id="siguiente"type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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
    
    $('#btnhid2').change(function(){
       $("#labelpan2").css("display","none");
       $("#buttonPass2").fadeIn(1000);
    });
    
    $('#btnhid3').change(function(){
       $("#labelpan3").css("display","none");
       $("#buttonPass3").fadeIn(1000);
       $("#siguiente").fadeIn(1000);
    });
});
</script>
@endsection