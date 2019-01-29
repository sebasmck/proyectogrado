@extends('partials.layout')

@section('title')
    Monitoreo el comportamiento de mi comportamiento como cuidador
@endsection


@section('addcss')
    <style>
        table {
            margin: auto;
            width: 66%;
        }

        th, td {
            text-align: center;
        }

        .selected {
            border: dashed lightskyblue 5px;
            padding: 2px;
        }

        .correct{
           outline: limegreen 3px solid;
            padding: 5px;
            margin: 5px;
        }

        .wrong {
            outline: indianred 3px solid;
            padding: 5px;
            margin: 5px;
        }
    </style>
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">

            <div class="card-head style-primary">
                <header>Monitoreo el comportamiento de mi comportamiento como cuidador </header>
            </div>

            <div class="card-body">
                <p>
                    A continuación, encontraras dos columnas de imágenes donde
                    se muestran situaciones que generalmente los cuidadores tienen con los niños y niñas.
                    En la columna A se mostrarán aquellas situaciones que no ayudan al desarrollo de la
                    resiliencia en niños y niñas y en la columna B se mostraran aquellas situaciones que
                    fomentan al desarrollo de la resiliencia en niños y niñas. El objetivo, es que como cuidador
                    identifiques en la columna B situaciones alternas a las situaciones de la columna A.
                </p>

                <table>
                    <thead>
                    <tr>
                        <th>A</th>
                        <th>B</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <img id="imagen1" src="{{ asset('ActividadMonitoreoElComportamiento/001_ninollorando.png') }}">
                        </td>
                        <td>
                            <img id="imagen4" src="{{ asset('ActividadMonitoreoElComportamiento/004_ninoconpadre.png') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img id="imagen3" src="{{ asset('ActividadMonitoreoElComportamiento/003_ninosaislado.png') }}">
                        </td>
                        <td>
                            <img id="imagen2" src="{{ asset('ActividadMonitoreoElComportamiento/002_leerconnino.png') }}">
                        </td>

                    </tr>

                    </tbody>
                </table>

                <form id="siguiente" style="display: none" method="GET" action="{{ route('/aterrizando-el-concepto-resiliencia-5') }}">

                    <div style="text-align: right">
                        <button class="btn btn-primary">Continuar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection

@section('addjs')

    <script type="text/javascript">
         var selected = null;
         var selected2 = null;

            $("table").on("click",function (event) {
                var target = event.target;

                if(target.id.indexOf("imagen") > -1 && !target.classList.contains("correct")){

                    if(target.classList.contains("selected")){
                        window.selected = null;
                        target.classList.remove("selected");
                    }else{
                        var seleccionado = false;

                        if(window.selected == null){
                            window.selected = target;
                            target.classList.add("selected");
                            seleccionado = true;
                        }

                        if(window.selected2 == null && seleccionado === false){
                            window.selected2 = target;
                            target.classList.add("selected");
                            match();
                        }
                    }
                }
            });

            function match() {

                removeClass("selected");

                if((window.selected.id === "imagen1" || window.selected.id === "imagen2" ) && (window.selected2.id === "imagen1" || window.selected2.id === "imagen2" ) ){
                    addClass("correct");
                    window.selected = null;
                    window.selected2 = null;
                }else if((window.selected.id === "imagen3" || window.selected.id === "imagen4" ) && (window.selected2.id === "imagen3" || window.selected2.id === "imagen4" )){
                    addClass("correct");
                    window.selected = null;
                    window.selected2 = null;
                }else{
                    addClass("wrong");
                    setTimeout(function () {
                        removeClass("wrong");
                        window.selected = null;
                        window.selected2 = null;
                    },3000);
                }

                comprobar();
            }

            function comprobar(){
                var contador = 0;

                for (var i = 1; i < 5; i++){
                    if($("#imagen"+i).hasClass("correct") ){
                        contador ++;
                    }
                }

                console.log(contador);
                if(contador === 4){
                    $("#siguiente").fadeIn(2000);
                }
            }

            function removeClass(nameclass){
                window.selected.classList.remove(nameclass);
                window.selected2.classList.remove(nameclass);
            }

            function addClass(nameclass) {
                window.selected.classList.add(nameclass);
                window.selected2.classList.add(nameclass);
            }

    </script>
@endsection