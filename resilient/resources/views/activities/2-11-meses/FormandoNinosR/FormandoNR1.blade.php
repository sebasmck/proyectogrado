@extends('partials.layout')

@section('title')
Formando Niños Resilientes
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Formando Niños Resilientes  </header>
                </div>

                <div class="card-body floating-label">

                 <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:#008efd;" > 
                       <p style="text-align:center; text-justify: inter-word;"><b>Desarrollo Actividad</b></p>  
                      <!-- <img class="pull-right" src="{{asset('img/avatar.png')}}" alt="avatar">-->
                  </div>

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 16px;color:black;">
                    <p style="text-align:left; text-justify: inter-word;">
                         <b>Cuando presto atención es cuando entiendo yo</b></p>
                  </div> 

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                      Empieza con una mano en el abdomen haciendo movimientos circulares como las manecillas del reloj.
                      Al mismo tiempo se combina este movimiento dando toques en la cabeza con la otra mano. </p>
                  </div>
                
                   <!--<div style="margin-left:30%; margin-bottom:30px"> 
                     <img src="{{asset('img/avatar.png')}}" alt="avatar" >
                   </div>-->
                   
                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">    
                     <!--Acordion 1 empieza -->
                  <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="heading1">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                <b> Nota </b>
                                </button>
                            </h5>
                        </div>
                        <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
                            <div class="card-body" >
                            <label> 
                                <p style="text-align:justify; text-justify: inter-word; font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                                    El anterior ejercicio te permitirá estar más atento a lo que aprenderás con la siguiente actividad. </p></label>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Acordion 1 Finaliza -->
                    
              </div>

                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/FormandoNR2')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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