@extends('partials.layout')

@section('title')
PRACTICA EL SENTIDO DEL HUMOR 
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" method="POST" action="{{route('/logrosObtenidosPracticaSentido')}}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                   <header> PRACTICA EL SENTIDO DEL HUMOR - Logros Obtenidos </header>
                </div>

                <div class="card-body floating-label">
                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;" > 
                       <p style="text-align:left; text-justify: inter-word;">
                       <b>En cada una de las actividades se utilizaron momentos cotidianos en la vida de tu niño o niña donde es posible fomentar el sentido del humor. Siendo una característica 
                       muy importante queremos que la sigas implementando después de esta semana, cuando se presente la oportunidad.  
                       Teniendo en cuenta lo anterior. </b></p> 
                 </div>

                 <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;" > 
                       <p style="text-align:left; text-justify: inter-word;">
                       ¿En qué otras actividades de la vida cotidiana crees que se podría fomentar el buen sentido del humor?</p> 
                 </div>
                 
                  <textarea name="textarea2" id="textarea2" class="form-control" rows="3" placeholder="" required style="border:solid 1px black;"></textarea><div class="form-control-line"></div>

                  <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;" >
                  <b>Nota:</b>
                  <label> <p style="text-align:justify; text-justify: inter-word;">Una vez estes listo da clic en el botón "Siguiente" para continuar con el desarrollo de la actividad. </p></label>
                  </div>
               
                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->
            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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