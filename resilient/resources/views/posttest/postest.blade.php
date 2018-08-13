@extends('partials.layout')

@section('title')
PostTest 
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
        <header> CUESTIONARIO DE CONOCIMIENTO EN RESILIENCIA (POST TEST) </header>
                </div>

                <div class="card-body floating-label">
                    <center>
                     <p style="text-align:center; text-justify: inter-word;"><b>¿QUÉ APRENDISTE DE RESILIENCIA?</b></p>   
                    <p style="text-align:center; text-justify: inter-word;">
                    Muchas gracias por participar y haber sido parte de este programa. A continuación, repasamos lo visto a lo largo de este programa.
                    </p>
                    </center>

                <img class="pull-right" src="{{asset('img/avatarPost.png')}}" alt="avatar">
                                 
      
                </div> {{-- card-body no padding --}}

                    
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/posttest1')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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