@extends('partials.layout')

@section('title')
Datos Niño
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">
                <div class="card-head style-primary">
                    <header>Ingresa los datos del niño</header>
                </div>
                <div class="card-body floating-label">
                    
                    <div class="row">
                            <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Firstname2">
                                            <label for="Firstname2">Nombres completos del niño/a:
:                                                </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Lastname2">
                                            <label for="Lastname2">Apellidos completos del niño/a:</label>
                                        </div>
                                    </div>
                                </div>
                    </div>

                    <div class="row">

                            <div class="col-sm-4">
                                    <div class="form-group">
                                         <select id="select2" name="select2" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="30">Hombre</option>
                                                <option value="40">Mujer</option>
                                         </select>
                                         <label for="select1">Sexo</label>
                                    </div>
                            </div>

                            <div class="col-sm-4">
                                    <div class="form-group control-width-normal">
                                            <div class="input-group date" id="demo-date">
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control">
                                                    <label>Fecha de nacimiento</label>
                                                </div>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                            </div>
                            <div class="col-sm-4">
                                    <div class="form-group">
                                            <input type="text" class="form-control" id="Lastname2">
                                            <label for="Lastname2">Edad</label>
                                        </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group">
                                         <select id="select2" name="select2" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="">Régimen contributivo</option>
                                                <option value="">Régimen subsidiado</option>
                                                <option value="">Sisben</option>
                                         </select>
                                         <label for="select1">Sistema de salud al que se encuentra inscrito el niño/a</label>
                                    </div>
                            </div>
                            <div class="col-sm-6">
                                    <div class="form-group">
                                            <select id="select2" name="select2" class="form-control">
                                                   <option value="">&nbsp;</option>
                                                   <option value="30">Sala cunas</option>
                                                   <option value="40">Párvulos</option>
                                                   <option value="40">Pre jardín</option>
                                                   <option value="40">Jardín</option>
                                                   <option value="40">Transición</option>
                                                   <option value="40">Primero de primaria</option>
                                                   <option value="40">Caminadores</option>   
                                                   <option value="40">Ninguno</option>                                                    </option>                                        
                                            </select>
                                            <label for="select1">Nivel educativo
                                                    (actual o en curso)</label>
                                       </div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select id="select2" name="select2" class="form-control">
                                           <option value="">&nbsp;</option>
                                           <option value="30">Mamá</option>
                                           <option value="40">Papá</option>
                                           <option value="40">Hermano(s)</option>                                                    </option>                                        
                                </select>
                                <label for="select1">Con Quien vive el niño?</label>
                            </div>
                        </div> 
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <select id="select2" name="select2" class="form-control">
                                               <option value="">&nbsp;</option>
                                               <option value="30">Mamá</option>
                                               <option value="40">Papá</option>
                                               <option value="40">Hermano(s)</option>
                                               <option value="">Otros</option>
                                            
                                    </select>
                                    <label for="select1">Con Quien vive el niño?</label>
                                </div>
                            </div> 
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Firstname2">
                                <label for="Firstname2">Especificar <b>Otros</b></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select id="select2" name="select2" class="form-control">
                                           <option value="">&nbsp;</option>
                                           <option value="30">Casados</option>
                                           <option value="40">Union Libre</option>
                                           <option value="40">Separados</option>
                                           <option value="40">Divorciados</option>
                                           <option value="40">"Fallecido Madre"</option>
                                           <option value="40">"Fallecido Padre"</option>
                                           <option value="40">"Otros"</option>
                                </select>
                                <label for="select1">Vinculo de los padres</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Firstname2">
                                <label for="Firstname2">Especificar <b>Otros</b></label>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <select id="select2" name="select2" class="form-control">
                                           <option value="">&nbsp;</option>
                                           <option value="30">Si</option>
                                           <option value="40">No</option>
                                </select>
                                <label for="select1">El Embarazo fue Planeado?</label>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>¿Qué edad tenía la madre cuando quedó en embarazo? </label>
                                <span class="ui-spinner ui-widget ui-widget-content ui-corner-all"><input type="text" class="form-control ui-spinner-input" id="spinner" value="19" aria-valuemin="16" aria-valuenow="19" autocomplete="off" role="spinbutton">  <a class="ui-spinner-button ui-spinner-up ui-corner-tr" tabindex="-1"></a><a class="ui-spinner-button ui-spinner-down ui-corner-br" tabindex="-1"></a></span>
                            </div>
                        </div>

                        <div class="col-sm-7">
                            <div class="form-group">
                                <select id="select2" name="select2" class="form-control">
                                           <option value="">&nbsp;</option>
                                           <option value="30">Si</option>
                                           <option value="40">No</option>
                                </select>
                                <label for="select1">Durante el embarazo ¿la madre recibió algún medicamento? 
