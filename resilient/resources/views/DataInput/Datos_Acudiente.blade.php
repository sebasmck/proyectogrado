@extends('partials.layout')

@section('title')
Datos Acudiente
@endsection

@section('addcss')
<script type="text/javascript">
    //Applies cascading behavior for the specified dropdowns 
    function applyCascadingDropdown(sourceId, targetId) {
        var source = document.getElementById(sourceId);
        var target = document.getElementById(targetId);
        if (source && target) {
            source.onchange = function () {
                displayOptionItemsByClass(target, source.value);
            }
            displayOptionItemsByClass(target, source.value);
        }
    }

    //hides dropdown boxes
    function ChangeDropdowns(value) {
        if (value == "1") {
            document.getElementById('stuff').style.display = 'none';
        } else if (value == "4") {
            document.getElementById('stuff').style.display = 'block';
        }
    }

    //Displays a subset of a dropdown's options 
    function displayOptionItemsByClass(selectElement, className) {
        if (!selectElement.backup) {
            selectElement.backup = selectElement.cloneNode(true);
        }
        var options = selectElement.getElementsByTagName("option");
        for (var i = 0, length = options.length; i < length; i++) {
            selectElement.removeChild(options[0]);
        }
        var options = selectElement.backup.getElementsByTagName("option");
        for (var i = 0, length = options.length; i < length; i++) {
            if (options[i].className == className)
                selectElement.appendChild(options[i].cloneNode(true));
        }
    }

    //Binds dropdowns   
    function applyCascadingDropdowns() {
        applyCascadingDropdown("categories", "items");
        applyCascadingDropdown("items", "stuff");
        //We could even bind items to another dropdown 
        //applyCascadingDropdown("items", "foo"); 
    }

    function combine(info) {
        var str = '';
        str += document.getElementById('categories').value
            + ' ' + document.getElementById('items').value
            + ' ' + document.getElementById('stuff').value
            + ' ' + info;
        alert(str);
    }

    //execute when the page is ready 
    window.onload = applyCascadingDropdowns;


    // $('#Id_RelacionInfante').on('change', function(){
    //     var currentStatus = '';
    //     switch(this.currentStatus){
    //         case 1: document.getElementById('');
    //         case 2:
    //     }

    // });

    // var relacion_infante = document.getElementById('Id_RelacionInfante');

    // if (relacion_infante.value == 6) {
    //     alert('message');
    // }

    
