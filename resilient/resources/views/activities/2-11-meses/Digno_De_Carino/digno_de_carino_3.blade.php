@extends('partials.layout')

@section('title')
Digno de carino
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
 <form class="form" method="POST" action="{{route('/DignoCarino3') }}">
{{csrf_field()}}
<div class="card">
<div class="card-head style-primary">
                    <header>Logros obtenidos - Un poco de imaginación...</header>
                </div>
 <div class="card-body floating-label">
 

 <!--inicio -->
 <div class="row">

<div class="row">
                  <div class="col-sm-7">
                       <div class="form-group">
                       <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:gray;" >
                           <label> 
                           Queremos saber cómo quedaron tus Post-it con las situaciones que te recomendamos, es por esto que a
                           continuación encontraras un link donde podrás subir una foto de tus Post-it
                          </label>

                            </div>
                       </div>
                   </div> 

                   <div class="col-sm-5">
                   <div>
                   <label id="labelpan9" class="btn btn-default btn-file" style="background-color:#0aa89e;color:white; color:white; border-radius: 25px;">
                   Seleccionar Imagen <input required type="file" name="fileToUpload9" style="display: none;" id="btnhid9">
                   </div>
                   <div>
                  <button id="buttonPass9" style="color:black;display:none;background-color:gray;border-radius:15px;border: 2px solid gray;" disabled>Imagen ya seleccionada</button>
                 </div>
                   </div>
</div>
</div>
<!-- fin-->

 <!--inicio -->
  <div class="row">

                 <div class="row">
                                   <div class="col-sm-7">
                                        <div class="form-group">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:gray;" >
                                            <label> 
                                            ¿Que otro recurso como el post-it o papeles adhesivos podrías utilizar para expresar cariño a tus hijos?
                                           </label>

                                             </div>
                                        </div>
                                    </div> 

                                    <div class="col-sm-4">
                                    <textarea rows="4" cols="30" required="true"></textarea>
                                    </div>
                 </div>
</div>
<!-- fin-->


                <br />
              
                <div class="row">


<div class="row">
        <div class="col-sm-7">
             <div class="form-group">
             <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:gray;" >
                 <label> 
                 ¿pondrías en práctica estas y otras actividades para demostrarle cariño a tus hijos?   
                </label>

                  </div>
             </div>
         </div> 

         <div class="col-sm-4">
         <label class="radio-inline radio-styled">
                                            <input type="radio" id="s" name="check" value="2" required="true"><span>Si</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" id="n" name="check" value="2"><span>No</span>
                                        </label>
         </div>
</div>
<br/>
</div>



                <div class="row" id="visualice" style="display:none;">

<div class="row">
        <div class="col-sm-7">
             <div class="form-group">
             <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:gray;" >
                 <label> 
                 ¿Cuales?
                </label>

                  </div>
             </div>
         </div> 

         <div class="col-sm-4">
         <textarea id="textAreaCual" rows="4" cols="30"></textarea>
         </div>
</div>
</div>

              <br/>

<div class="card-actionbar">
                <div class="card-actionbar-row">
                <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                    </div>
            </div>
</div>
 </form> 
</div>

@endsection

@section('addjs')

<script>

$(document).ready(function(){
  
  $("#s").click(function(){
      $("#visualice").fadeIn();
      $("#textAreaCual").prop('required', true);
  });
  
  $("#n").click(function(){
      $("#visualice").fadeOut();
      $("#textAreaCual").prop('required', false);
  });

  $('#btnhid9').change(function(){
   $("#labelpan9").css("display","none");
   $("#buttonPass9").fadeIn(1000);
});

});

</script>



@endsection