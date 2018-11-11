@extends('partials.layout')
@section('title')
Logros Obtenidos 
@endsection
@section('content')
<div class="col-lg-offset-2 col-md-8">
        <form class="form" method="POST" action="{{route('/guardar-logros',['id'=> 2])}}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                   <header> Logros Obtenidos - Aterrizando el concepto resiliencia </header>
                </div>

                <div class="card-body floating-label">
                       
                        <table border ="black" id="example" class="display" >
                           <tr>
                           <th> Pregunta</th>
                           <th colspan='2'>Respuesta</th>
                           </tr> 

                           <tr>
                           <td> He aprendido lo suficiente y me siento feliz</p></td>
                           <td> <input type="radio" name="si/No1" value="1" required> Si <br></td>
                           <td> <input type="radio" name="si/No1" value="0"> No <br> </td>
                           </tr> 

                           <tr>
                           <td>No he aprendido mucho y eso me frustra</th>
                           <td><input type="radio" name="si/No2" value="1" required> Si</td>
                           <td><input type="radio" name="si/No2" value="0"> No</td>
                           </tr> 

                           <tr>
                           <td>Lo que he aprendido lo he aplicado a la crianza de mi hijo/a <br></th>
                           <td><input type="radio" name="si/No3" value="1" required> Si</td>
                           <td><input type="radio" name="si/No3" value="0"> No</td>
                           </tr>

                           <tr>
                           <td>He aprendido, pero no lo he aplicado en la crianza de mi hijo/a <br></td>
                           <td><input type="radio" name="si/No4" value="1" required> Si</td>
                           <td><input type="radio" name="si/No4" value="0"> No</td>
                           </tr> 

                        </table>

                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->
            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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