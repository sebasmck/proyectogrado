@extends('partials.layout')

@section('title')
LAS REGLAS DE JUEGO
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
    <form class="form">
        <div class="card">

            <div class="card-head style-primary">
                <header> LAS REGLAS DE JUEGO </header>
            </div>

            <div class="card-body floating-label">

                <div class="row">
                    <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:#008efd;">
                        <p style="text-align:center; text-justify: inter-word;"><b>Desarrollo Actividad</b></p>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;">
                        <label>
                            <p style="text-align:justify; text-justify: inter-word;"> <b> - Recuerda los juegos que
                                    compartiste con tus amigos en la infancia, de los siguientes selecciona los que más
                                    jugaban.
                                </b> </p>
                        </label>
                    </div>
                </div>
                <div>

                    <div class="col-md-6">
                        <img class="pull-right" src="{{asset('img/avatar.png')}}" alt="avatar">
                    </div>

                    <div class="col-md-6">
                        <div>
                            <ul style="list-style-type:none;">
                                </label>

                                <li><label class="checkbox-inline checkbox-styled">
                                        {!!Form::checkbox('escondite','0',false, ['id' => 'escondite'])!!}<span>Escondite</span></li>
                                <li><label class="checkbox-inline checkbox-styled">{!! Form::checkbox('yeimi', '1',
                                        false, ['id' => 'yeimi'])!!}<span>Yeimy</span></li>
                                <li><label class="checkbox-inline checkbox-styled">{!!
                                        Form::checkbox('lalleva','1',false, ['id' => 'lalleva'])!!}<span>La lleva</span></li>
                                <li><label class="checkbox-inline checkbox-styled">{!!
                                        Form::checkbox('gallina','1',false, ['id' => 'gallina'])!!}<span>La gallina
                                            ciega</span></li>
                                <li><label class="checkbox-inline checkbox-styled">{!! Form::checkbox('aleta',
                                        '1',false, ['id' => 'aleta'])!!}<span>Aleta o rayuela</span></li>
                                <li><label class="checkbox-inline checkbox-styled">{!! Form::checkbox('lazo',
                                        '1',false, ['id' => 'lazo'])!!}<span>Lazo</span></li>
                                <li><label class="checkbox-inline checkbox-styled">{!!
                                        Form::checkbox('ponchado','1',false, ['id' => 'ponchado'])!!}<span>Ponchado</span></li>
                                <li><label class="checkbox-inline checkbox-styled">{!! Form::checkbox('angel',
                                        '1',false, ['id' => 'angel'])!!}<span>El angel y el diablo</span></li>
                                <li><label class="checkbox-inline checkbox-styled">{!! Form::checkbox('canicas',
                                        '1',false, ['id' => 'canicas'])!!}<span>Canicas</span></li>
                                <li><label class="checkbox-inline checkbox-styled">{!! Form::checkbox('trompo',
                                        '1',false, ['id' => 'trompo'])!!}<span>Trompo</span></li>
                                <li><label class="checkbox-inline checkbox-styled">{!! Form::checkbox('yoyo',
                                        '1',false, ['id' => 'yoyo'])!!}<span>Yoyo</span></li>
                                <li><label class="checkbox-inline checkbox-styled">{!! Form::checkbox('option',
                                        '1',false, ['id' => 'optionHidden'])!!}<span>Otro?
                                            Cual?</span> </li>
                                            <li><input id="inputOption" style="visibility: hidden;" type="text"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--end .card-body -->
            </div>
            <!--end .card -->

            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/lrj_logrosObtenidos')}}"> <button type="button"
                            class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                </div>
            </div>

    </form>
</div>

