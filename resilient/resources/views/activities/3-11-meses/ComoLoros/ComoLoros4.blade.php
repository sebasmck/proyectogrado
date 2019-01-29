@extends('partials.layout')

@section('title')
Como Loros 4
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
                         <b> Tarea</b></p>
                  </div> 

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        <b>Instrucción:</b> Tómate el tiempo para hablar y escuchar, realiza tus actividades diarias y asigna un tiempo para sentarte a dialogar con tu hijo, conservando la misma altura, míralo a los ojos y pregúntale por su estado físico y emocional, pregúntale por sus amigos y apréndete los nombres de ellos, pregúntale por sus programas favoritos y todo lo que se te ocurra día a día, del mismo modo puedes compartir tus propias experiencias.
                        Haz con tu hijo un diario, en el cual escriban este reporte día a día, inicia escribiendo la fecha y la hora para continuar dibujando junto a tu hijo o recortando y pegando actividades relacionadas con las que te comentó tu hijo que hizo en este día.
                         </p>
                   </div>

                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction"  href="{{route('/ComoLoros5')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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