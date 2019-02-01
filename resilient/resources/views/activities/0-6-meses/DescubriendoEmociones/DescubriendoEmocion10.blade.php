@extends('partials.layout')

@section('title')
Descubriendo Las Emociones 
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/DescubriendoEmociones11')}}">
            <div class="card">

                <div class="card-head style-primary">
                   <header>  Descubriendo Las Emociones  - Parte Cuatro </header>
                </div>

              <div class="card-body floating-label">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:justify; text-justify: inter-word;">
                      Como ya sabes los adultos experimentan cuatro emociones básicas, pero los niños por el contrario experimenta tres, el enojo la alegría, y la tristeza. Además de esto, el desarrollo emocional se da diferente en cada etapa de la vida, por eso verás el siguiente video que te permitirá entender 
                      cómo es el desarrollo de las emociones de tu hijo desde el primer mes hasta los 2 años.
                  </p>
                </div>  

              <div align="center" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:center; text-justify: inter-word;">
                      <b>Video - Las emociones en nuestros hijos</b>
                  </p>
                  <iframe width="800" height="415" src="https://www.youtube.com/embed/gKAeocn9cMA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
     
                
             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" > <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
@section('addjs')

<script type="text/javascript">
$(document).ready(function(){

$('#btnhid').change(function(){
   $("#labelpan").css("display","none");
   $("#buttonPass").fadeIn(1000);
});

});
</script>
@endsection