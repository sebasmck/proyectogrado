@extends('partials.layout')

@section('title')
Caritas Felices
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Caritas Felices - Así se sienten las emociones </header>
                </div>

              <div class="card-body floating-label">
                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        <b>Instrucción:</b>  Identifica en Sara y Pedro las emociones que sintieron al inicio, nudo y desenlace del cuento
                    </p>      
                 </div>

                 <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                        <table border ="black" id="example" class="display" >
                            <tr>
                            <th bgcolor="green"> Personaje  </th>
                            <th bgcolor="green"> Narrativa </th>
                            <th colspan='6' bgcolor="green">Emociones</th>
                            </tr> 
    
                        <tr>
                             <td rowspan="3">Sara</td>
                             <td>Inicio</td>
                                 <td><input type="radio" id="Epr1" name="p1" value="1" required> Felicidad  </td>
                                 <td><input type="radio" id="Epr1" name="p1" value="1" > Trizteza </td>
                                 <td><input type="radio" id="Fpr1" name="p1" value="2"> Miedo  </td>
                                 <td><input type="radio" id="Tpr1" name="p1" value="3"> Asco </td>
                                 <td><input type="radio" id="Tpr1" name="p1" value="3"> Sorpresa </td>
                                 <td><input type="radio" id="Tpr1" name="p1" value="3"> Ira </td>
                        </tr> 
                        <tr>
                                    <td>Nudo</td>
                                    <td><input type="radio" id="Epr1" name="p1" value="1" required> Felicidad  </td>
                                    <td><input type="radio" id="Epr1" name="p1" value="1" > Trizteza </td>
                                    <td><input type="radio" id="Fpr1" name="p1" value="2"> Miedo  </td>
                                    <td><input type="radio" id="Tpr1" name="p1" value="3"> Asco </td>
                                    <td><input type="radio" id="Tpr1" name="p1" value="3"> Sorpresa </td>
                                    <td><input type="radio" id="Tpr1" name="p1" value="3"> Ira </td>
                        </tr> 

                        <tr>
                                <td>Desenlace</td>
                                <td><input type="radio" id="Epr1" name="p1" value="1" required> Felicidad  </td>
                                <td><input type="radio" id="Epr1" name="p1" value="1" > Trizteza </td>
                                <td><input type="radio" id="Fpr1" name="p1" value="2"> Miedo  </td>
                                <td><input type="radio" id="Tpr1" name="p1" value="3"> Asco </td>
                                <td><input type="radio" id="Tpr1" name="p1" value="3"> Sorpresa </td>
                                <td><input type="radio" id="Tpr1" name="p1" value="3"> Ira </td>
                        </tr> 

                            <tr>
                            <td rowspan="3">Pedro</td>
                            <td>Inicio</td>
                                <td><input type="radio" id="Epr1" name="p1" value="1" required> Felicidad  </td>
                                <td><input type="radio" id="Epr1" name="p1" value="1" > Trizteza </td>
                                <td><input type="radio" id="Fpr1" name="p1" value="2"> Miedo  </td>
                                <td><input type="radio" id="Tpr1" name="p1" value="3"> Asco </td>
                                <td><input type="radio" id="Tpr1" name="p1" value="3"> Sorpresa </td>
                                <td><input type="radio" id="Tpr1" name="p1" value="3"> Ira </td>
                            </tr> 

                            <tr>
                                    <td>Nudo</td>
                                    <td><input type="radio" id="Epr1" name="p1" value="1" required> Felicidad  </td>
                                    <td><input type="radio" id="Epr1" name="p1" value="1" > Trizteza </td>
                                    <td><input type="radio" id="Fpr1" name="p1" value="2"> Miedo  </td>
                                    <td><input type="radio" id="Tpr1" name="p1" value="3"> Asco </td>
                                    <td><input type="radio" id="Tpr1" name="p1" value="3"> Sorpresa </td>
                                    <td><input type="radio" id="Tpr1" name="p1" value="3"> Ira </td>
                            </tr> 

                            <tr>
                                    <td>Desenlace</td>
                                    <td><input type="radio" id="Epr1" name="p1" value="1" required> Felicidad  </td>
                                    <td><input type="radio" id="Epr1" name="p1" value="1" > Trizteza </td>
                                    <td><input type="radio" id="Fpr1" name="p1" value="2"> Miedo  </td>
                                    <td><input type="radio" id="Tpr1" name="p1" value="3"> Asco </td>
                                    <td><input type="radio" id="Tpr1" name="p1" value="3"> Sorpresa </td>
                                    <td><input type="radio" id="Tpr1" name="p1" value="3"> Ira </td>
                            </tr> 
    
                         </table>
                       </div>


             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/CaritasFelices6')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
@section('addjs')

        <script scr="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script>

	   $(document).ready(function(){

			$('#example').DataTable();

        } );
		</script>
@endsection  