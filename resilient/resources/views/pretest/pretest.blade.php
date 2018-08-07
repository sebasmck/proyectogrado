@extends('partials.layout')

@section('title')
Cuestionario 1
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                    <header>Bienvenido</header>
                </div>

                <div class="card-body floating-label">
                    <center>
                    <p style="text-align:justify; text-justify: inter-word;">
                        Bienvenidos, antes de iniciar queremos AGRADECERLES por hacer parte de este programa sobre pautas de crianza resiliente, el cual estará lleno de aprendizajes nuevos. 

                        Es importante para nosotros saber qué tanto conoces acerca de pautas de crianza resilientes. A continuación, vas a encontrar una serie de preguntas las cuales nos darán una idea más clara acerca de tu conocimiento sobre el tema.  Algunas preguntas serán de selección múltiple, esto quiere decir que tendrás varias opciones de respuesta, pero solo deberás elegir una y otras preguntas serán abiertas, es decir que nos podrás dar tu opinión más sincera. 

                    </p>
                    </center>

                <img class="pull-right" src="{{asset('img/avatar.png')}}" alt="avatar">
                                 
      
                </div> {{-- card-body no padding --}}

                    
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/pretest1')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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