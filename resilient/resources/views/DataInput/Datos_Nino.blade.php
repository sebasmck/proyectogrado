@extends('partials.layout')

@section('title')
Datos Niño
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form method="post" class="form" action="{{ route('datosninos.store') }}">
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
                            <div class="col-sm-4">
                                    <div class="form-group">
                                            <input type="number" class="form-control" id="Edad_Infante" name="Edad_Infante">
                                            <label for="edad">Edad</label>
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
                                                <option value="3">Sisben</option>
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
                                                   <option value="8">Ninguno</option>                                                    </option>                                        
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
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="Id_OtroViveInfante" id="Id_OtroViveInfante">
                                <label for="Id_OtroViveInfante"> <b>Otros</b></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select id="Id_VinculoPadre" name="Id_VinculoPadre" class="form-control">
                                           <option value="">&nbsp;</option>
                                           <option value="1">Casados</option>
                                           <option value="2">Union Libre</option>
                                           <option value="3">Separados</option>
                                           <option value="4">Divorciados</option>
                                           <option value="5">"Fallecido Madre"</option>
                                           <option value="6">"Fallecido Padre"</option>
                                           <option value="7">"Otros"</option>
                                </select>
                                <label for="select1">Vínculo de los padres </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" class="Otro_VinculoPadre" id="Otro_VinculoPadre">
                                <label for="Otro_VinculoPadre"><b>Otros</b></label>
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
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>¿Qué edad tenía la madre cuando quedó en embarazo? </label>
                                <span class="ui-spinner ui-widget ui-widget-content ui-corner-all"><input  type="text" class="form-control ui-spinner-input" id="Edad_MadreEmbarazo" name="Edad_MadreEmbarazo" value="19" aria-valuemin="16" aria-valuenow="19" autocomplete="off" role="spinbutton">  <a class="ui-spinner-button ui-spinner-up ui-corner-tr" tabindex="-1"></a><a class="ui-spinner-button ui-spinner-down ui-corner-br" tabindex="-1"></a></span>
                            </div>
                        </div>

                        <div class="col-sm-7">
                            <div class="form-group">
                                <select id="Madre_Medicamento" name="Madre_Medicamento" class="form-control">
                                           <option value="">&nbsp;</option>
                                           <option value="1">Si (De responder sí, ¿qué tipo?)</option>
                                           <option value="0">No</option>
                                </select>
                                <label for="Madre_Medicamento">Durante el embarazo ¿la madre recibió algún medicamento? </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">   

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>¿A qué edad gestacional nació el niño(a)?</label>
                                <span class="ui-spinner ui-widget ui-widget-content ui-corner-all"><input type="text"  class="form-control ui-spinner-input" id="Edad_Gestacional" name="Edad_Gestacional" value="19" aria-valuemin="16" aria-valuenow="19" autocomplete="off" role="spinbutton">  <a class="ui-spinner-button ui-spinner-up ui-corner-tr" tabindex="-1"></a><a class="ui-spinner-button ui-spinner-down ui-corner-br" tabindex="-1"></a></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <select id="Complicaciones_Parto" name="Complicaciones_Parto" class="form-control">
                                        <option value="">&nbsp;</option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                </select>
                                <label for="Complicaciones_Parto">¿Hubo complicaciones en el nacimiento del niño/a? </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="Otro_Complicaciones_Parto" id="Otro_Complicaciones_Parto">
                                    <label for="Otro_Complicaciones_Parto">Especificar <b>Otros</b></label>
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
                                                <option value="6">Ninguna</option>
                                                <option value="7">Otros</option>
                                        </select>
                                        <label for="Id_DificultadEmbarazo"> Dificultades durante el embarazo </label>
                                    </div>
                            </div>
                            <div class="col-sm-3">
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
                                                <option value="6">Hemorragias </option>
                                                <option value="7">Otro</option>
                                        </select>
                                        <label for="Dificultades_Parto">Dificultades en el parto</label>
                                    </div>
                            </div>

                            <div class="col-sm-3">
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
                                                <option value="6">Otro</option>
                                        </select>
                                        <label for="Id_DificultadPostParto">Dificultades después del parto</label>
                                    </div>
                            </div>
                            <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="Otro_DificultadoesPostParto" id="Otro_DificultadoesPostParto">
                                        <label for="Otro_DificultadoesPostParto">Especificar <b>Otros</b></label>
                                    </div>
                            </div>
                            
                    </div>

                    <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <button type="submit" class="btn btn-flat btn-primary ink-reaction">Continuar <b> > </b> </button>
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

    // 
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

@ensection