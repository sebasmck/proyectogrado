@extends('partials.layout')

@section('title')
El mimo
@endsection

@section('content')
<form action="{{route('/GrandeYF3') }}" method="get" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="col-lg-offset-2 col-md-8">

<div class="card">
<div class="card-head style-primary">
                    <header>Conseguir cooperación</header>
                </div>
 <div class="card-body floating-label">

 <!-- INICIO ROW-->
  <div class="row">
                 <div class="row">
                                   <div class="col-sm-12">
                                        <div class="form-group">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;" >
                                            <label> 
                                            <p>Para lograr que tu niño o niña haga lo que deseas necesitas conseguir cooperación de su
parte. Esto lo aprenderá a través del uso de las siguientes técnicas:
<br/>
<mark>1. Describe lo que ves.</mark><br/>
<mark>2. Da información.</mark><br/>
<mark>3. Dilo con una palabra.</mark><br/>
<mark>4. Habla de tus sentimientos.</mark><br/>
<mark>5. Escribe una nota.</mark><br/>
A continuación, encontraras unas historietas que te contaran de que se trata cada
técnica.</p>
                                            </label>

                                             </div>
                                        </div>
                                    </div> 
                 </div>
</div>
<!-- FIN ROW -->
                <br />

<!-- INICIO ROW-->              
<div class="row">
    <div class="row">
        <div class="col-sm-12">
             <div class="form-group">
             <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:gray;text-align:center;" >
             <mark>1. Describe lo que ves.</mark><br/>
             <img style="display:none;" id="imagen1" src="{{asset('img/GrandeYF.JPG')}}" />
             <br />
             <mark>2. Da información.</mark><br/>
             <img style="display:none;" id="imagen2" src="{{asset('img/GrandeYF2.JPG')}}" />
             <br />
             <mark>3. Dilo con una palabra.</mark><br/>
             <img style="display:none;" id="imagen3" src="{{asset('img/GrandeYF3.JPG')}}" />
             <br />
             <mark>4. Habla de tus sentimientos.</mark><br/>
             <img style="display:none;" id="imagen4" src="{{asset('img/GrandeYF4.JPG')}}" />
             <br />
             <mark>5. Escribe una nota.</mark><br/>
             <img style="display:none;" id="imagen5" src="{{asset('img/GrandeYF5.JPG')}}" />

                  </div>
             </div>
         </div> 

</div>
<br/>
</div>
<!-- FIN ROW-->

<!-- INICIO ROW-->              
<div class="row" id="lastLoad" style="display:none;">
    <div class="row">
        <div class="col-sm-12">
             <div class="form-group">
             <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:gray;text-align:center;" >
             <p>Cada una de estas técnicas las debes poner en práctica cuando necesitas que tu niño o
niña desempeñe alguna labor que se asigne y te darás cuenta cómo funcionan. Es
necesario que la efectividad de la técnica está relacionada con la frecuencia de uso.</p>

                  </div>
             </div>
         </div> 

</div>
<br/>
</div>
<!-- FIN ROW-->

              

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

    $("#imagen1").fadeIn(2000);
 $(window).scroll(function(){
  $("#imagen2").fadeIn(2000);
  $("#imagen3").delay(4000).fadeIn(2000);
  $("#imagen4").delay(8000).fadeIn(2000);
  $("#imagen5").delay(10000).fadeIn(2000);
  $("#lastLoad").delay(12000).fadeIn(2000);
  $("#butt").delay(12000).fadeIn(1000);
 });

});
 
</script>

@endsection