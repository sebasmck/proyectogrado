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
                    <header>Ingresa tus datos</header>
                </div>
 <div class="card-body floating-label">
  <div class="row">
                            <div class="row">



                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input maxlength="2" type="text" class="form-control number" id="age" name="edad">
                                            <label for="age">Edad:                                                </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                          <select id="state" class="form-control">  
                                          <option value="">&nbsp;</option>
                                          <option value="1">Soltero/a</option>
                                          <option value="2">Casado/a</option>
                                          <option value="3">Divorciado/a</option>
                                          <option value="4">Viudo/a</option>
                                          <option value="5">Otro</option>
                                          </select>
                                          <label for="state">Estado civil:</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div id="casoOtro" class="form-group" style="display:none;">
                                            <input type="text" class="form-control" id="other">
                                            <label for="other">Otro:</label>
                                        </div>
                                    </div>
                                </div>

<div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control number" maxlength="2" id="numberChilren" name="children">
                                            <label for="numberChilren">Número de hijos:</label>
                                        </div>
                                    </div>

                                     <div class="col-sm-6">
                                        <div class="form-group">
                                            <select id="education" class="form-control">
                                            <option value="">&nbsp;</option>
                                            <option value="3">Primaria</option>
                                            <option value="1">Bachiller</option>
                                            <option value="2">Técnico</option>
                                            <option value="3">Profesional</option>
                                            </select>
                                            <label for="education">Nivel de educación:</label>
                                        </div>
                                    </div>
</div>

                    </div>
</div>

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