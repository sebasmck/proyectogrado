@extends('partials.layout')

@section('title')
Descubriendo Las Emociones 
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/DescubriendoEmociones5')}}">
            <div class="card">

                <div class="card-head style-primary">
                   <header>  Descubriendo Las Emociones  - Parte Dos </header>
                </div>

              <div class="card-body floating-label">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:justify; text-justify: inter-word;">
                    AHORA QUE YA SABES CUALES SON LAS EMOCIONES BÁSICAS TANTO TUYAS COMO LAS DE TU BEBÉ, A CONTINUACIÓN TE ENSEÑAREMOS LA IMPORTANCIA DE CADA UNA DE ESTAS: 
                  </p>
                  <ul>
                    <li>
                        <label class="grow" > <b> Las emociones hacen parte de un proceso biológico, tanto las que se perciben 
                          como positivas y negativas. </b> </label>
                    </li>
                    <li>
                        <label class="grow" > <b> Nos ayudan a adecuarnos a diferentes situaciones y lugares </b> </label>
                    </li>
                </ul>
                Por ejemplo, mira las dos imágenes y responde lo siguiente 
                </div>  

                <div class="col-sm-13" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; text-align: center ">
                    <div class="row">
                        <img WIDTH="150" HEIGTH="100"  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/personas.png')}}"/>
                        <img  WIDTH="150" HEIGTH="100"  id="imagen2" src="{{asset('ActividadDescubriendoEmociones/m.png')}}"/>
                    </div>
                </div> 
                
                   
                <div class="col-sm-13" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; text-align: center ">
                        <label  for="" style="color:black" >
                            -	¿Qué pensarías si estas en el velorio de una amiga porque su padre murió y ves que entra un grupo de personas riendo y haciendo chistes? 
                        </label>
                        <br>
                           <textarea cols="30"rows="5" name="textarea1" id="textarea" class="form-control" rows="3" placeholder="" required></textarea>
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