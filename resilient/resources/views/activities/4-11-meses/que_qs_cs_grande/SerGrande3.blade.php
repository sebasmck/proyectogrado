@extends('partials.layout')

@section('title')
Qué Quieres Ser Cuando Seas Grande 
@endsection
<style>

        .activities{
            width: 600px;
            margin-top: 10px;
        }
    
    </style>
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Qué Quieres Ser Cuando Seas Grande </header>
                </div>

                <div class="card-body floating-label">
                 <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; ">
                        <p style="text-align:justify; text-justify: inter-word;">
                                Ahora propón algún juego que disfrute tu hijo, pregúntale ¿qué le gustaría ser cuando él sea grande? o 
                                ¿Qué rol quiere asumir en un juego de roles? Por ejemplo, él será el profesor y tú el estudiante, de ser
                                 posible conversa con él sobre sus preferencias en cuanto a colores, dibujos animados u otros temas, en 
                                 otro momento puedes también explícarle tu ocupación actual, así entenderá poco a poco como tomar decisiones.
                        </p>      
                 </div>
                

             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/QuieroSerGrandeLogros')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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