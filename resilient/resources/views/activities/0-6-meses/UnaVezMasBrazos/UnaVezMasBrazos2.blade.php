@extends('partials.layout')

@section('title')
Qué Quieres Ser Cuando Seas Grande 
@endsection
<style>

        ul {
      list-style-type: none;
    }
    
    li {
      display: inline-block;
    }
    
    input[type="radio"][id^="cb"] {
      display: none;
    }
    
    label {
      border: 1px solid #fff;
      padding: 10px;
      display: block;
      position: relative;
      margin: 10px;
      cursor: pointer;
    }
    
    label::before {
      background-color: white;
      color: white;
      content: " ";
      display: block;
      border-radius: 50%;
      border: 1px solid grey;
      position: absolute;
      top: -5px;
      left: -5px;
      width: 25px;
      height: 25px;
      text-align: center;
      line-height: 28px;
      transition-duration: 0.4s;
      transform: scale(0);
    }
    
    label img {
      height: 200px;
      width: 200px;
      transition-duration: 0.2s;
      transform-origin: 50% 50%;
    }
    
    :checked + label {
      border-color: #ddd;
    }
    
    :checked + label::before {
      content: "✓";
      background-color: grey;
      transform: scale(1);
    }
    
    :checked + label img {
      transform: scale(0.9);
      box-shadow: 0 0 5px #333;
      z-index: -1;
    }
    
    .grow { transition: all .2s ease-in-out; }
    .grow:hover { transform: scale(0.9); }
    
    
    </style>
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Una Vez Más En Mis Brazos - Nuestros logros </header>
                </div>

              <div class="card-body floating-label">
                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                            Ahora que has terminado de conocer cada posición, escribe en tu diario cómo te sentiste
                             haciendo la actividad, y si puedes sube una foto o un video alzando a tu bebé en la posición de 
                             cuna, esto permitirá conocer que cumpliste la tarea y quedará como recordatorio de un logro más cumplido. 
                    </p>      
                 </div>

                 <div class="col-sm-13" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; background-color: lightcyan">
                        <label for="" style="color:magenta" >
                                Escribe que otras posiciones encontraste para alzar a tu bebé
                        </label>
                        <br>
                           <textarea name="textarea1" id="textarea" class="form-control" rows="3" placeholder="">  

                          </textarea>
                        <div class="form-control-line">

                        </div>
                   </div>

                   <div class="card-body floating-label" style="text-align:justify;">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="heading1">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                        <b> Opcional Subir Foto </b>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
                                    <div class="card-body" >
                                    <label> 
                                       <p style="text-align:justify; text-justify: inter-word; color:black;">
                                        
                                        Da clic al siguiente boton y selecciona la foto que deseas subir al sistema.

                                           <label id="labelpan" class="btn btn-default btn-file" style="background-color:#0097A7;color:white;  border-radius: 25px;">
                                                Seleccionar Imagen <input required type="file" name="fileToUpload1" style="display: none;" id="btnhid">
                                            </label>
                                            <button id="buttonPass" style="color:black;background-color:gray;display:none;border-radius:15px;border: 2px solid gray;" disabled>Imagen ya seleccionada</button> 
                                        
                                        </p>
                                     </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div><!--end .card-actionbar -->
                 <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                        <p style="text-align:justify; text-justify: inter-word;">
                                A continuación encontrarás uno botones, cada botón tiene el nombre de una de las posiciones que aprendiste para alzar a tu bebé. Selecciona con la que se sintieron más cómoda tu bebé y tú.                              
                        </p>      
                 </div>
                 <div class="row" align="center"  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;"> 

                      <input type="radio" id="cb1" name="optionsRadios1" value="1"/>
                      <label class="grow" for="cb1"> <b> Posición de cuna</b>  <img style="width:150px; height:150px;text-align:center;" id="imgFadeEx" src="{{asset('ActividadUnaVezBrazos/boton1.png')}}" style="margin-inline-start:10%"> 
                      </label>

                      <input type="radio" id="cb2" name="optionsRadios1" value="2"/>
                      <label class="grow" for="cb2"><b>Frente a frente</b> <img style="width:150px; height:150px;text-align:center;" id="imgFadeEx" src="{{asset('ActividadUnaVezBrazos/boton2.png')}}"  name="llave3" alt="avatar" style="margin-inline-start:10%"> 
                      </label>

                      <input type="radio" id="cb3" name="optionsRadios1" value="2"/>
                      <label class="grow" for="cb3"> <b> Boca abajo </b>  <img style="width:150px; height:150px;text-align:center;" id="imgFadeEx" src="{{asset('ActividadUnaVezBrazos/boton3.png')}}"style="margin-inline-start:10%"> 
                      </label>
                </div>  

                 <div class="row" align="center"  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">  
                      <input type="radio" id="cb4" name="optionsRadios1" value="2"/>
                      <label class="grow" for="cb4"> <b>Pelota de Fútbol</b>  <img style="width:150px; height:150px;text-align:center;" id="imgFadeEx" src="{{asset('ActividadUnaVezBrazos/boton4.png')}}" style="margin-inline-start:10%"> 
                      </label>

                      <input type="radio" id="cb5" name="optionsRadios1" value="2"/>
                      <label class="grow" for="cb5"> <b> Cerca de ti </b>  <img style="width:150px; height:150px;text-align:center;" id="imgFadeEx" src="{{asset('ActividadUnaVezBrazos/boton5.png')}}" style="margin-inline-start:10%"> 
                      </label>
                 </div> 
                
             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/CulminacionUnaVezBrazos')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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