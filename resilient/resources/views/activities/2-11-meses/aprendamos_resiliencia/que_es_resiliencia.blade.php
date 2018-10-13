@extends('partials.layout')

@section('title')
    Intro Actividad 1
@endsection

<style>
    .newspaper {
        text-justify: newspaper;
    }

    .escondido {
        display: none;
    }

</style>

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
            <div class="card-head style-accent-dark">
                <header>Definiciones sobre la resiliencia</header>
            </div>
            <div class="card-body">
                <div id="concept1" class="newspaper">
                    <p>Capacidad humana universal para hacer frente a las adversidades de la vida,
                        superarlas o incluso ser transformado por ellas,
                        ayuda al individuo a generar en sí su capacidad para afrontar los problemas,
                        teniendo presente por un lado la flexibilidad de la respuesta en relación con
                        la problemática y por otro el ambiente y la disposición para el aprendizaje experiencial,
                        que enmarcan lo hoy llamado resiliencia. (Grotberg,1995)
                    </p>
                </div>
                <div id="concept2" class="newspaper escondido">
                    <p>Habilidad para resurgir de la adversidad, adaptarse,
                        recuperarse y acceder a una vida significativa y productiva
                        (ICCB, Institute on Child Resilience and Family, 1994).
                    </p>
                </div>
                <div id="concept3" class="newspaper escondido">
                    <p>La resiliencia significa una combinación de factores que permiten a un niño,
                        a un ser humano, afrontar y superar los problemas y adversidades de la vida,
                        y construir sobre ellos (Suárez Ojeda, 1995).
                    </p>
                </div>
                <div id="concept4" class="newspaper escondido">
                    <p>La resiliencia, se ha caracterizado como un conjunto de procesos sociales e intrapsíquicos
                        que posibilitan tener una vida “sana” en un medio insano.
                        Estos procesos se realizan a través del tiempo, dando afortunadas combinaciones entre los atributos del niño y su ambiente familiar,
                        social y cultural. Así la resiliencia no puede ser pensada como un atributo con el que los niños nacen
                        o que los niños adquieren durante su desarrollo, sino que se trata de un proceso que caracteriza un complejo sistema social,
                        en un momento determinado del tiempo (Rutter, 1992).

                    </p>
                </div>

                <hr />
                <form id="form" method="GET" action="/actividades-aprendamos-resiliencia-6">
                    <div style="text-align: right">
                        <button id="nextstep" type="button" class="btn style-success" onclick="desbloquearSeccion()"> Siguiente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('addjs')

<script>

    var state = 1;

    function desbloquearSeccion () {
        console.log("try");
        $("#concept"+state).fadeOut();
        window.state ++;
        setTimeout(function () {
           var lectura = $("#concept"+state);
           if(lectura.length){
                lectura.fadeIn();
           }else{
               $("#form").submit();
           }
        }, 1000)
    }
    
</script>

@endsection