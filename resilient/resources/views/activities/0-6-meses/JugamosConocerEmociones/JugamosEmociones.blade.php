@extends('partials.layout')

@section('title')
Actividad juguemos a conocer nuestras emociones
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="post" action="{{route('/JuguemosEmocione1')}}">
            {{ csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                   <header>  Instrucción - Actividad 1 </header>
                </div>

                <div class="card-body floating-label"> 
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                        <p style="text-align:justify; text-justify: inter-word;">
                            Deberás imprimir las caras que tenemos para ti, luego recortarlas y pegarlas por la parte de atrás un palo de paleta pequeño,
                             así las podrás sostener cuando se las vayas a mostrar a tu hijo. 
                        </p>
                        <p style="text-align:justify; text-justify: inter-word;">
                            El objetivo de la actividad es que ayudes a tu bebé a conocer sus emociones usando las caras que te imprimiste y
                             palabras que le permitan aprender a identificar cual es la emoción que está sintiendo en ese momento. Esto lo puedes 
                             hacer cuando tu hijo está experimentando una emoción de forma intensa. Además puedes decirle cosas como 
                             “¿Estás sintiendo alegría?” “¿Estas sintiendo enojo?” y le señalas la cara correspondiente a la emoción que él
                              niño está demostrando. 
                        </p> 
                          <p style="text-align:justify; text-justify: inter-word;">
                              Ahora debes llenar un registro. Donde dice situación colocarás que fue lo que hizo que tu bebé se enojara, 
                              estuviera alegre o triste. Luego en día escribirás la fecha en la que sucedió eso, ejemplo: lunes 15/04/2018.
                               En cara que le mostraste pondrás si fue una de tristeza, alegría o enojo, y en reacción del bebé cómo reaccionó él 
                               ante la cara que le mostraste. 
                          </p>
                      </div>  
                        
                      <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                        <b>Ejemplo:</b>

                          <table border ="black" id="example" class="display" >
                              <tr>
                              <th bgcolor="#008efd"> Dia </th>
                              <th bgcolor="#008efd">Situación</th>
                              <th bgcolor="#008efd"> Cara que le mostraste </th>
                              <th bgcolor="#008efd">Reacción del bebé</th>
                              </tr> 
                              <tr> 
                              <td> 
                                  lunes 15/04/2018.
                              </td>
                              <td> 
                                  Mi hijo me golpeo con la pelota 
                              </td>
                              <td> 
                                 tristeza
                                </td>
                                <td> 
                                  la cara de mi bebe fue de preocupación 
                                  </td>
                              </tr> 
                           </table>
                      </div>
                      <div class="accordion" id="accordionExample">
                          <div class="card">
                              <div class="card-header" id="heading1">
                                  <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                      <b> Nota Importante Actividad 1 </b>
                                      </button>
                                  </h5>
                              </div>
                              <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
                                  <div class="card-body" >
                                  <label> 
                                                                
                                         <div>
                                              <p style="text-align:left; text-justify: inter-word;">
                                              Porfavor descague los documentos que se describiran a continuación: 
                                              <br>
                                               1. Documento con las caritas para su posterior impresión. 
                                               <br>
                                               2. Documento registro , el cual debera diligenciar para subir a la plataforma en el botón que dice subir archivo.
                                               <br>
                                              Despues de haber realizado lo anterior de clic al botón siguiente. 
                                              </p>
                                         </div>
  
                                         <div>
                                            <p style="text-align:left; text-justify: inter-word; color: green">
                                                <a id="image1" href="/download/CARAS.pdf">
                                                    haga click aquí para descargar archivo con las caritas </a>
                                               </p>
                                              <p style="text-align:left; text-justify: inter-word; color: green">
                                                      <a id="image2" href="/download/actividad1.docx">
                                                          haga click aquí para descargar documento registro </a>
                                              </p>
                                          <div> 
                                  </label>
                                  
                              </div>
                              </div>
                          </div>
                      </div>
                      <!--Acordion 1 Finaliza -->
                      
                      <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                            <p style="text-align:left; text-justify: inter-word;">

                                    <label id="labelpan" class="btn btn-default btn-file" style="background-color:#0097A7;color:white;  border-radius: 25px;">
                                            Subir Archivo <input type="file" name="archivo" style="display: none;" id="btnhid">
                                    </label>
                                   <button id="buttonPass" style="color:black;background-color:gray;display:none;border-radius:15px;border: 2px solid gray;" disabled> Archivo ya seleccionado y listo para subir </button>
                          </div> 
                
             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" > <button style="display:none;" id="siguiente"type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
@section('addjs')

<script scr="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">

        $(document).ready(function(){
        $('#btnhid').change(function(){
        $("#labelpan").css("display","none");
        $("#buttonPass").fadeIn(1000);
        $("#siguiente").fadeIn(1000);
        });
       });


$(document).ready(function() {
				$('#example').DataTable();
			} );

$(document).ready(function(){

$('#btnhid').change(function(){
   $("#labelpan").css("display","none");
   $("#buttonPass").fadeIn(1000);
});

});
</script>
@endsection