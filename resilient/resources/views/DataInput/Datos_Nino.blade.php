@extends('partials.layout')

@section('title')
Datos Niño
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form id="form" method="post" class="form" action="{{ route('datosninos.store') }}">
            @csrf

            <div class="card">
                <div class="card-head style-primary">
                    <header>Ingresa los datos del niño/a</header>
                </div>
                <div class="card-body floating-label">
                    
                    <div class="row">
                            <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Nombre_Infante" name="Nombre_Infante">
                                            <label for="Nombre_Infante">Nombres completos del niño/a
:                                                </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Apellido_Infante" name="Apellido_Infante">
                                            <label for="Apellido_Infante">Apellidos completos del niño/a</label>
                                        </div>
                                    </div>
                                </div>
                    </div>

                    <div class="row">

                            <div class="col-sm-4">
                                    <div class="form-group">
                                         <select id="Id_Sexo" name="Id_Sexo" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="1">Hombre</option>
                                                <option value="2">Mujer</option>
                                         </select>
                                         <label for="Id_Sexo">Sexo</label>
                                    </div>
                            </div>

                            <div class="col-sm-4">
                                    <div class="form-group control-width-normal">
                                            <div class="input-group date" id="demo-date">
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control" id="FechaDeNacimiento_Infante" name="FechaDeNacimiento_Infante">
                                                    <label>Fecha de nacimiento</label>
                                                </div>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group">
                                         <select id="Id_SistemaDeSalud" name="Id_SistemaDeSalud" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="1">Régimen contributivo</option>
                                                <option value="2">Régimen subsidiado</option>
                                         </select>
                                         <label for="Id_SistemaDeSalud">Sistema de salud al que se encuentra inscrito el niño/a</label>
                                    </div>
                            </div>
                            <div class="col-sm-6">
                                    <div class="form-group">
                                            <select id="Id_NivelEducativo" name="Id_NivelEducativo" class="form-control">
                                                   <option value="">&nbsp;</option>
                                                   <option value="1">Sala cunas</option>
                                                   <option value="2">Párvulos</option>
                                                   <option value="3">Pre jardín</option>
                                                   <option value="4">Jardín</option>
                                                   <option value="5">Transición</option>
                                                   <option value="6">Primero de primaria</option>
                                                   <option value="7">Caminadores</option>   
                                                   <option value="8">Ninguno</option>
                                            </select>
                                            <label for="Id_NivelEducativo">Nivel educativo
                                                    (actual o en curso)</label>
                                       </div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-7">
                                <div class="form-group">
                                    <select id="Id_ViveInfante" name="Id_ViveInfante" class="form-control">
                                               <option value="">&nbsp;</option>
                                               <option value="1">Mamá</option>
                                               <option value="2">Papá</option>
                                               <option value="3">Hermano(s)</option>
                                               <option value="4">Otros</option>
                                            
                                    </select>
                                    <label for="Id_ViveInfante">Con quién vive el niño/a</label>
                                </div>
                            </div> 
                        <div class="col-sm-3" id="Otro_V" style="display: none">
                            <div class="form-group">
                                <input type="text" class="form-control" name="OtroViveInfante" id="OtroViveInfante">
                                <label for="OtroViveInfante"> <b>Otros</b></label>
                            </div>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::select('Id_RelacionInfante',
                            $relacion->prepend('none')->pluck('Nombre_RelacionInfante', 'Id_RelacionInfante'),NULL,
                            ['class' => 'form-control', 'id' => 'Id_RelacionInfante', 'required']) }}
                        <label for="Id_RelacionInfante">Parentesco/relación con el niño/a</label>
                    </div>
                </div>
                <div id="otrorelacion" style="display:none;" class="col-sm-6">
                    <div class="form-group">
                        <input type="text" name="OtroRelacionInfante"  class="form-control">
                        <label for="otrorelacion"> Especificar <b>Otro</b> </label>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Cuidadores:</label>
                            <br>
                            <div class="col-sm-12">
                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('Padre', '1') !!}<span>Padre</span>
                                </label>
                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('Madre', '1') !!}<span>Madre</span>
                                </label>
                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('Abuelo', '1') !!}<span>Abuelo(a)</span>
                                </label>
                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('Hermano', '1') !!}<span>Hermano(a)</span>
                                </label>
                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('Tio', '1') !!}<span>Tio(a)</span>
                                </label>
                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('Otro_Cuidador', '1', 0, ['id' => 'Id_Otro_Cuidador']) !!}<span>Otro</span>
                                </label>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div id="hidden-cuidador" class="col-sm-3" style="display: none">
                        <div class="form-group">
                            <input type="text" name="Otro_Cuidador" class="form-control" id="Otro_Cuidador">
                            <label for="Otro_Cuidador">Especificar <b>Otros</b></label>
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select id="Id_VinculoPadre" name="Id_VinculoPadre" class="form-control">
                                           <option value="">&nbsp;</option>
                                           <option value="1">Casados</option>
                                           <option value="2">Union libre</option>
                                           <option value="3">Separados</option>
                                           <option value="4">Divorciados</option>
                                           <option value="5">Fallecido Madre</option>
                                           <option value="6">Fallecido Padre</option>
                                </select>
                                <label for="select1">Vínculo de los padres </label>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <select id="Embarazo_Planeado" name="Embarazo_Planeado" class="form-control">
                                           <option value="">&nbsp;</option>
                                           <option value="1">Si</option>
                                           <option value="0">No</option>
                                </select>
                                <label for="Embarazo_Planeado">¿El embarazo fue planeado?</label>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>¿Qué edad tenía la madre cuando quedó en embarazo? </label>
                                <span class="ui-spinner ui-widget ui-widget-content ui-corner-all"><input  type="text" class="form-control ui-spinner-input number" id="Edad_MadreEmbarazo" name="Edad_MadreEmbarazo" value="19" aria-valuemin="16" aria-valuenow="19" autocomplete="off" role="spinbutton" maxlength="2">  <a class="ui-spinner-button ui-spinner-up ui-corner-tr" tabindex="-1"></a><a class="ui-spinner-button ui-spinner-down ui-corner-br" tabindex="-1"></a></span>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <select id="Madre_Medicamento" name="Madre_Medicamento" class="form-control">
                                           <option value="">&nbsp;</option>
                                           <option value="1">Si (De responder sí, ¿qué tipo?)</option>
                                           <option value="0">No</option>
                                </select>
                                <label for="Madre_Medicamento">Durante el embarazo ¿la madre recibió algún medicamento? </label>
                            </div>
                        </div>

                        <div class="col-sm-4" id="Otro_M" style="display: none">
                            <div class="form-group">
                                <input type="text" class="form-control" name="Otro_Madre_Medicamento" id="Otro_Madre_Medicamento">
                                <label for="Otro_Complicaciones_Parto">Especificar <b>¿Qué tipo?</b></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">   

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>¿a que edad gestacional en semanas nació el niño?</label>
                                <span class="ui-spinner ui-widget ui-widget-content ui-corner-all"><input type="text"  class="form-control ui-spinner-input" id="Edad_Gestacional" name="Edad_Gestacional" value="19" aria-valuemin="16" aria-valuenow="19" autocomplete="off" role="spinbutton">  <a class="ui-spinner-button ui-spinner-up ui-corner-tr" tabindex="-1"></a><a class="ui-spinner-button ui-spinner-down ui-corner-br" tabindex="-1"></a></span>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <select id="Complicaciones_Parto" name="Complicaciones_Parto" class="form-control">
                                        <option value="">&nbsp;</option>
                                        <option value="1">Si (De responder sí, ¿cuáles?)</option>
                                        <option value="0">No</option>
                                </select>
                                <label for="Complicaciones_Parto">¿Hubo complicaciones en el nacimiento del niño/a? </label>
                            </div>
                        </div>
                        <div class="col-sm-4" id="Otro_C" style="display: none">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="Otro_Complicaciones_Parto" id="Otro_Complicaciones_Parto">
                                    <label for="Otro_Complicaciones_Parto">Especificar <b>¿Cuáles?</b></label>
                                </div>
                            </div>
                    </div>

                    <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <select id="Id_DificultadEmbarazo" name="Id_DificultadEmbarazo" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="1">Enfermedad Médica gineco-obstetrica</option>
                                                <option value="2">Consumo de SPA</option>
                                                <option value="3">Condición Emocional</option>
                                                <option value="4">Eventos estresantes</option>
                                                <option value="5">Trastorno Psicológico</option>
                                                <option value="6">Ninguno</option>
                                                <option value="7">Otros</option>
                                        </select>
                                        <label for="Id_DificultadEmbarazo"> Dificultades durante el embarazo </label>
                                    </div>
                            </div>
                            <div class="col-sm-3" id="Otro_D" style="display: none">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="Otro_DificultadEmbarazo" id="Otro_DificultadEmbarazo">
                                        <label for="Otro_DificultadEmbarazo"><b>Otros</b></label>
                                    </div>
                            </div>
                    </div>

                    <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <select id="Id_TipoParto" name="Id_TipoParto" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="1">Cesárea</option>
                                                <option value="2">Natural</option>
                                        </select>
                                        <label for="Id_TipoParto">Tipo de parto</label>
                                    </div>
                            </div>
                    </div>

                    <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <select id="Dificultades_Parto" name="Dificultades_Parto" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="1">Parto antes de tiempo</option>
                                                <option value="2">hipoxia / anoxia</option>
                                                <option value="3">Parto largo con dificultades</option>
                                                <option value="4">Cordón enredado</option>
                                                <option value="5">Preeclampsia</option>
                                                <option value="6">Hemorragias</option>
                                                <option value="7">Ninguno</option>
                                                <option value="8">Otro</option>
                                        </select>
                                        <label for="Dificultades_Parto">Dificultades en el parto</label>
                                    </div>
                            </div>

                            <div class="col-sm-3" id="Otro_P" style="display: none">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="Otro_Dificultadoes_Parto" id="Otro_Dificultadoes_Parto">
                                        <label for="Otro_Dificultadoes_Parto">Especificar <b>Otros</b></label>
                                    </div>
                            </div>
                    </div>

                    <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <select id="Id_DificultadPostParto" name="Id_DificultadPostParto" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="1">Hemorragias</option>
                                                <option value="2">Incompatibilidad sanguínea fetal</option>
                                                <option value="3">Retraso del crecimiento intrauterino (RCI)</option>
                                                <option value="4">Bajo peso al nacer (BPN)</option>
                                                <option value="5">Prematurez</option>
                                                <option value="6">Ninguno</option>
                                                <option value="7">Otro</option>
                                        </select>
                                        <label for="Id_DificultadPostParto">Dificultades después del parto</label>
                                    </div>
                            </div>
                            <div class="col-sm-3" id="Otro_Pt" style="display: none">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="Otro_DificultadoesPostParto" id="Otro_DificultadoesPostParto">
                                        <label for="Otro_DificultadoesPostParto">Especificar <b>Otros</b></label>
                                    </div>
                            </div>
                            
                    </div>

                    <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <button id="continuar" type="submit" class="btn btn-flat btn-primary ink-reaction">Continuar<b></b> </button>
                            </div>
                        </div>

                   
      {{--  </form>  --}}
      
      {{-- alerts --}}
        <div class="alert alert-danger print-error-msg-gestioncalidadno" style="display:none">
          <ul></ul>
        </div>
      
        <div class="alert alert-success print-success-msg-gestioncalidadno" style="display:none">
          <ul></ul>
        </div>
      
      
      </div> {{-- card-body no padding --}}

                    

                </div><!--end .card-body -->
                
            </div><!--end .card -->
            
        </form>
    </div>

