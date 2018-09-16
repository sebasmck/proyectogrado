@extends('partials.layout')

@section('title')
Datos Acudiente
@endsection

@section('content')
<div class="col-lg-offset-1 col-md-10">
    <div class="card">
        <div class="card-head style-primary">
            <header>Escala de parentalidad positiva - Datos iniciales</header>
        </div>
        <div class="card-body floating-label">


                <br />

                <h5>
                    <b>1. Datos de quien contesta:</b>
                </h5>
                <form method="POST" action="{{ route('/escalap2-datos-anexos') }}">
                    @csrf
                    <div class="container-fluid">
                    <div class="row">

                        <div class="form-group col-md-8">
                            <div class="form-row">
                                <label for="nombre" class="col-md-2 col-form-label">Nombre:</label>
                                
                                <div class="col-md-10">
                                    <input class="form-control" id="nombre" type="text" value="{{ $acudiente->Nombre_Acudiente.' '.$acudiente->Apellido_Acudiente }}" disabled>
                                </div>

                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <div class="form-row">
                                <label for="edad" class="col-md-2 col-form-label">Edad:</label>

                                <div class="col-md-8">
                                    <input class="form-control" {{ ($acudiente->edad)?'value='.$acudiente->edad.' disabled':'name:edad' }} maxlength="100" required id="edad" type="text" >
                                </div>

                                <div class="col-md-2">
                                    años
                                </div>
                        
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-md-3">
                            <div class="form-row">
                                <label class="col-md-2 col-form-label">Sexo:</label>

                                <div class="col-md-10">

                                    <div class="form-check form-check-inline col-md-5">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input"  {{ ($acudiente->Id_Sexo == 1)?'checked':'false' }} id="sexo-m" value="1" disabled>
                                            <span>(M)</span>
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-5">
                                        <label class="radio-inline radio-styled form-check-label">
                                                <input type="radio" class="form-check-input" {{ ($acudiente->Id_Sexo == 2)?'checked':'false' }}   id="sexo-f" value="2" disabled>
                                                <span>(F)</span>
                                        </label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div> 

                        <div class="form-group col-md-9">
                            <div class="form-row">
                                <label class="col-md-2 col-form-label">Escolaridad:</label>

                                <div class="col-md-10">

                                    <div class="form-check form-check-inline col-md-2">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input" {{ ($acudiente->Id_Escolaridad == 1)?'checked':'false' }} disabled id="escolaridad-a" value="1">
                                            <span>Sin escolaridad</span>
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-2">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input" {{ ($acudiente->Id_Escolaridad == 2)?'checked':'false' }} disabled  id="escolaridad-b" value="2">
                                            <span>Básica</span>
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-2">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input" {{ ($acudiente->Id_Escolaridad == 3)?'checked':'false' }} disabled  id="escolaridad-c" value="3">
                                            <span>Media</span>
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-2">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input" {{ ($acudiente->Id_Escolaridad == 4)?'checked':'false' }} disabled  id="escolaridad-d" value="4">
                                            <span>Técnica</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline col-md-2">
                                        <label class="radio-inline radio-styled form-check-label"> 
                                            <input type="radio" class="form-check-input" {{ ($acudiente->Id_Escolaridad == 5)?'checked':'false' }} disabled  id="escolaridad-e" value="5">
                                            <span>Universitaria</span>
                                        </label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="form-row">
                                <label for="ingreso" class="col-md-4 col-form-label">Ingreso familiar total (al mes):</label>

                                <div class="col-md-8">
                                    <input class="form-control" id="ingreso" name="ingreso-familiar" required type="number" >
                                </div>

                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-row">
                                <label for="ocupacion" class="col-md-4 col-form-label">Ocupación (en qué trabaja):</label>

                                <div class="col-md-8">
                                    <input class="form-control" id="ocupacion" {{ ($acudiente->ocupacion)?'value='.$acudiente->ocupacion->Nombre_Ocupacion:'' }} disabled type="text" >
                                </div>  
                        
                            </div>
                        </div>
                    </div>

                    <div class="row">
                                            <div class="form-group col-md-8">
                                                <div class="form-row">
                                                    <label class="col-md-2 col-form-label">Estado civil:</label>

                                                    <div class="col-md-10">

                                                        <div class="form-check form-check-inline col-md-2">
                                                            <label class="radio-inline radio-styled form-check-label">
                                                                <input type="radio" class="form-check-input" {{ ($acudiente->Id_EstadoCivil == 1)?'checked':'false' }} disabled id="estadocivil-a" value="1">
                                                                <span>Soltero/a</span>
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-check-inline col-md-2">
                                                            <label class="radio-inline radio-styled form-check-label">
                                                                <input type="radio" class="form-check-input" {{ ($acudiente->Id_EstadoCivil == 2)?'checked':'false' }} disabled id="estadocivil-b" value="2">
                                                                <span>Casado</span>
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-check-inline col-md-2">
                                                            <label class="radio-inline radio-styled form-check-label">
                                                                <input type="radio" class="form-check-input" {{ ($acudiente->Id_EstadoCivil == 3)?'checked':'false' }} disabled id="estadocivil-c" value="3">
                                                                <span>Divorciado</span>
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-check-inline col-md-2">
                                                            <label class="radio-inline radio-styled form-check-label">
                                                                <input type="radio" class="form-check-input" {{ ($acudiente->Id_EstadoCivil == 4)?'checked':'false' }} disabled id="estadocivil-d" value="4">
                                                                <span>Viudo/a</span>
                                                            </label>
                                                        </div>                                    
                                                    </div>
                                                </div>
                                            </div>

                                        <!-- <div class="form-group col-md-4">
                                            <div class="form-row">
                                                <label for="nacionalidad" class="col-md-4 col-form-label">Nacionalidad:</label>

                                                <div class="col-md-8">
                                                    <input class="form-control" id="nacionalidad" type="text" {{ 'value='.$acudiente->nacionalidad->Nombre_Nacionalidad }} disabled >
                                                </div>  
                                        
                                            </div>
                                        </div> -->
                    </div>
                    
                    <div class="row">

                        <div class="form-group col-md-4">
                            <div class="form-row">
                                <label for="habitantes" class="col-md-8 col-form-label">¿Cuántas personas viven en su casa? total:</label>

                                <div class="col-md-4">
                                    <input class="form-control" id="habitantes" name="habitantes" required maxlength="100" type="number" >
                                </div>

                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <div class="form-row">
                                <label for="habitantes18" class="col-md-8 col-form-label">Personas menores de 18 años:</label>

                                <div class="col-md-4">
                                    <input class="form-control" id="habitantes18" required maxlength="100" name="habitantes18" type="number" >
                                </div>

                            </div>
                        </div>


                        <div class="form-group col-md-4">
                            <div class="form-row">
                                <label for="hijos" class="col-md-6 col-form-label">¿Cuántos hijos tiene?:</label>

                                <div class="col-md-6">
                                    <input class="form-control" id="hijos" required maxlength="100" name="hijos" type="number" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <h5>
                        <b>
                            <i> Sobre el niño/a respecto al cual contestará el cuestionario, por favor señale: </i> 
                        </b>
                    </h5>

                    <input type="hidden" name="id-infante" value="1" />

                    <br />

                    <div class="row">

                        <div class="form-group col-md-12">
                            <div class="form-row">
                                <label class="col-md-2 col-form-label">¿Cuál es su relación con el niño/a?:</label>

                                <div class="col-md-10">

                                    <div class="form-check form-check-inline col-md-2">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input" {{ ($acudienteInfante->Id_Relacion_Acudiente_Infante == 1)?'checked':'false' }} disabled id="cuidador-a" value="1">
                                            <span>Padre</span>
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-2">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input"  {{ ($acudienteInfante->Id_Relacion_Acudiente_Infante == 2)?'checked':'false' }} disabled id="cuidador-b" value="2">
                                            <span>Madre</span>
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-2">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input"  {{ ($acudienteInfante->Id_Relacion_Acudiente_Infante == 3)?'checked':'false' }} disabled id="cuidador-c" value="3">
                                            <span>Abuelo/a</span>
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-2">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input"  {{ ($acudienteInfante->Id_Relacion_Acudiente_Infante == 4)?'checked':'false' }} disabled id="cuidador-d" value="4">
                                            <span>Otro familiar</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline col-md-2">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input"  {{ ($acudienteInfante->Id_Relacion_Acudiente_Infante == 5)?'checked':'false' }} disabled id="cuidador-e" value="5">
                                            <span>Cuidador no familiar</span>
                                        </label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                            <div class="form-group col-md-5">
                                <div class="form-row">
                                    <label for="nombrenino" class="col-md-4 col-form-label">Nombre del Niño/a:</label>

                                    <div class="col-md-7">
                                        <input class="form-control" id="nombrenino" value="{{ $infante->Nombre_Infante.' '.$infante->Apellido_Infante }}" disabled  type="text" >
                                    </div>

                                </div>
                            </div>

                            <div class="form-group col-md-7">
                                <div class="form-row">
                                    <label for="edadninoanos" class="col-md-3 col-form-label">Edad del Niño/a:</label>

                                    <div class="col-md-2">
                                        <input class="form-control" id="edadninoanos" value="{{ $infante_edad->y }}" disabled type="text" >
                                    </div>

                                    <div class="col-md-2">
                                        años
                                    </div>

                                    <div class="col-md-2">
                                        <input class="form-control" id="edadninomeses" value="{{ $infante_edad->m }}" disabled type="text" >
                                    </div>

                                    <div class="col-md-3">
                                        meses
                                    </div>
                                </div>
                            </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-5">
                            <div class="form-row">
                                <label class="col-md-4 col-form-label">Sexo del Niño/a:</label>

                                <div class="col-md-8">

                                    <div class="form-check form-check-inline col-md-5">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input" {{ ($infante->Id_Sexo == 1)?'checked':'false' }} disabled id="sexo-nino-m" value="1">
                                            <span>(M)</span>
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-5">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input" {{ ($infante->Id_Sexo == 2)?'checked':'false' }} disabled id="sexo-nino-f" value="2">
                                            <span>(F)</span>
                                        </label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-7">
                            <div class="form-row">
                                <label class="col-md-2 col-form-label">Escolaridad actual:</label>

                                <div class="col-md-10">

                                    @if( $infante_edad->days < 730 )
                                    <div class="form-check form-check-inline col-md-3">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input " {{ ($infante->Id_NivelEducativo == 1)?'checked':'false' }} disabled id="escolaridad-nino-a" value="1">
                                            <span>Sala cuna</span>
                                        </label>
                                    </div>
                                    @endif

                                    <div class="form-check form-check-inline col-md-3">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input" {{ ($infante->Id_NivelEducativo == 2)?'checked':'false' }} disabled id="escolaridad-nino-b" value="2">
                                            <span>Jardín infantil</span>
                                        </label>
                                    </div>

                                    @if( $infante_edad->days > 730 )                                
                                    <div class="form-check form-check-inline col-md-3">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input " {{ ($infante->Id_NivelEducativo == 3)?'checked':'false' }} disabled id="escolaridad-nino-a" value="1">
                                            <span>Pre kinder</span>
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-3">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input" {{ ($infante->Id_NivelEducativo == 4)?'checked':'false' }} disabled id="escolaridad-nino-b" value="2">
                                            <span>Kinder</span>
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-3">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input " {{ ($infante->Id_NivelEducativo == 5)?'checked':'false' }} disabled id="escolaridad-nino-a" value="1">
                                            <span>1° Básico</span>
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-3">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input" {{ ($infante->Id_NivelEducativo == 6)?'checked':'false' }} disabled id="escolaridad-nino-b" value="2">
                                            <span>2° Básico</span>
                                        </label>
                                    </div>
                                    @endif

                                    <div class="form-check form-check-inline col-md-3">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input" {{ ($infante->Id_NivelEducativo == 7)?'checked':'false' }} disabled id="escolaridad-nino-c" value="7">
                                            <span>No asiste</span>
                                        </label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                            <div class="form-group col-md-5">
                                <div class="form-row">
                                    <label class="col-md-7 col-form-label">El niño/a, ¿tiene alguna discapacidad diagnosticada?:</label>

                                    <div class="col-md-5">

                                        <div class="form-check form-check-inline col-md-6">
                                            <label class="radio-inline radio-styled form-check-label">
                                                <input type="radio" class="form-check-input" checked="true" name="discapacidad" id="discapacidad-n" value="1"
                                                    onclick="onShowFieldByCheckboxValue('#discapacidad-n','#campo-dependiente-discapacidad');">
                                                <span>(NO)</span>
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline col-md-6">
                                            <label class="radio-inline radio-styled form-check-label">
                                                <input type="radio" class="form-check-input" name="discapacidad" id="discapacidad-y" value="2"
                                                    onclick="onShowFieldByCheckboxValue('#discapacidad-n','#campo-dependiente-discapacidad');">
                                                <span>(SI)</span>
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-7" id="campo-dependiente-discapacidad" style="display: none">
                                    <div class="form-row">
                                        <label for="discapacidad" class="col-md-2 col-form-label">¿Cuál?:</label>

                                        <div class="col-md-10">
                                            <input class="form-control" id="discapacidad" name="discapacidad-descripcion" type="text" >
                                        </div>

                                    </div>
                            </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-5">
                            <div class="form-row">
                                <label class="col-md-7 col-form-label">El niño/a, ¿tiene algún problema emocional que le preocupe?:</label>

                                <div class="col-md-5">

                                    <div class="form-check form-check-inline col-md-6">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input" checked="true" name="emocional" id="emocional-n" value="1"
                                            onclick="onShowFieldByCheckboxValue('#emocional-n','#campo-dependiente-emocional')">

                                            <span>(NO)</span>
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-6">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input"  name="emocional" id="emocional-y" value="2"
                                            onclick="onShowFieldByCheckboxValue('#emocional-n','#campo-dependiente-emocional');">

                                            <span>(SI)</span>
                                        </label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-7" id="campo-dependiente-emocional" style="display: none" >
                                <div class="form-row">
                                    <label for="emocional" class="col-md-2 col-form-label">¿Cuál?:</label>

                                    <div class="col-md-10">
                                        <input class="form-control" id="emocional" name="emocional-descripcion" type="text" >
                                    </div>

                                </div>
                        </div>

                    </div>
        
                </div>
                    <div class="card-actionbar">
                        <div class="card-actionbar-row">
                            <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Desarrollar escala</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>

@endsection

@section('addjs')


@endsection

