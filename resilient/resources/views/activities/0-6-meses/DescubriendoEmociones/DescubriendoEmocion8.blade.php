@extends('partials.layout')

@section('title')
Descubriendo Las Emociones 
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
            <header>Descubriendo Las Emociones - Parte Tres</header>
        </div>

        <div class="card-body">
            <p style="text-align:justify; text-justify: inter-word; font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                     Ya que conoces las tres maneras de identificar una emoción, realiza la siguiente actividad
                     para que aprendas a identificar cómo se comportan tus emociones
            </p>

            <table>
                <thead>
                <tr>
                    <th>Columna A</th>
                    <th>Columna B</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <img id="imagen1" src="{{ asset('ActividadDescubriendoEmociones/fisi.png') }}">
                    </td>
                    <td>
                        <img id="imagen2" src="{{ asset('ActividadDescubriendoEmociones/pien.png') }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <img id="imagen3" src="{{ asset('ActividadDescubriendoEmociones/cog.png') }}">
                    </td>
                    <td>
                        <img id="imagen4" src="{{ asset('ActividadDescubriendoEmociones/acci.png') }}">
                    </td>
                </tr>
                <tr>
                        <td>
                            <img id="imagen5" src="{{asset('ActividadDescubriendoEmociones/mot.png') }}">
                        </td>
                        <td>
                            <img id="imagen6" src="{{asset('ActividadDescubriendoEmociones/cuer.png') }}">
                        </td>
                    </tr>

                </tbody>
            </table>

            <div  id="mostrar" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;display:none"> 
                <p style="text-align:justify; text-justify: inter-word;">
                        <img   style="margin-left:40%" id="algo" WIDTH="150" HEIGTH="100"  src="{{asset('ActividadDescubriendoEmociones/cuer.png') }}"/>   
                        <label id="texto"></label>
                </p>
             </div>   

            <form id="siguiente" style="display:none" method="GET" action="{{ route('/DescubriendoEmociones9') }}">

                <div style="text-align: right">
                    <button class="btn btn-primary">Siguiente</button>
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

            if((window.selected.id === "imagen1" || window.selected.id === "imagen6" ) && (window.selected2.id === "imagen6" || window.selected2.id === "imagen1" ) ){
                addClass("correct");
                window.selected = null;
                window.selected2 = null;
            }else if((window.selected.id === "imagen3" || window.selected.id === "imagen2" ) && (window.selected2.id === "imagen2" || window.selected2.id === "imagen3" )){
                addClass("correct");
                window.selected = null;
                window.selected2 = null;
            }
            else if((window.selected.id === "imagen5" || window.selected.id === "imagen4" ) && (window.selected2.id === "imagen4" || window.selected2.id === "imagen5" )){
                addClass("correct");
                window.selected = null;
                window.selected2 = null;
            }
            else{
                addClass("wrong");
                $("#mostrar").fadeIn(1000);
                $("#algo").attr("src","{{asset('ActividadDescubriendoEmociones/mal.png') }}");      
                $("#texto").text("No olvides, lo fisiológico se refiere a lo que sientes en tu cuerpo por ejemplo sudor, frío, cambios de temperatura, temblor, entre otras; los cognitivos son tus pensamientos y lo motor es lo que haces cuando sientes esa emoción, tal vez llorar, gritar, pelear, golpear, dormir, entre otras.");
                setTimeout(function () {
                        removeClass("wrong");
                        window.selected = null;
                        window.selected2 = null;
                    },5000);
                 $("#mostrar").fadeOut(10000);    
            }

            comprobar();
        }

        function comprobar(){
            var contador = 0;

            for (var i = 1; i < 7; i++){
                if($("#imagen"+i).hasClass("correct") ){
                    contador ++;
                }
            }

            console.log(contador);
            if(contador === 6){
                $("#mostrar").fadeIn(1000);
                $("#algo").attr("src","{{asset('ActividadDescubriendoEmociones/bien.png') }}");      
                $("#texto").text("Felicidades, has colocado las respuestas correctas; nunca olvides, lo fisiológico se refiere a lo que sientes en tu cuerpo por ejemplo sudor, frío, cambios de temperatura, temblor, entre otras; los cognitivos son tus pensamientos y lo motor es lo que haces cuando sientes esa emoción, tal vez llorar, gritar, pelear, golpear, dormir, entre otras.");
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