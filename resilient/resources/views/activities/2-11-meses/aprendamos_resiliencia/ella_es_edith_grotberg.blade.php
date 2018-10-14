@extends('partials.layout')

@section('title')
    Intro Actividad 1
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <form method="GET" action="{{ route('/actividades-aprendamos-resiliencia-4') }}">
        <div class="card">
            <div class="card-head style-accent-dark">
                <header>Ella es edith Grotberg</header>
            </div>
            <div class="card-body" style="background-color: rgb(0,182,222); height: 500px">
                <div  id="componente1">
                    <img id="first-item" style="position: absolute; overflow: visible; display: none"  src="{{ asset('img/nube.png')}}"/>
                    <span id="presentacion" style="position: fixed; margin-top: 50px; margin-left: 60px; width: 150px">
                    </span>
                </div>
                <div id="componente2" style="margin-left: 20%">
                    <img id="second-item" style="position: absolute; overflow: visible; display: none; margin-left: 25%;margin-top: 20px"  src="{{ asset('img/nube2.png')}}"/>
                    <span id="obra" style="position: fixed; margin-top: 50px; margin-left: 20%; width: 150px">
                    </span>
                </div>
                <div id="componente3">
                    <div>
                        <img id="third-item" style="height: 250px; width: 350px; position: absolute; overflow: visible; display: none"  src="{{ asset('img/nube3.png')}}"/>
                        <span id="intro-estudios" style="position: fixed; margin-top: 50px; margin-left: 60px; width: 200px">
                    </span>
                    </div>
                </div>
                <div id="componente4" style="margin-left: 10%">
                    <div>
                        <img id="fourth-item" style="height: 250px; width:350px;position: absolute; overflow: visible; display: none;margin-left: 15%;margin-top: 20px"  src="{{ asset('img/nube4.png')}}"/>
                        <span id="importante" style="position: fixed; margin-top: 60px; margin-left: 14%; width: 200px">
                    </span>
                    </div>
                </div>

                <div id="nextstep" style="margin-top: 40% ;text-align: right; display: none">
                    <button type="text" class="btn style-success"> Siguiente</button>
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection

@section('addjs')
    <script>
        $(function(){
            var texto = "Edith Grotberg, es una profesora e investigadora estadounidense.";
            var texto2 = "Sus investigaciones sobre la resiliencia empezaron después que se dio cuenta que...";
            var texto3 = "aunque existían estudios sobre el concepto de resiliencia y cuáles eran sus características\n" +
                "                    no existía alguna metodología para generar resiliencia.";
            var texto4 = "Es así como creó el Modelo de las Verbalizaciones de Grotberg. En este, se explica que la resiliencia es dinámica\n" +
                "                    no estática de modo que se puede fortalecer en cualquier etapa del ciclo vital.";

            $('#first-item').fadeIn(500);
            setTimeout(function () {
                maquina("presentacion",texto,40,1);
            },2000)



            setTimeout(function () {
                $("#componente1").fadeOut();
                $("#second-item").fadeIn();
                maquina("obra",texto2,40,1)
            },6000)

            setTimeout(function () {
                $("#componente2").fadeOut();
                $("#third-item").fadeIn();
                maquina("intro-estudios",texto3,40,1)
            }, 10000)

            setTimeout(function () {
                $("#componente3").fadeOut();
                $("#fourth-item").fadeIn();
                maquina("importante",texto4,40,1)
            }, 20000)

            setTimeout(function () {
                $("#nextstep").fadeIn();
            },30000)
        });

        function maquina(contenedor,texto,intervalo,n){
            var i=0,
                // Creamos el timer
                timer = setInterval(function() {
                    if ( i<texto.length ) {
                        // Si NO hemos llegado al final del texto..
                        // Vamos añadiendo letra por letra y la _ al final.
                        $("#"+contenedor).html(texto.substr(0,i++) + "_");
                    } else {
                        // En caso contrario..
                        // Salimos del Timer y quitamos la barra baja (_)
                        clearInterval(timer);
                        $("#"+contenedor).html(texto);
                        // Auto invocamos la rutina n veces (0 para infinito)
                        if ( --n!=0 ) {
                            setTimeout(function() {
                                maquina(contenedor,texto,intervalo,n);
                            },3600);
                        }
                    }
                },intervalo);
        };
    </script>
@endsection