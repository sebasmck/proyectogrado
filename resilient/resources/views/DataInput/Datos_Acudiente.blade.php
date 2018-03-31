@extends('partials.layout')

@section('title')
Datos Acudiente
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
    <form class="form">
        <div class="card">
            <div class="card-head style-primary">
                <header>Ingresa tus datos</header>
            </div>
            <div class="card-body floating-label">
                
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="Firstname2">
                            <label for="Firstname2">Nombres Completos Acudiente:</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="Lastname2">
                            <label for="Lastname2">Apellidos Completos Acudiente:</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="Lastname2">
                            <label for="Lastname2">Correo Electronico:</label>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <select id="select1" name="select1" class="form-control">
                                <option value="">&nbsp;</option>
                                <option value="30">C.E</option>
                                <option value="40">C.C</option>
                                <option value="40">Pasaporte</option>
                            </select>
                            <label for="select1">Tipo</label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <input type="text" class="form-control" id="Lastname2">
                            <label for="Lastname2">Documento:</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <select id="select1" name="select1" class="form-control">
                                <option value="">&nbsp;</option>
                                <option value="">Padre</option>
                                <option value="">Madre</option>
                                <option value="">Abuelo(a)</option>
                                <option value="">Otro</option>
                            </select>
                            <label for="select1">Parentezco</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="Lastname2">
                            <label for="Lastname2">Especificar en caso de seleccionar <b>Otro </b> </label>
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
                                    {!! Form::checkbox('DisenoDesarrollo', '1') !!}<span>Padre</span>
                                </label>
                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('Fabricante', '1') !!}<span>Madre</span>
                                </label>
                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('PrestacionServicios', '1') !!}<span>Abuelo(a)</span>
                                </label>
                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('MantenimientoAeronaves', '1') !!}<span>Hermano(a)</span>
                                </label>
                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('MantenimientoAeronaves', '1') !!}<span>Tio(a)</span>
                                </label>
                            </div><!--end .col -->
                        </div><!--end .form-group -->
                    </div>
                    <br>
                    <div class="col-sm-3">
                        <div class="form-group">
                                <input type="text" class="form-control" id="Lastname2">
                                <label for="Lastname2"><b>Otro </b> </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                        <div class="col-sm-2">
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
                        <div class="col-sm-6">
                                <div class="form-group">
                                        <select id="select2" name="select2" class="form-control">
                                               <option value="">&nbsp;</option>
                                               <option value="30">Soltero(a)</option>
                                               <option value="40">Casado(a)</option>
                                               <option value="40">Divorciado(a)</option>
                                               <option value="40">Viudo(a)</option>
                                               <option value="40">Union Libre</option>
                                        </select>
                                        <label for="select1">Estado Civil</label>
                                   </div>
                        </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                            <div class="form-group">
                                    <select id="select2" name="select2" class="form-control">
                                           <option value="">&nbsp;</option>
                                           <option value="30">Ninguno</option>
                                           <option value="40">Primaria</option>
                                           <option value="40">Bachillerato</option>
                                           <option value="40">Profesional/Pregrado</option>
                                           <option value="40">Profesional/Posgrado</option>
                                           <option value="40">Tecnico</option>
                                           <option value="40">Tecnologo</option>   
                                           <option value="40">Otro</option>                                        
                                    </select>
                                    <label for="select1">Escolaridad</label>
                               </div>
                    </div>
                    <div class="col-sm-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" id="Lastname2">
                                    <label for="Lastname2"><b>Otro </b> </label>
                            </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-sm-6">
                                <div class="form-group">
                                        <select id="select2" name="select2" class="form-control">
                                               <option value="">&nbsp;</option>
                                               <option value="30">Empleado</option>
                                               <option value="40">Independiente</option>
                                               <option value="40">Desempleado</option>
                                               <option value="40">Hogar</option>
                                        </select>
                                        <label for="select1">Ocupacion</label>
                                   </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                        <input type="text" class="form-control" id="Lastname2">
                                        <label for="Lastname2"><b>Otro </b> </label>
                                </div>
                        </div>  
                </div>
                <div class="row">
                        <div class="col-sm-6">
                                <div class="form-group">
                                        <select id="select2" name="select2" class="form-control">
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
                                        <select id="select2" name="select2" class="form-control">
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
                                        <select id="select2" name="select2" class="form-control">
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
                                        <select id="select2" name="select2" class="form-control">
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
                    <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create account</button>
                </div>
            </div>
        </div><!--end .card -->
        
    </form>
</div>


@endsection