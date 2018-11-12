@extends('partials.layout')

@section('title')
El mimo
@endsection

@section('content')
<form action="{{route('/Elmimo2') }}" method="get" enctype="multipart/form-data">
<div class="col-lg-offset-2 col-md-8">

<div class="card">
<div class="card-head style-primary">
                    <header>Aprendiendo a emprender</header>
                </div>
 <div class="card-body floating-label">
  <div class="row">

        

                 <div class="row">
                                   <div class="col-sm-12">
                                        <div class="form-group">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;" >
                                            <label> 
                                            <p>En primer lugar, encontrarás cuatro situaciones cotidianas del día a día, por favor en el transcurso de estos
días intenta que estas situaciones se realicen en el tiempo que tengas con tu niño o niña. Como mínimo te
invitamos a realizar dos actividades, pero lo ideal es que realices las cuatro.
<br />
A continuación, encontraras la imagen de las cuatro situaciones, una instrucción de la situación para realizar
y un recuadro donde nos podrás contarnos tu experiencia al realizar la actividad.</p>
                                            </label>

                                             </div>
                                        </div>
                                    </div> 
                 </div>
</div>
                <br />
              
                <div class="row">


<div class="row">
        <div class="col-sm-12">
             <div class="form-group">
             <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:gray;" >
    
           
{{ csrf_field() }}
<table class="table table-striped">
  <tr>
  <th>Actividad</th>
  <th>Descripción</th>
  <th>Experiencia obtenida</th>
  </tr>
  <tr>
  <td> <img width="191" height="136" style="display:none;" id="imagen3" src="{{asset('img/mimo3.JPG')}}" /> </td>
  <td> <p><b>Saludar</b> Imitar los gestos de comportamientos
   al saludar. </p> </td>
   <td> 

    <textarea id="pri"></textarea>
  
  
   </td>
  </tr>

  <tr>
  <td> <img width="191" height="136" style="display:none;" id="imagen4" src="{{asset('img/mimo4.JPG')}}" /></td>
  <td> <p><b>Felicidad al éxito</b> Imita las expresiones de felicidad al lograrlo
                                    ¡Excelente! ¡Muy bien! ¡Lo lograste! </p> </td>
  <td>
  <textarea id="seg"></textarea>
  </td>
  </tr>

  <tr>
  <td> <img  width="191" height="136" style="display:none;" id="imagen5" src="{{asset('img/mimo5.JPG')}}" /></td>
  <td><p><b>Expresión frente al fracaso</b> Imitar regar unas pinturas, aunque fracases
                                            Reaccionar ante el error y buscar una solución </p></td>
  <td>
  <textarea id="ter"></textarea>
  </td>
  </tr>

  <tr>
  <td> <img width="191" height="136" style="display:none;" id="imagen6" src="{{asset('img/mimo6.JPG')}}" /></td>
  <td> <p><b>Actuar frente a los errores</b> Imita una emoción cuando se rompe algo valioso,
                                            busca repararlo (Cuando se rompe una porcelana o un
                                            libro muy preciado)</p></td>
  <td>
  <textarea id="cua"></textarea>
  </td>
  </tr>






  </table>


    <!--<input type="submit" value="Upload Image" name="submit"-->
                  </div>
             </div>
         </div> 

</div>
<br/>
</div>


              

<div class="card-actionbar">
                <div class="card-actionbar-row">
                <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                    </div>
            </div>
</div>


</div>

</form>
@endsection

@section('addjs')

<script>
$(document).ready(function(){
 

     $("#imagen3").fadeIn(1500);
     $("#imagen4").fadeIn(1500);
     $("#imagen5").fadeIn(1500);
     $("#imagen6").fadeIn(1500);

});


});
 
</script>

@endsection