</script>



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
                            <input type="text" class="form-control" name="Nombre_Acudiente" id="Nombre_Acudiente" required>
                            <label for="Nombre_Acudiente">Nombres Completos del Acudiente:</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="Apellido_Acudiente" id="Apellido_Acudiente" required>
                            <label for="Apellido_Acudiente">Apellidos Completos del Acudiente:</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="Correo_Acudiente" id="Correo_Acudiente" required>
                            <label for="Correo_Acudiente">Dirección de correo electrónico:</label>
                        </div>
                    </div>
                    {{-- PENDING 1 // Id_TipoDocumento --}}
                    <div class="col-sm-1">
                        <div class="form-group">
                            {{ Form::select('Id_TipoDocumento',
                            $tipodoc->prepend('none')->pluck('Nombre_TipoDocumento', 'Id_TipoDocumento'),NULL, ['class'
                            => 'form-control', 'id' => 'Id_TipoDocumento', 'required']) }}
                            <label for="Id_TipoDocumento">Tipo</label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <input type="text" class="form-control" name="NumeroDocumento_Acudiente" id="NumeroDocumento_Acudiente" required>
                            <label for="NumeroDocumento_Acudiente">Número de identificación</label>
                        </div>
                    </div>
                </div>
                {{-- PENDING 2 Id_RelacionInfante NEED EXTRA FIELD FOR OTRO --}}
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
                            <label for="otrorelacion"> <b>Otro Relación infante</b> </label>
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
                            </div>
                            <!--end .col -->
                        </div>
                        <!--end .form-group -->
                    </div>
                    <br>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" name="Otro_Cuidador" class="form-control" id="Otro_Cuidador">
                            <label for="Otro_Cuidador"><b>Otro cuidador </b></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            {{ Form::select('Id_Sexo', $sexo->prepend('none')->pluck('Nombre_Sexo', 'Id_Sexo'),NULL,
                            ['class' => 'form-control', 'id' => 'Id_Sexo', 'required']) }}
                            <label for="Id_Sexo">Sexo</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group control-width-normal">
                            <div class="input-group date" id="demo-date">
                                <div class="input-group-content">
                                    <input type="text" name="FechaDeNacimiento" class="form-control" required>
                                    <label>Fecha de nacimiento</label>
                                </div>
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::select('Id_EstadoCivil',
                            $estadocivil->prepend('none')->pluck('Nombre_EstadoCivil', 'Id_EstadoCivil'),NULL, ['class'
                            => 'form-control', 'id' => 'Id_EstadoCivil', 'required']) }}
                            <label for="Id_EstadoCivil">Estado Civil</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::select('Id_Escolaridad',
                            $escolaridad->prepend('none')->pluck('Nombre_Escolaridad', 'Id_Escolaridad'),NULL, ['class'
                            => 'form-control', 'id' => 'Id_Escolaridad', 'required']) }}
                            <label for="Id_Escolaridad">Escolaridad</label>
                        </div>
                    </div>
                    <div id="otroEscolaridad" style="display:none;" class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="Otro_Escolaridad" id="Lastname2">
                            <label for="Otro_Escolaridad"><b>Otro (Escolaridad) </b> </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div  class="col-sm-6">
                        <div class="form-group">
                            {{ Form::select('Id_Ocupacion', $ocupacion->prepend('none')->pluck('Nombre_Ocupacion',
                            'Id_Ocupacion'),NULL, ['class' => 'form-control', 'id' => 'Id_Ocupacion', 'required']) }}
                            <label for="Id_Ocupacion">Ocupación</label>
                        </div>
                    </div>
                    <div id="otroOcupacion" class="col-sm-6"  style="display:none;">
                        <div class="form-group">
                            <input type="text" name="Otro_Ocupacion" class="form-control" id="Otro_Ocupacion" >
                            <label for="Otro_Ocupacion"><b>Otro (Ocupación) </b> </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <select required id="categories" name="categories" onchange="document.theform.showValue.value=this.value"
                                class="form-control" required>
                                <option value="">&nbsp;</option>
                                <Option Value="Cundinamarca">Cundinamarca </Option>
                                <Option Value="Magdalena">Magdalena</Option>
                                <Option Value="Santander">Santander</Option>
                            </select>
                            <label for="select1">Departamento</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <select required name="items" id="items" class="form-control">
                                <option value="">&nbsp;</option>
                                <Option Class="Cundinamarca" Value="Bogota">Bogota</Option>
                                <Option Class="Cundinamarca" Value="Soacha">Soacha</Option>
                                <Option Class="Cundinamarca" Value="Chia">Chia</Option>
                                <Option Class="Cundinamarca" Value="Facatativá">Facatativá</Option>


                                <option value="">&nbsp;</option>
                                <Option Class="Magdalena" Value="Ciénaga">Ciénaga</Option>
                                <Option Class="Magdalena" Value="StaMarta">Sta Marta</Option>
                                <Option Class="Magdalena" Value="ZonaBananera">Zona Bananera</Option>
                                <Option Class="Magdalena" Value="plato">plato</Option>



                                <option value="">&nbsp;</option>
                                <Option Class="Santander" Value="Automobile">Piedecuesta</Option>
                                <Option Class="Santander" Value="Girón">Girón</Option>
                                <Option Class="Santander" Value="Cúcuta">Cúcuta</Option>
                                <Option Class="Santander" Value="Bucaramanga">Bucaramanga</Option>

                            </select>
                            <label for="select1">Ciudad</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <select required id="area" name="Id_Area" class="form-control">
                                <option value="">&nbsp;</option>
                                <option value="30">Área Rural</option>
                                <option value="30">Área Rural Dispersa</option>
                                <option value="30">Área Urbana</option>
                            </select>
                            <label for="select1">Área</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div required class="form-group">
                            <select id="Id_NivelSocioEconomico" name="Id_NivelSocioEconomico" class="form-control">
                                <option value="">&nbsp;</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                            <label for="select1">Estrato</label>
                        </div>
                    </div>
                </div>
            </div>
            <!--end .card-body -->
            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <button type="submit" class="btn btn-flat btn-primary ink-reaction">Continuar <b> > </b> </button>
                </div>
            </div>
        </div>
        <!--end .card -->

    </form>

</div>


@endsection

@section('addjs')

<script>
// if(document.getElementById('Id_RelacionInfante').value == '6'){
//         alert('works');
//     }



//Validation on relacion infante

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

//Validation on Escolaridad

$('#Id_Escolaridad').change(function(){
    if($(this).val() == '8'){
        // alert('whatever happened');
        // document.getElementById('otrorelacion').style.display == 'block';
        document.getElementById("otroEscolaridad").style.display = "block";
    }else{
        // alert('nothing happened');
        document.getElementById("otroEscolaridad").style.display = "none";
    }
});

// Validation Ocupation


$('#Id_Ocupacion').change(function(){
    if($(this).val() == '5'){
        // alert('whatever happened');
        // document.getElementById('otrorelacion').style.display == 'block';
        document.getElementById("otroOcupacion").style.display = "block";
    }else{
        // alert('nothing happened');
        document.getElementById("otroOcupacion").style.display = "none";
    }
});


$(document).ready(function() {
    $("#NumeroDocumento_Acudiente").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});


</script>

@endsection