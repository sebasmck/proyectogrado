@extends('partials.layout')

@section('title')
Datos Acudiente
@endsection

@section('content')


<div class="col-lg-offset-2 col-md-8">
    <form action="{{route('cuidador.store')}}" method="POST" class="form">

      @csrf 
            

        <div class="card">
            <div class="card-head style-primary">
                <header>Ingresar datos acudiente</header>
            </div>
            <div class="card-body floating-label">
                
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="Nombre_Acudiente" id="Nombre_Acudiente">
                            <label for="Nombre_Acudiente">Nombres Completos del Acudiente:</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="Apellido_Acudiente" id="Apellido_Acudiente">
                            <label for="Apellido_Acudiente">Apellidos Completos del Acudiente:</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="Correo_Acudiente" id="Correo_Acudiente">
                            <label for="Correo_Acudiente">Dirección de correo electrónico:</label>
                        </div>
                    </div>
                    {{-- PENDING 1 // Id_TipoDocumento --}}
                    <div class="col-sm-1">
                        <div class="form-group">
                                {{ Form::select('Id_TipoDocumento', $tipodoc->prepend('none')->pluck('Nombre_TipoDocumento', 'Id_TipoDocumento'),NULL, ['class' => 'form-control', 'id' => 'Id_TipoDocumento']) }}
                                <label for="Id_TipoDocumento">Tipo</label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <input type="text" class="form-control" name="NumeroDocumento_Acudiente" id="NumeroDocumento_Acudiente">
                            <label for="NumeroDocumento_Acudiente">Número de identificación</label>
                        </div>
                    </div>
                </div>
                {{-- PENDING 2 Id_RelacionInfante NEED EXTRA FIELD FOR OTRO --}}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::select('Id_RelacionInfante', $relacion->prepend('none')->pluck('Nombre_RelacionInfante', 'Id_RelacionInfante'),NULL, ['class' => 'form-control', 'id' => 'Id_RelacionInfante']) }}
                                <label for="Id_RelacionInfante">Parentesco/relación con el niño/a</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" name="OtroRelacionInfante" class="form-control" id="otrorelacion">
                            <label for="otrorelacion">Especificar en caso de seleccionar <b>Otro </b> </label>
                        </div>
                    </div>
                </div>
                {{-- /////////////////////////////////////////////////////// --}}
                
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
                            </div><!--end .col -->
                        </div><!--end .form-group -->
                    </div>
                    <br>
                    <div class="col-sm-3">
                        <div class="form-group">
                                <input type="text" name="Otro_Cuidador" class="form-control" id="Otro_Cuidador">
                                <label for="Otro_Cuidador"><b>Otro </b></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                        <div class="col-sm-2">
                          <div class="form-group">
                                {{ Form::select('Id_Sexo', $sexo->prepend('none')->pluck('Nombre_Sexo', 'Id_Sexo'),NULL, ['class' => 'form-control', 'id' => 'Id_Sexo']) }}
                                <label for="Id_Sexo">Sexo</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                                <div class="form-group control-width-normal">
                                        <div class="input-group date" id="demo-date">
                                            <div class="input-group-content">
                                                <input type="text" name="FechaDeNacimiento" class="form-control">
                                                <label>Fecha de nacimiento</label>
                                            </div>
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                  {{ Form::select('Id_EstadoCivil', $estadocivil->prepend('none')->pluck('Nombre_EstadoCivil', 'Id_EstadoCivil'),NULL, ['class' => 'form-control', 'id' => 'Id_EstadoCivil']) }}
                                  <label for="Id_EstadoCivil">Estado Civil</label>
                                </div>
                        </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                            <div class="form-group">
                                  {{ Form::select('Id_Escolaridad', $escolaridad->prepend('none')->pluck('Nombre_Escolaridad', 'Id_Escolaridad'),NULL, ['class' => 'form-control', 'id' => 'Id_Escolaridad']) }}
                                  <label for="Id_Escolaridad">Escolaridad</label>
                            </div>
                    </div>
                    <div class="col-sm-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="Otro_Escolaridad" id="Lastname2">
                                    <label for="Otro_Escolaridad"><b>Otro </b> </label>
                            </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-sm-6">
                                <div class="form-group">
                                  {{ Form::select('Id_Ocupacion', $ocupacion->prepend('none')->pluck('Nombre_Ocupacion', 'Id_Ocupacion'),NULL, ['class' => 'form-control', 'id' => 'Id_Ocupacion']) }}
                                  <label for="Id_Ocupacion">Ocupación</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                        <input type="text" name="Otro_Ocupacion" class="form-control" id="Otro_Ocupacion">
                                        <label for="Otro_Ocupacion"><b>Otro </b> </label>
                                </div>
                        </div>  
                </div>
                <div class="row">
                        <div class="col-sm-6">
                                <div class="form-group">
                                        <select id="Id_Departamento" name="Id_Departamento" class="form-control">
                                               <option value="">&nbsp;</option>
                                               <option value="30">Amazonas</option>
                                               <option value="40">Antioquia</option>
                                               <option value="40">Arauca</option>
                                               <option value="40">Atlantico</option>
                                               <option value="40">Bogota D.c</option>
                                               <option value="40">Bolivar</option>
                                               <option value="40">Boyacá</option>
                                               <option value="40">Caldas</option>
                                               <option value="40">Caquetá</option>
                                               <option value="40">Casanare</option>
                                               <option value="40">Cauca</option>
                                               <option value="40">Cesar</option>
                                               <option value="40">Choco</option>
                                               <option value="40">Cordoba</option>
                                               <option value="40">Cundinamarca</option>
                                               <option value="40">Guainia</option>
                                               <option value="40">Huila</option>
                                               <option value="40">La Guajira</option>
                                               <option value="40">Magdalena</option>
                                               <option value="40">Meta</option>
                                               <option value="40">Nariño</option>
                                               <option value="40">Vaupes</option>
                                               <option value="40">Putumayo</option>
                                               <option value="40">Quindio</option>
                                               <option value="40">Risaralda</option>
                                               <option value="40">Vichada</option>
                                               <option value="40">Santander</option>
                                               <option value="40">Sucre</option>
                                               <option value="40">Tolima</option>
                                               <option value="40">Valle del Cauca</option>
                                               <option value="40">Norte de Santander</option>
                                               <option value="40">San Andres y Providencia</option>
                                        </select>
                                        <label for="select1">Departamento</label>
                                   </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                        <select id="Id_Ciudad" name="Id_Ciudad" class="form-control">
                                               <option value="">&nbsp;</option>
                                               <option value="30"></option>
                                        </select>
                                        <label for="select1">Ciudad</label>
                                   </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-6">
                                <div class="form-group">
                                        <select id="area" name="Id_Area" class="form-control">
                                               <option value="">&nbsp;</option>
                                               <option value="30">Área Rural</option>
                                               <option value="30">Área Rural Dispersa</option>
                                               <option value="30">Área Urbana</option>
                                        </select>
                                        <label for="select1">Área</label>
                                   </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                        <select id="Id_NivelSocioEconomico" name="Id_NivelSocioEconomico" class="form-control">
                                               <option value="">&nbsp;</option>
                                               <option value="30">1</option>
                                               <option value="30">2</option>
                                               <option value="30">3</option>
                                               <option value="30">4</option>
                                               <option value="30">5</option>
                                               <option value="30">6</option>
                                        </select>
                                        <label for="select1">Estrato</label>
                                </div>
                        </div>
                </div>
                
                

            </div><!--end .card-body -->
            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <button type="submit" class="btn btn-flat btn-primary ink-reaction">Continuar <b> > </b> </button>
                </div>
            </div>
        </div><!--end .card -->
        
    </form>

</div>


@endsection