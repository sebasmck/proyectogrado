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
                    <p><b>¿Sabes tú si eres resiliente? Si - No (link de la prueba)</b></p>
                    <br>
                    <div class="row">
                            <div class="col-sm-4">
                                <img class="pull-right" src="{{asset('img/avatar.png')}}" alt="avatar">
                            </div>
                            <div style="margin-top:5%; margin-left:10%;" class="col-sm-6">
                                <a style="margin-right: 50px;" href="??"> Si <button type="button" class="btn ink-reaction btn-floating-action btn-lg btn-primary"><i class="fa fa-star"></i></button> </a>
                            <a href="{{route('/pretestprueba')}}"> No <button type="button" class="btn ink-reaction btn-floating-action btn-lg btn-primary"><i class="fa fa-question"></i></button>  </a>
                            </div>
                    </div>
                    
                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->
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