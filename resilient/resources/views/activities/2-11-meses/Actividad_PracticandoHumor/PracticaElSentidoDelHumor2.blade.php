@extends('partials.layout')

@section('title')
PRACTICA EL SENTIDO DEL HUMOR TC
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> PRACTICA EL SENTIDO DEL HUMOR - Terremoto De Cubos </header>
                </div>

                <div class="card-body floating-label">
                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;" > 
                       <p style="text-align:left; text-justify: inter-word;"><b>Para esta actividad necesitamos que, en uno de tus tiempos libres,
                        puede ser después de cenar en la noche, invites a tu niña o niño a jugar con los cubos, 
                        en esta etapa de la vida será una actividad muy atractiva. </b></p>  
                 </div>

                 <div class="title" >
                 <p style="text-align:left; text-justify: inter-word; font-size: 18px;color:black;">
                    Para realizar esta actividad se requiere que sigas muy atentamente los siguientes pasos: 
                    </p> 

                    <p style="text-align:center;"> 
                     <img src="{{asset('ActividadPruebaHumor/Ejercicio4c.png')}}" alt="Logo" id="logo" width="90%">
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
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/PracticaSentido3')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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