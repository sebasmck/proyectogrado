@extends('partials.layout')

@section('title')
PRACTICA EL SENTIDO DEL HUMOR CD
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> PRACTICA EL SENTIDO DEL HUMOR - Casas de Dominó  </header>
                </div>

                <div class="card-body floating-label">
                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;" > 
                       <p style="text-align:left; text-justify: inter-word;">
                       <b>En esta etapa de la vida de tu niño o niña le gusta explorar figuras y formas estas actividades 
                       hacen que las manos ya que tendrán el papel principal en todas las actividades que realice.
                         En esta oportunidad utilizaremos el famoso juego Dominó. En esta ocasión construirán conjuntamente casas de Dominó. </b></p> 
                 </div>

                 <div class="title">
                    <p style="text-align:center;"> 
                     <img src="{{asset('ActividadPruebaHumor/Ejercicio6.png')}}"  alt="Logo" id="logo">
                    </p> 
                  </div>  

                  <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;" >
                  <b>Nota:</b>
                  <label> <p style="text-align:justify; text-justify: inter-word;">Una vez estes listo da clic en el botón "Siguiente" para continuar con el desarrollo de la actividad. </p></label>
                  </div>
               
                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->
            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/PracticaSentido5')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
@section('addjs')
<script>
        var tl = new TimelineLite();
        avatar = $('.avatar');
        var title = $('.title'),
        logo = $('#logo');
        tl.from(title, 2.5, {left:100, opacity:0});
        //  content = $('.content-card');
        // tl.to(title, 1.5, {y:10});
        // tl.from(card1, .3, {left:100, opacity:0});  
</script>
@endsection  