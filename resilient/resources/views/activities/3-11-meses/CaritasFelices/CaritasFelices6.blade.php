@extends('partials.layout')

@section('title')
Caritas Felices
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Caritas Felices - Tarea </header>
                </div>

              <div class="card-body floating-label">
                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        <b>Instrucción:</b>
                    </p>      
                 </div>

                 <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                       <ol>
                           <li>
                                En una hoja en blanco solicítale a tu hijo dibujar las emociones básicas (las vistas en la actividad 1) como el crea que son – retroalimente el ejercicio y enséñale con tus gestos como se ven las personas cuando están experimentando estas emociones.
                           </li>
                           <li>
                                dibuja la silueta de un niño y solicítale a u niño que coloree las diferentes emociones en las partes del cuerpo de la silueta donde las siente.
                           </li>
                           <li>
                                Solicita a tu hijo que identifique emociones en sus principales cuidadores a través de preguntas como: ¿Cómo crees que se siente papá? 
                           </li>
                           
                       </ol>
                       </div>


             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/CaritasFelices7')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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