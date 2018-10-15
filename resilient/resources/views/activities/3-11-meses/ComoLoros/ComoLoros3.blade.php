@extends('partials.layout')

@section('title')
Como Loros 3
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Como Loros  </header>
                </div>

                <div class="card-body floating-label">

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 16px;color:black;">
                    <p style="text-align:left; text-justify: inter-word;">
                         <b> Juguemos a identificar</b></p>
                  </div> 

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        <b>Instrucción:</b> Lee la descripción e identifica el sentimiento: </p>
                   </div>

                   <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <table border ="black" id="example" class="display" >
                        <tr>
                        <th bgcolor="green"> Tu hijo dice: </th>
                        <th colspan='3' bgcolor="green">En una palabra, describe lo que él puede estar sintiendo (3 opciones)</th>
                        </tr> 

                        <tr>
                        <td> ¡Ash me tiene molesto todo esto!</p></td>
                        <td><input type="radio" name="p1" value="1" required> Enojo</td>
                        <td><input type="radio" name="p1" value="2"> Frustuación</td>
                        <td><input type="radio" name="p1" value="3"> Tristeza </td>
                        </tr> 

                        <tr>
                        <td>¡No me gusta que me regañen!</th>
                        <td><input type="radio" name="p2" value="1" required> Enojo</td>
                        <td><input type="radio" name="p2" value="2"> Frustuación</td>
                        <td><input type="radio" name="p2" value="3"> Tristeza </td>
                        </tr> 

                        <tr>
                        <td>Este programa de televisión es muy aburridor. <br></th>
                            <td><input type="radio" name="p3" value="1" required> Enojo</td>
                            <td><input type="radio" name="p3" value="2"> Frustuación</td>
                            <td><input type="radio" name="p3" value="3"> Tristeza </td>
                        </tr>

                     </table>
                   </div>


                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/ComoLoros4')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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