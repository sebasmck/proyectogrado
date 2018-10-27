@extends('partials.layout')

@section('title')
Pre Test Prueba 6 
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                  <header> PreTest - Respuestas de clasificación según estilo de crianza </header>
                </div>

                <div class="card-body floating-label">
                    
                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:black;" >
                     <p style="text-align:left; text-justify: inter-word;">
                     {{$result}}
                     </p>   
                </div>

                <img class="pull-right" src="{{asset('img/avatar.png')}}" alt="avatar">
                                 
                </div> {{-- card-body no padding --}}

            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/pretestprueba4')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
{{--  @section('addjs')
<script>
 
</script>
@endsection  --}}