@endsection

@section('addjs')

<script>

    $("#Id_Otro_Cuidador").click(function(){
        var seleccionado =  $("#Id_Otro_Cuidador");
        console.log(seleccionado.prop('checked'));
        if(seleccionado.prop('checked')){
            $("#hidden-cuidador").show();
        }else{
            $("#hidden-cuidador").hide();
        }

    });

    preventDoubleSubmit();

    function changeValue(id,optionotro,hiddenid){
        var valor = $("#"+id).val();
        if(valor == optionotro){
            $("#"+hiddenid).show();
        }else{
            $("#"+hiddenid).hide();
        }
    }

    $("#Id_ViveInfante").change(function () {
        changeValue("Id_ViveInfante",4,"Otro_V");
    });

    $("#Madre_Medicamento").change(function () {
        changeValue("Madre_Medicamento",1,"Otro_M");
    });

    $("#Complicaciones_Parto").change(function () {
        changeValue("Complicaciones_Parto",1,"Otro_C");
    });

    $("#Id_DificultadEmbarazo").change(function () {
        changeValue("Id_DificultadEmbarazo",7,"Otro_D");
    });

    $("#Dificultades_Parto").change(function () {
        changeValue("Dificultades_Parto",8,"Otro_P");
    });

    $("#Id_DificultadPostParto").change(function(){
        changeValue('Id_DificultadPostParto',7,'Otro_Pt');
    });



    $('#Id_RelacionInfante').change(function(){
    if($(this).val() == '6'){
        // alert('whatever happened');
        // document.getElementById('otrorelacion').style.display == 'block';
        document.getElementById("otrorelacion").style.display = "block";
    }else{
        // alert('nothing happened');
        document.getElementById("otrorelacion").style.display = "none";
    }
});




</script>


<script>
$(document).ready(function(){
    $(".number").keypress(function(event){
     var key = event.KeyCode || event.charCode || event.which;
 
 if(event.charCode == 37 || event.charCode == 39){
    event.preventDefault();
    return;
}

        if((key >= 48 && key <= 57) || key ==8 || key ==45 || key == 37 || key == 39) {
        
        }else{
         event.preventDefault();
        }
     });
});
</script>
@endsection