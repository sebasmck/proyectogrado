@extends('partials.layout')
@section('title')
Culminación 
@endsection
@section('content')
<div class="col-lg-offset-2 col-md-8">
        <form class="form">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                   <header> Formando Niños Resilientes </header>
                </div>
                <div class="card-body floating-label">
                <div class="title" >
                    <p style="text-align:center;"> 
                     <img src="{{asset('ActividadPruebaHumor/Felicitaciones.png')}}" alt="Logo" id="logo">
                    </p> 
                 </div>  
                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->
            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href=""> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Finalizar</button></a>
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