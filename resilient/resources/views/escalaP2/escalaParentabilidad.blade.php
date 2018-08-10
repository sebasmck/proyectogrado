@extends('partials.layout')

@section('title')
Datos Acudiente
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <h2 class="card-title">Escala de parentabilidad positiva</h2>

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
                            <label for="nombre" class="col-md-2 col-form-label">NOMBRE:</label>

                            <div class="col-md-10">
                                <input class="form-control" id="nombre" type="text" >
                            </div>

                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <div class="form-row">
                            <label for="edad" class="col-md-2 col-form-label">EDAD:</label>

                            <div class="col-md-8">
                                <input class="form-control" id="edad" type="text" >
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
                            <label class="col-md-2 col-form-label">SEXO:</label>

                            <div class="col-md-10">

                                <div class="form-check form-check-inline col-md-5">
                                    <label class="radio-inline radio-styled form-check-label">
                                         <input type="radio" class="form-check-input" checked="true" name="sexo" id="sexo-m" value="1">
                                         <span>(M)</span>
                                     </label>
                                </div>

                                <div class="form-check form-check-inline col-md-5">
                                    <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input" name="sexo" id="sexo-f" value="2">
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
                                         <input type="radio" class="form-check-input" checked="true" name="escolaridad" id="escolaridad-a" value="1">
                                         <span>Sin escolaridad</span>
                                    </label>
                                </div>

                                <div class="form-check form-check-inline col-md-2">
                                    <label class="radio-inline radio-styled form-check-label">
                                         <input type="radio" class="form-check-input" name="escolaridad" id="escolaridad-b" value="2">
                                         <span>Básica</span>
                                    </label>
                                </div>

                                <div class="form-check form-check-inline col-md-2">
                                    <label class="radio-inline radio-styled form-check-label">
                                         <input type="radio" class="form-check-input" name="escolaridad" id="escolaridad-c" value="3">
                                         <span>Media</span>
                                    </label>
                                </div>

                                <div class="form-check form-check-inline col-md-2">
                                    <label class="radio-inline radio-styled form-check-label">
                                         <input type="radio" class="form-check-input" name="escolaridad" id="escolaridad-d" value="4">
                                         <span>Técnica</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline col-md-2">
                                    <label class="radio-inline radio-styled form-check-label">
                                         <input type="radio" class="form-check-input" name="escolaridad" id="escolaridad-e" value="5">
                                         <span>Universitaria</span>
                                    </label
                                </div>
                                
                            </div>
                        </div>
                    </div>
                
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="form-row">
                            <label for="ingresp" class="col-md-4 col-form-label">Ingreso familiar total (al mes):</label>

                            <div class="col-md-8">
                                <input class="form-control" id="ingreso" name="ingreso-familiar" type="text" >
                            </div>

                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-row">
                            <label for="ocupacion" class="col-md-4 col-form-label">OCUPACIÓN (en qué trabaja):</label>

                            <div class="col-md-8">
                                <input class="form-control" id="ocupacion" type="text" >
                            </div>  
                    
                        </div>
                    </div>
                </div>

                <div class="row">
                                        <div class="form-group col-md-8">
                                            <div class="form-row">
                                                <label class="col-md-2 col-form-label">ESTADO CIVIL:</label>

                                                <div class="col-md-10">

                                                    <div class="form-check form-check-inline col-md-2">
                                                        <label class="radio-inline radio-styled form-check-label">
                                                            <input type="radio" class="form-check-input" checked="true" name="estadocivil" id="estadocivil-a" value="1">
                                                            <span>soltero/a</span>
                                                        </label>
                                                    </div>

                                                    <div class="form-check form-check-inline col-md-2">
                                                        <label class="radio-inline radio-styled form-check-label">
                                                            <input type="radio" class="form-check-input" name="estadocivil" id="estadocivil-b" value="2">
                                                            <span>casado</span>
                                                        </label>
                                                    </div>

                                                    <div class="form-check form-check-inline col-md-2">
                                                        <label class="radio-inline radio-styled form-check-label">
                                                            <input type="radio" class="form-check-input" name="estadocivil" id="estadocivil-c" value="3">
                                                            <span>divorciado</span>
                                                        </label>
                                                    </div>

                                                    <div class="form-check form-check-inline col-md-2">
                                                        <label class="radio-inline radio-styled form-check-label">
                                                            <input type="radio" class="form-check-input" name="estadocivil" id="estadocivil-d" value="4">
                                                            <span>viudo/a</span>
                                                        </label>
                                                    </div>                                    
                                                </div>
                                            </div>
                                        </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-row">
                                            <label for="nacionalidad" class="col-md-4 col-form-label">NACIONALIDAD:</label>

                                            <div class="col-md-8">
                                                <input class="form-control" id="nacionalidad" type="text" >
                                            </div>  
                                    
                                        </div>
                                    </div>
                </div>
                
                <div class="row">

                    <div class="form-group col-md-4">
                        <div class="form-row">
                            <label for="habitantes" class="col-md-8 col-form-label">¿Cuántas personas viven en su casa? Total:</label>

                            <div class="col-md-4">
                                <input class="form-control" id="habitantes" name="habitantes" type="text" >
                            </div>

                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <div class="form-row">
                            <label for="habitantes18" class="col-md-8 col-form-label">Personas menores de 18 años:</label>

                            <div class="col-md-4">
                                <input class="form-control" id="habitantes18" name="habitantes18" type="text" >
                            </div>

                        </div>
                    </div>


                    <div class="form-group col-md-4">
                        <div class="form-row">
                            <label for="hijos" class="col-md-6 col-form-label">¿Cuántos hijos tiene?:</label>

                            <div class="col-md-6">
                                <input class="form-control" id="hijos" name="hijos" type="text" >
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

                <br />

                <div class="row">

                    <div class="form-group col-md-12">
                        <div class="form-row">
                            <label class="col-md-2 col-form-label">¿Cuál es su relación con el niño/a?:</label>

                            <div class="col-md-10">

                                <div class="form-check form-check-inline col-md-2">
                                    <label class="radio-inline radio-styled form-check-label">
                                        <input type="radio" class="form-check-input" checked="true" name="cuidador" id="cuidador-a" value="1">
                                        <span>padre</span>
                                    </label>
                                </div>

                                <div class="form-check form-check-inline col-md-2">
                                    <label class="radio-inline radio-styled form-check-label">
                                        <input type="radio" class="form-check-input" name="cuidador" id="cuidador-b" value="2">
                                        <span>madre</span>
                                    </label>
                                </div>

                                <div class="form-check form-check-inline col-md-2">
                                    <label class="radio-inline radio-styled form-check-label">
                                        <input type="radio" class="form-check-input" name="cuidador" id="cuidador-c" value="3">
                                        <span>abuelo/a</span>
                                    </label>
                                </div>

                                <div class="form-check form-check-inline col-md-2">
                                    <label class="radio-inline radio-styled form-check-label">
                                        <input type="radio" class="form-check-input" name="cuidador" id="cuidador-d" value="4">
                                        <span>otro familiar</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline col-md-2">
                                    <label class="radio-inline radio-styled form-check-label">
                                        <input type="radio" class="form-check-input" name="cuidador" id="cuidador-e" value="5">
                                        <span>cuidador no familiar</span>
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
                                    <input class="form-control" id="nombrenino" type="text" >
                                </div>

                            </div>
                        </div>

                        <div class="form-group col-md-7">
                            <div class="form-row">
                                <label for="edadninoanos" class="col-md-3 col-form-label">EDAD del Niño/a:</label>

                                <div class="col-md-2">
                                    <input class="form-control" id="edadninoanos" type="text" >
                                </div>

                                <div class="col-md-2">
                                    años
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control" id="edadninomeses" type="text" >
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
                                        <input type="radio" class="form-check-input" checked="true" name="sexo-nino" id="sexo-nino-m" value="1">
                                        <span>(M)</span>
                                    </label>
                                </div>

                                <div class="form-check form-check-inline col-md-5">
                                    <label class="radio-inline radio-styled form-check-label">
                                        <input type="radio" class="form-check-input" name="sexo-nino" id="sexo-nino-f" value="2">
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

                                <div class="form-check form-check-inline col-md-3">
                                    <label class="radio-inline radio-styled form-check-label">
                                         <input type="radio" class="form-check-input" checked="true" name="escolaridad-nino" id="escolaridad-nino-a" value="1">
                                         <span>Sala cuna</span>
                                    </label>
                                </div>

                                <div class="form-check form-check-inline col-md-3">
                                    <label class="radio-inline radio-styled form-check-label">
                                         <input type="radio" class="form-check-input" name="escolaridad-nino" id="escolaridad-nino-b" value="2">
                                         <span>Jardín infantil</span>
                                    </label>
                                </div>

                                <div class="form-check form-check-inline col-md-4">
                                    <label class="radio-inline radio-styled form-check-label">
                                         <input type="radio" class="form-check-input" name="escolaridad-nino" id="escolaridad-nino-c" value="3">
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
                                <label class="col-md-8 col-form-label">El niño/a, ¿tiene alguna discapacidad diagnosticada?:</label>

                                <div class="col-md-4">

                                    <div class="form-check form-check-inline col-md-5">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input" checked="true" name="discapacidad" id="discapacidad-y" value="1">
                                            <span>(NO)</span>
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-5">
                                        <label class="radio-inline radio-styled form-check-label">
                                            <input type="radio" class="form-check-input" name="discapacidad" id="discapacidad-n" value="2">
                                            <span>(SI)</span>
                                        </label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-7">
                                <div class="form-row">
                                    <label for="discapacidad" class="col-md-2 col-form-label">¿Cuál?:</label>

                                    <div class="col-md-10">
                                        <input class="form-control" id="discapacidad" type="text" >
                                    </div>

                                </div>
                        </div>

                </div>

                <div class="row">

                    <div class="form-group col-md-5">
                        <div class="form-row">
                            <label class="col-md-8 col-form-label">El niño/a, ¿tiene algún problema emocional que le preocupe?:</label>

                            <div class="col-md-4">

                                <div class="form-check form-check-inline col-md-5">
                                    <label class="radio-inline radio-styled form-check-label">
                                        <input type="radio" class="form-check-input" checked="true" name="emocional" id="emocional-n" value="1">
                                        <span>(NO)</span>
                                    </label>
                                </div>

                                <div class="form-check form-check-inline col-md-5">
                                    <label class="radio-inline radio-styled form-check-label">
                                        <input type="radio" class="form-check-input"  name="emocional" id="emocional-y" value="2">
                                        <span>(SI)</span>
                                    </label>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-7">
                            <div class="form-row">
                                <label for="discapacidad" class="col-md-2 col-form-label">¿Cuál?:</label>

                                <div class="col-md-10">
                                    <input class="form-control" id="discapacidad" type="text" >
                                </div>

                            </div>
                    </div>

                </div>
    
            </div>

                <button type="submit">Desarrollar escala</button>
            </form>
     </div>
</div>

@endsection