@endsection
@section('addjs')
<script>

    const escondite = document.querySelector('#escondite');
    const yeimi = document.querySelector('#yeimi');
    const lalleva = document.querySelector('#lalleva');
    const gallina = document.querySelector('#gallina');
    const aleta = document.querySelector('#aleta');
    const lazo = document.querySelector('#lazo');
    const ponchado = document.querySelector('#ponchado');
    const angel = document.querySelector('#angel');
    const canicas = document.querySelector('#canicas');
    const trompo = document.querySelector('#trompo');
    const yoyo = document.querySelector('#yoyo');
    const option = document.querySelector('#optionHidden');
    const inputOption = document.querySelector('#inputOption')



    escondite.addEventListener('change', function (e) {
        if (escondite.checked) {
            alert("este juego consiste en ocultarse y no ser descubierto hasta el final");
        }
    });

    yeimi.addEventListener('change', function (e) {
        if (yeimi.checked) {
            alert('es un juego en el que se forman dos grupos, los que  tienen por objetivo armar una torre con tapas plásticas (los armadores) y los que  tienen por objetivo ponchar a los jugadores armadores. Este juego se realiza a campo abierta y requiere de la asistencia de dos jugadores por cada equipo como minimo exigido           ')
        }
    });

    lalleva.addEventListener('change', function (e) {
        if (lalleva.checked) {
            alert('el grupo escoge un jugador que será la lleva, este perseguirá a los demás jugadores para tocarlos y entregarles la lleva; si lo logra queda libre y el compañero que ha tocado es quien ahora es la lleva');
        }
    });

    gallina.addEventListener('change', function (e) {
        if (gallina.checked) {
            alert('es un juego en el que un jugador, con los ojos vendados, debe atrapar a alguno de los participantes y, en ciertas variantes, adivinar quién es.');
        }
    });

    aleta.addEventListener('change', function (e) {
        if (aleta.checked) {
            alert('• Dibuja en el suelo, con una tiza, el diagrama para jugar a la rayuela, compuesto por cajas con números del 1 al 10. Puedas hacer las cajas de distintos tamaños según la edad del niño, y usar diferentes colores \n\n • Para empezar a jugar necesitamos una piedra plana. El niño debe situase detrás del primer número, con la piedra en la mano, y lanzarla. El cuadrado en el que caiga se denomina "casa" y no se puede pisar \n \n • El niño comienza a recorrer el circuito saltando a la pata coja en los cuadrados, o con los dos pies si se trata de un cuadrado doble. El objetivo es pasar la piedra de cuadrado en cuadrado hasta llegar al 10 y volver a la casilla de salida \n\n •	El niño comienza a recorrer el circuito saltando a la pata coja en los cuadrados, o con los dos pies si se trata de un cuadrado doble. El objetivo es pasar la piedra de cuadrado en cuadrado hasta llegar al 10 y volver a la casilla de salida');
        }
    });

    lazo.addEventListener('change', function (e) {
        if (lazo.checked) {
            alert('este juego consiste en consiste en que uno o más participantes saltan sobre una cuerda que se hace girar de modo que pase debajo de sus pies y sobre su cabeza. Si el juego es individual, es una persona que hace girar la cuerda y salta.');
        }
    });

    ponchado.addEventListener('change', function (e) {
        if (ponchado.checked) {
            alert('este juego consiste en consiste en que uno o más participantes saltan sobre una cuerda que se hace girar de modo que pase debajo de sus pies y sobre su cabeza. Si el juego es individual, es una persona que hace girar la cuerda y salta.');
        }
    });

    angel.addEventListener('change', function (e) {
        if (angel.checked) {
            alert('Inicialmente, a los participantes llamados "cintas" se les asigna un color;  no se deben repetir los colores.  \n\n  Luego el ángel toca la puerta:  ¡Toc, toc! \n\n -¿Quién es? responde la puerta \n\n Soy yo, el ángel \n\n Soy yo, el ángel \n\n -Una cintica, dice el ángel \n\n -¿De qué color? pregunta la puerta \n\n -De parte de Dios y de parte del diablo \n\n  En este momento la cintica sale a correr hasta que el ángel o el diablo la atrape \n\n Este mismo proceso realiza el diablo y así sucesivamente hasta que se acaben las cinticas');
        }
    });

    canicas.addEventListener('change', function (e) {
        if (canicas.checked) {
            alert('El objeto de este juego consiste en apoderarse de las canicas de los demás jugadores, es lo que se consigue disparando sobre ellas sin fallar. Solo se tiene derecho a tirar contra la canica de otro jugador tras haber logrado introducir tu propia canica en el agujero “gua” (que se hizo antes de empezar el suelo )');
        }
    });

    trompo.addEventListener('change', function (e) {
        if (trompo.checked) {
            alert('El trompo es un juguete de madera con púa de metal y desde esta punta se enrolla una lienza o cuerda. Después de haber enrollado todo el hilo, el trompo es lanzado con fuerza y técnica para hacerlo girar y girar. Mientras gira los competidores pueden hacer una serie de trucos');
        }
    });

    yoyo.addEventListener('change', function (e) {
        if (yoyo.checked) {
            alert('consiste en dos discos de madera unidos con una ranura profunda en medio en torno a la cual se enrolla un cordel. Una vez enrollado el cordel y anudado a un dedo, se deja caer el yoyó con fuerza y se consigue que suba y baje por el cordel');
        }
    });

    option.addEventListener('change', function (e) {
        if (option.checked) {
            inputOption.style.visibility = '';
        }
    });

</script>
@endsection