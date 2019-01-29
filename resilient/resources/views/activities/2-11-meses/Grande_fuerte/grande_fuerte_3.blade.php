@extends('partials.layout')

@section('title')
Grande y fuerte
@endsection

@section('content')
<form action="{{route('/GrandeYF4') }}" method="get" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="col-lg-offset-2 col-md-8">

<div class="card">
<div class="card-head style-primary">
                    <header>Tarea</header>
                </div>
 <div class="card-body floating-label">

 <!-- INICIO ROW-->
  <div class="row">
                 <div class="row">
                                   <div class="col-sm-12">
                                        <div class="form-group">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;" >
                                            <label> 
                                            
En esta actividad realizaras un álbum de tu niño o niña.<br /><br />

En la primera página se desarrollará la presentación: comienza pegando una foto de tu
niño o niña y respondan juntos las siguientes preguntas:<br/><br />

¿Cómo me llamo?, ¿Qué edad tengo?, ¿Qué es lo que más me gusta?, ¿Qué
cualidades tengo?, ¿Cuál es mi principal característica?<br/><br />

En la siguiente página realiza un gran círculo y dibuja o recorta y pega las actividades
que junto con el niño descubran que el mismo pueda y le guste realizar con relación al
contexto de la casa.<br/><br />

Piensa en las actividades de la casa que pueda hacer tu niño o niña según sus
capacidades: recoger juguetes, alimentar mascotas, poner la ropa sucia en el cesto,
vestirse solo, poner la mesa, tirar cosas a la basura y enséñale a hacerlas para que en
adelante te apoye realizándolas. Asígnalas de manera progresiva: un día una y al otro
día a la que ya desarrolla le sumas otra.<br/><br />

Finalmente puedes dar un elogio según aprendió en la actividad “día del elogio” los
logros que vayas evidenciando en el niño.
                                            
                                            </label>

                                             </div>
                                        </div>
                                    </div> 
                 </div>
</div>
<!-- FIN ROW -->
                <br />


              

<div class="card-actionbar">
                <div class="card-actionbar-row" id="butt" style="display:none;">
                <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark" id="next">Siguiente</button></a>
                    </div>
            </div>
</div>


</div>

</form>
@endsection

@section('addjs')

<script>
$(document).ready(function(){
 $(window).scroll(function(){
  $("#butt").delay(6000).fadeIn(1000);
 });

});
 
</script>

@endsection