(De responder sí, ¿qué tipo?)"</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">   

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>¿A qué edad gestacional nació el niñ@?</label>
                                <span class="ui-spinner ui-widget ui-widget-content ui-corner-all"><input type="text" class="form-control ui-spinner-input" id="spinner" value="19" aria-valuemin="16" aria-valuenow="19" autocomplete="off" role="spinbutton">  <a class="ui-spinner-button ui-spinner-up ui-corner-tr" tabindex="-1"></a><a class="ui-spinner-button ui-spinner-down ui-corner-br" tabindex="-1"></a></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <select id="select2" name="select2" class="form-control">
                                        <option value="">&nbsp;</option>
                                        <option value="30">Si</option>
                                        <option value="40">No</option>
                                </select>
                                <label for="select1">¿Hubo complicaciones en el nacimiento del niño? </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="Firstname2">
                                    <label for="Firstname2">Especificar <b>Otros</b></label>
                                </div>
                            </div>
                    </div>

                    <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <select id="select2" name="select2" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="30">Enfermedad Médica gineco-obstetrica</option>
                                                <option value="40">Consumo de SPA</option>
                                                <option value="40">Condición Emocional</option>
                                                <option value="40">Eventos estresantes</option>
                                                <option value="40">Trastorno Psicológico</option>
                                                <option value="40">Ninguna</option>
                                                <option value="40">Otros</option>
                                        </select>
                                        <label for="select1">Dificultades durante el embarazo </label>
                                    </div>
                            </div>
                            <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="Firstname2">
                                        <label for="Firstname2">Especificar <b>Otros</b></label>
                                    </div>
                            </div>
                    </div>

                    <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <select id="select2" name="select2" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="30">Cesárea</option>
                                                <option value="40">Natural</option>
                                        </select>
                                        <label for="select1">Tipo de parto</label>
                                    </div>
                            </div>
                    </div>

                    <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <select id="select2" name="select2" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="30">Parto antes de tiempo</option>
                                                <option value="40">hipoxia / anoxia</option>
                                                <option value="40">Parto largo con dificultades</option>
                                                <option value="40">Cordón enredado</option>
                                                <option value="40">Preeclampsia</option>
                                                <option value="40">Hemorragias </option>
                                                <option value="40">Otro</option>
                                        </select>
                                        <label for="select1">Dificultades en el parto</label>
                                    </div>
                            </div>

                            <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="Firstname2">
                                        <label for="Firstname2">Especificar <b>Otros</b></label>
                                    </div>
                            </div>
                    </div>

                    <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <select id="select2" name="select2" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="30">Hemorragias</option>
                                                <option value="40">Incompatibilidad sanguínea fetal</option>
                                                <option value="40">RCI</option>
                                                <option value="40">BPN</option>
                                                <option value="40">Prematurez</option>
                                                <option value="40">Otro</option>
                                        </select>
                                        <label for="select1">Dificultades después del parto</label>
                                    </div>
                            </div>
                            <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="Firstname2">
                                        <label for="Firstname2">Especificar <b>Otros</b></label>
                                    </div>
                            </div>
                            
                    </div>

                            {{-- GESTION CALIDAD (ANSWER IS NO) --}}

        
                    
                    <div class="row">

                            <div class="card-body no-padding">
      
                                    {{--  <form name="comportamientos" id="comportamientos">  --}}
                    
                                      <ul class="list">
                                        <li class="tile">
                                          <a class="tile-content ink-reaction">
                                            {!! Form::select('respuestaantelamadre', [
                                             'si' => 'si',
                                             'no' => 'no',
                                             'n/a' => 'n/a',
                                             ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                    
                                            <div class="tile-text">
                                              <small>
                                               <b>1.</b> Mostró respuesta ante la madre
                                             </small>
                                           </div>
                    
                                         </a>
                                       </li>
                                       <li class="divider-full-bleed"></li>

                                       <li class="tile">
                                            <a class="tile-content ink-reaction">
                                              {!! Form::select('respuestaantelamadre', [
                                               'si' => 'si',
                                               'no' => 'no',
                                               'n/a' => 'n/a',
                                               ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                      
                                              <div class="tile-text">
                                                <small>
                                                 <b>2.</b> Rodó sobre sí mismo
                                               </small>
                                             </div>
                      
                                           </a>
                                         </li>
                                         <li class="divider-full-bleed"></li>

                                         <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>3.</b> Se sentó solo
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>4.</b> Gateó
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>5.</b> Caminó solo
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>6.</b> Se vistió solo
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>7.</b> Fue solo al baño
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>8.</b> Dejó de orinarse en la cama por las noches
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>9.</b> Balbuceó
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>10.</b> Dijo su primera palabra
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>11.</b> Dijo varias palabras juntas
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>12.</b> El niño lacto
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>13.</b> El niño utilizo biberón
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>14.</b> El niño uso chupo
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>15.</b> Se alimentó solo
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>
                                      </ul>
                    
                                      


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
                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create account</button>
                    </div>
                </div>
            </div><!--end .card -->
            
        </form>
    </div>

@endsection