@extends('partials.layout')

@section('title')
Como Loros 2
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
                         <b> Prestando atención</b></p>
                  </div> 

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        <b>Instrucción:</b> Observa atentamente los siguientes recuadros y aprende las dos técnicas expuestas 
                        para mejorar el diálogo en la relación padre-hijo. </p>
                   </div>

                   <div align="center">
                    <img  src="{{asset('ActividadComoLoros/Tecnica1.png')}}" alt="tecnica1">
                   </div>

                   <div align="center">
                    <img src="{{asset('ActividadComoLoros/Tecnica2.png')}}" alt="tecnica2">
                   </div>
                   


                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/ComoLoros3')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
{{--  @section('addjs')
<script>
        var tl = new TimelineLite();
        avatar = $('.avatar');
        //  content = $('.content-card');
        // tl.to(title, 1.5, {y:10});
        // tl.from(card1, .3, {left:100, opacity:0});  
</script>
@endsection  --}}