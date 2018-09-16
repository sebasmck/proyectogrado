@extends('partials.layout')

@section('title')
Respuestas 
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                <header> Post Test - Respuesta Correcta  </header>
                </div>

                <div class="card-body floating-label">
                
                <div class="col-md-9">
                        <div class="card content-card">
                            <div class="card-body" style=" height: 400px;">
                                
                                <table id="example" class="display">
                                    <thead>
                                        <tr>
                                            <th>Numero Pregunta</th>
                                            <th>Encabezado Pregunta</th>
                                            <th>Respuesta Correcta</th>
                                        </tr>
                                        
                                    </thead>


                                    @foreach ($result as $res)
                                    <tbody>
                                        <tr>
                                            <td>{{ $loop->iteration }} </td>
                                            <td><p style="text-align:left; text-justify: inter-word;">{{$res->Enunciado}}</p></td>
                                            <td><p style="text-align:left; text-justify: inter-word;">{{$res->DescripcionRespuesta}}</p></td>
                                           
                                        </tr>
                                    </tbody>
                                    @endforeach

                                </table>
                                
                            </div>
                        </div>
                    </div>

                </div> {{-- card-body no padding --}}

            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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