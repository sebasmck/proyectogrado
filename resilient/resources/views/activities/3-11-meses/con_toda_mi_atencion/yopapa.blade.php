@extends('partials.layout')

@section('title')
    yo papá
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

            <form method="GET" action="{{ route('/con-toda-mi-atencion-6') }}">

            <div class="card-head style-accent-dark">
                <header>Yo papá</header>
            </div>

            <div class="card-body">
                <p>
                    <b>Instrucción:</b> Identifica las situaciones que le provocan malestar a tu niño, de acuerdo con la intensidad..
                </p>

                <table class="table table-striped">
                    <thead>
                    <th style="width: 5%" scope="col">N.</th>
                    <th style="width: 30%" scope="col">Situación y/o Persona</th>
                    <th style="width: 20%" scope="col">Intensidad del desagrado</th>
                    <th style="width: 15%" scope="col">Acción</th>
                    </thead>
                    <tbody id="content">
                    </tbody>
                </table>

                <button type="button" class="btn btn-accent-light" onclick="createNewProblem()">Agregar situación de desagrado</button>
                <hr />

                <div style="text-align: right">
                    <button type="submit" class="btn btn-primary">Trabajo hecho!</button>
                </div>
            </div>
            </form>
        </div>
    </div>


@endsection

@section("addjs")

    <script>

        var index = 1;

        function createNewProblem(){
            var html = "<tr id='fila"+index+"'>" +
                "<td>"+index+"</td>" +
                "<td><input id='op"+index+"' name='op"+index+"' type='text' class='form-control full-size' /><p style='display: none' id='label"+index+"'></p></td>" +
                "<td><select id='for"+index+"' name='for"+index+"' class='form-control full-size' ><option value='1'>No me lo soporto nada</option><option value='2'>Me hace sentir medianamente molesto</option><option value='3'>Me molesta, pero lo soporto</option></select></td>" +
                "<td><button id='edit"+index+"' type='button' class='btn btn-info' style='display: none' onclick='edit("+index+")'><i class='glyphicon glyphicon-pencil'></i></button>" +
                "<button id='save"+index+"' type='button' class='btn btn-success' onclick='save("+index+")'><i class='glyphicon glyphicon-ok'></i></button>" +
                "<button id='delete"+index+"' type='button' class='btn btn-danger' style='margin-left: 10px;' onclick='deleteItem("+index+")'><i class='glyphicon glyphicon-trash'></i></button></td>" +
                "</tr>";
            $("#content").append(html);
            index++;
        }

        function edit(num){
            $("#op"+num).show();
            $("#for"+num).attr('disabled', false);
            $("#save"+num).show();

            $("#label"+num).hide();
            $("#edit"+num).hide();
        }

        function save(num){

            var inputNombre = $("#op"+num);

            inputNombre.hide();

            $("#for"+num).attr('disabled', true);
            $("#save"+num).hide();

            var label = $("#label"+num);

            label.show();

            label.text(inputNombre.val());
            $("#edit"+num).show();
        }
        
        function deleteItem(num) {
            $("#fila"+num).remove();
        }


    </script>
@endsection