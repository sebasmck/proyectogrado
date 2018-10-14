@extends('partials.layout')

@section('title')
Digno de carino
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
 <form class="form" method="GET" action="{{route('/HastaFinal2') }}">
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

});

</script>



@endsection