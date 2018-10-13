@extends('partials.layout')

@section('title')
Formando Niños Resilientes 6
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Formando Niños Resilientes - Información </header>
                </div>

                <div class="card-body floating-label">

                 <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;" > 
                       <p style="text-align:center; text-justify: inter-word;"><b>  ¡Felicitaciones!  </b></p>  
                      <!-- <img class="pull-right" src="{{asset('img/avatar.png')}}" alt="avatar">-->
                  </div>

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 16px;color:black;">
                    <p style="text-align:left; text-justify: inter-word;">
                            Realizas algunas actividades junto a tu hijo. Ten en cuenta que a mayores espacios de interacción entre tu hijo y tú,
                            podrás fortalecer el vínculo afectivo. Si no compartes muchos de los espacios, por favor esfuérzate un poco más
                             por compartir escenarios con tu él, ustedes lo necesitan. </p>
                  </div> 

                  

                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/FormandoNR7')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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