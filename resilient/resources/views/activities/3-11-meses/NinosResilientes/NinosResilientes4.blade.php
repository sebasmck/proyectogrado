@extends('partials.layout')

@section('title')
Niños Resilientes 4
@endsection
<!-- terminar descagar archivo  --> 
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
                {{ csrf_field() }}
            <div class="card">

                <div class="card-head style-primary">
                   <header> Niños Resilientes - Tarea   </header>
                </div>

                <div class="card-body floating-label">

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:left; text-justify: inter-word;">
                         <b>Instrucción:</b> Haz una planilla como la que se presenta a continuación e 
                          identifica en casa las actividades que desarrolla tu hijo y tu percepción frente
                           a la crianza, teniendo en cuenta conductas pensamientos o actitudes. 
                           <b>Por ultimo por favor adjunta el arhivo como evidencia 
                               de la tarea que has realizado en casa. </b> </p>
                  </div> 

                  <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                        <table border ="black" id="example" class="display" >
                            <tr>
                            <th bgcolor="#008efd"> Actividad </th>
                            <th bgcolor="#008efd">Conducta / pensamiento / actitud </th>
                            </tr> 
                            <tr>
                            <td> <b>Ejemplo:</b> “Hoy, mi hijo hizo una plana de círculos en un cuaderno, se le dificulto y
                                 los hizo irregulares, sin embargo yo como cuidador le superviso y le animo a continuar hasta cuando aprenda”.
                            </td>

                            <td> 
                                <b>Ejemplo:</b>
                                <p> <b>Conducta:</b> Realiza la tarea con dificultad.</p>
                                   <p> <b>Pensamiento:</b> El niño dice que solo hace 5 más y termina</p>
                                    <p> <b>Actitudes:</b> Culmina pronto la tarea.</p>
                            </td>

                            </tr> 
                            <tr>
                            <td>Describe aquí otras actividades</th>
                            <td> Describe aquí lo que evidencias</td>
                            </tr> 
                            <tr>
                            <td>Describe aquí otras actividades<br></th>
                            <td>Describe aquí lo que evidencias</td>
                            </tr>
                         </table>
                    </div>

                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <br>
                         <!--Acordion 1 empieza -->
                  <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="heading1">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                    <b> Nota Importante Tarea</b>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
                                <div class="card-body" >
                                <label> 
                                                              
                                       <div>
                                            <p style="text-align:left; text-justify: inter-word;">
                                            Para mayor comodidad por favor descargue y diligencie el siguiente documento en word,  una vez lo haya diligenciado por favor subalo a la plataforma gracias y buena suerte  
                                            </p>
                                       </div>

                                       <div>
                                            <p style="text-align:left; text-justify: inter-word;">
                                                    <a id="image1" href="/download/tareaninosresilientes.docx">
                                                        haga click aquí para descargar el archivo </a>
                                            </p>
                                        <div> 
                                </label>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                    <!--Acordion 1 Finaliza -->
                    </div>


                    <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                            <p style="text-align:left; text-justify: inter-word;">

                                    <label id="labelpan" class="btn btn-default btn-file" style="background-color:#0097A7;color:white;  border-radius: 25px;">
                                            Seleccionar Archivo <input type="file" name="fileToUpload1" style="display: none;" id="btnhid">
                                    </label>
                                   <button id="buttonPass" style="color:black;background-color:gray;display:none;border-radius:15px;border: 2px solid gray;" disabled> Archivo ya seleccionada</button>
                          </div> 

                   


                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/NinosResilientes5')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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
        });
       });
  

			$(document).ready(function() {
				$('#example').DataTable();
			} );
        </script>
        
        <script>
            $(document).ready( function () {
                $('#example').DataTable();
            } );    
        </script>


@endsection  