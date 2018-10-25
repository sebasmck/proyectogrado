@extends('partials.layout')

@section('title')
   Tareas
@endsection

@section('addcss')
    <style>
        .card-body{
            font-size: 1.1em;
        }

        .componente-oculto{
            display: none;
        }
    </style>
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8 margin-bottom-lg">
        <div class="card">

            <div class="card-head style-primary">
                <header>Tareas</header>
            </div>

            <div class="card-body">
                <p>Sigue las siguientes pautas</p>
                <div class="row">
                    <div id="pauta1"  class="col-sm-6 componente-oculto">
                        <p><b>1.</b> <i> Dale ejemplo con tu comportamiento:</i> compórtate de la manera como te gustaría que tu niño se comporte: hazle notar a tu niño cuando los adultos tienen comportamientos deseados.
                            <b>Ejemplo:</b> compartir “mira como papá comparte el pan con pedro” pedir el favor “fíjate como mamá te pide el favor de que le pases las pantuflas”.</p>
                    </div>
                    <div id="pauta2" class="col-sm-6 componente-oculto">
                        <p><b>2.</b> Enséñale a tu niño a expresar lo que siente en vez de hacer críticas o utilizar palabras que atentan contra su autoestima.
                            <b>Ejemplo:</b> “mami se siente enojada, déjala sola por un momento”.</p>
                    </div>
                </div>
                <div class="row">
                    <div id="pauta3" class="col-sm-6 componente-oculto">
                        <p><b>3.</b> Préstale toda la atención al buen comportamiento:
                            usualmente los cuidadores prestan toda la atención a sus niños cuando se están comportando mal y  NO cuando están haciendo las cosas bien,
                            lo que debes practicar es prestar mucha atención cuando tu niño este haciendo algo que a ti
                            te gusta y cuando este presentando comportamiento no deseado no le prestes atención.</p>
                    </div>
                    <div id="pauta4" class="col-sm-6 componente-oculto">
                        <p><b>4.</b><i> Elógialo:</i> Cuando tu niño realice un comportamiento agradable para ti díselo:
                            ejemplo, ¡me alegra mucho que estés pidiéndome el favor!</p>
                    </div>
                </div>

                <div id="nextStep" style="text-align: right" class="componente-oculto">
                    <a href=" {{route('/papito-escultor-6')}} ">
                        <button type="button" class="btn btn-primary">Siguiente</button>
                    </a>
                </div>
            </div>
        </div>
    </div>





@endsection

@section('addjs')

    <script type="text/javascript">
        function mostrarContenido() {
            $("#pauta1").fadeIn(3000);

            setTimeout(function () {
                $("#pauta2").fadeIn(3000);
            }, 8000);

            setTimeout(function () {
                $("#pauta3").fadeIn(3000);
            }, 16000)

            setTimeout(function () {
                $("#pauta4").fadeIn(3000);
            }, 24000)

            setTimeout(function () {
                $("#nextStep").fadeIn(3000);
            },30000)
        }

        mostrarContenido();
    </script>
@endsection