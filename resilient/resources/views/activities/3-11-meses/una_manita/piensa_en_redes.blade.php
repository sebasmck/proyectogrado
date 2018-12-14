@extends('partials.layout')

@section('title')
    Cuando presto atención es cuando yo entiendo
@endsection

@section('addcss')

    <style>
        .full-size{
            width: 100%;
        }
        th {
            text-align: center;
        }
    </style>
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">

            <div class="card-head style-accent-dark">
                <header>Piensa en redes de apoyo</header>
            </div>

            <div class="card-body">
                <p>
                    <b>Instrucción:</b> Identifica y escribe en la siguiente plantilla las personas cercanas en el entorno de desarrollo de tu niño que le pueden brindar apoyo cuando él lo requiera.
                </p>

                <table class="table">
                    <thead>
                    <th style="width: 5%" scope="col">N.</th>
                    <th style="width: 30%" scope="col">Nombre</th>
                    <th style="width: 30%" scope="col">Parentesco</th>
                    <th style="width: 20%" scope="col">Pauta que se puede fortalecer</th>
                    <th style="width: 15%" scope="col">Acción</th>
                    </thead>
                    <tbody id="content">
                    </tbody>
                </table>

                <button type="button" class="btn btn-accent-light" onclick="createNewPerson()">Agregar persona cercana</button>
                <hr />

                <div style="text-align: right">
                    <a href=" {{route('/una-manita-6')}} ">
                        <button type="button" class="btn btn-primary">Aquí vamos!</button>
                    </a>
                </div>
            </div>
        </div>
    </div>


@endsection

@section("addjs")

    <script>

        var index = 1;

        function createNewPerson(){
            console.log("xd");
            var html = "<tr id='fila"+index+"'>" +
                "<td>"+index+"</td>" +
                "<td><input id='op"+index+"' name='op"+index+"' type='text' class='form-control full-size' /><p style='display: none' id='label"+index+"'></p></td>" +
                "<td><input id='pa"+index+"' name='pa\"+index+\"' type='text' class='form-control full-size' /><p style='display: none' id='pal"+index+"'></p></td>" +
                "<td><select id='for"+index+"' name='for"+index+"' class='form-control full-size' ><option value='1'>Yo puedo</option><option value='2'>Fortaleza emocional</option><option value='3'>Amigos</option><option value='4'>Conflicto</option><option value='5'>Acompañar</option><option value='6'>Agresividad</option><option value='7'>Poner límites</option></select></td>" +
                "<td><button id='edit"+index+"' type='button' class='btn btn-info' style='display: none' onclick='edit("+index+")'><i class='glyphicon glyphicon-pencil'></i></button>" +
                "<button id='save"+index+"' type='button' class='btn btn-success' onclick='save("+index+")'><i class='glyphicon glyphicon-ok'></i></button>" +
                "<button id='delete"+index+"' type='button' class='btn btn-danger' style='margin-left: 10px;' onclick='deleteItem("+index+")'><i class='glyphicon glyphicon-trash'></i></button></td>" +
                "</tr>";
            $("#content").append(html);
            index++;
        }

        function edit(num){
            $("#op"+num).show();
            $("#pa"+num).show();
            $("#for"+num).attr('disabled', false);
            $("#save"+num).show();

            $("#label"+num).hide();
            $("#pal"+num).hide();
            $("#edit"+num).hide();
        }

        function save(num){

            var inputNombre = $("#op"+num);
            var inputTipoRelacion = $("#pa"+num);

            inputNombre.hide();
            inputTipoRelacion.hide();

            $("#for"+num).attr('disabled', true);
            $("#save"+num).hide();

            var label = $("#label"+num);
            var palt =  $("#pal"+num);

            label.show();
            palt.show();

            label.text(inputNombre.val());
            palt.text(inputTipoRelacion.val());

            $("#edit"+num).show();
        }
        
        function deleteItem(num) {
            $("#fila"+num).remove();
        }


    </script>
@endsection