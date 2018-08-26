@extends('partials.layout')

@section('title')
Escala
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
<form class="form" method="POST" action="{{route('/escalaWY-cuestionario') }}">
{{csrf_field()}}
<div class="card">
                <div class="card-head style-primary">
                    <header>Resultado escala de WALDING Y YOUNG </header>
                </div>
 <div class="card-body floating-label">
            <div class="row">

                                <div class="col-sm-8">
                                        <div class="form-group">

            <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:black;" >
                                            <label>  <p style="text-align:justify; text-justify: inter-word;">{{$result}}</p></label>
                                             </div>
                                             </div>
                                             </div>

                                             <div class="col-sm-4">
                                        <div class="form-group">
                                     <img width="200" height="200" class="pull-right" src="{{ $img }}" >   
                                    </div>
                         </div>            
             </div>
             
            
        
</div>


</div>
</form>
</div>

@endsection

@section('addjs')


<script>
$(document).ready(function(){
  
    $("#state").change(function(){
          if( $(this).val() == 5){
              $("#casoOtro").show();
          }else{
            $("#casoOtro").hide();
          }
    });

     $(".number").keypress(function(event){
         var key = event.KeyCode || event.charCode;
        if(key >= 48 && key <= 57 ){
        
        }else{
         event.preventDefault();
        }

     });


     



   });
</script>



@endsection