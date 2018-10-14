@extends('partials.layout')

@section('title')
PRACTICA EL SENTIDO DEL HUMOR JC
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> PRACTICA EL SENTIDO DEL HUMOR - Juego de Caritas  </header>
                </div>

                <div class="card-body floating-label">
                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;" > 
                       <p style="text-align:left; text-justify: inter-word;">
                       <b>Una de las ventajas del sentido del humor es la aceptación de los cambios del
                        cuerpo especialmente en la adolescencia, aunque en esta edad no se dan este tipo de cambios, 
                        si es posible ir desarrollando este tipo de habilidades para cuando los necesiten. 
                        En esta ocasión utilizaremos las pinturas para cambiar la percepción de cómo nos vemos. </b></p> 
                 </div>

                 <div class="title">
                    <p style="text-align:center;"> 
                     <img src="{{asset('ActividadPruebaHumor/Ejercicio5.png')}}"  alt="Logo" id="logo" width="90%">
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
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/PracticaSentido4')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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