@extends('partials.layout')

@section('title')
Cuestionario 2
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                    <header>Pretest 2</header>
                </div>

                <div class="card-body floating-label">
                    <p><b> YA QUE DISTE UNA RESPUESTA, QUEREMOS CONTARTE 
                        QUE ES LA RESILIENCIA Y QUE ASÍ PUEDAS COMPARARLO 
                        CON LO QUE ESCRIBISTE. </b></p>
                    <br>
                    <div class="row">
                                    <br>
                                    <div class="col-md-8">
                                            <div class="card card-bordered style-primary">
                                                <div class="card-head">
                                                    <header>Resiliencia</header>
                                                </div><!--end .card-head -->
                                                <div class="card-body">
                                                    <p>Se ha definido como la capacidad que tienen las persosas para 
                                                        sobrepasar un evento adverso, o situación estresante. 
                                                    </p>
                                                </div><!--end .card-body -->
                                            </div><!--end .card -->
                                        </div>

                                    

                            <div class="col-sm-4">
                                <img class="pull-right" src="{{asset('img/avatar.png')}}" alt="avatar">
                            </div>
                    </div>
                    
                </div> {{-- card-body no padding --}}

                    
            </div><!--end .card-body -->

            <div class="card-actionbar">
                    <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/pretest3')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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