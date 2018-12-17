@extends('partials.layout')

@section('title')
de quien puedo aprender
@endsection
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}"> 
<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<script type="text/javascript" src="{{ URL::asset('js/wordfind.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('js/wordfindgame.js')}}"></script> 

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div id="h" class="card-head style-accent-dark">
                   <header> La metáfora del bambú japonés </header>
                </div>

                <div id="algo" class="card-body floating-label">

                    <div id="content-1">
                        <p style="text-justify: newspaper;font-size: 1.2em">
                            <i>“No hay que ser agricultor para saber que una buena cosecha requiere de buena semilla, buen abono y riego constante. También es obvio que quien cultiva la tierra no se impacienta frente a la semilla sembrada, halándola con el riesgo de echarla a perder, gritándole con todas sus fuerzas: ¡Crece, por favor! <br /><br />

                            Hay algo muy curioso que sucede con el bambú japonés y que lo transforma en no apto para impacientes: siembras la semilla, la abonas, y te ocupas de regarla constantemente. <br /><br />

                            Durante los primeros meses no sucede nada apreciable. En realidad, no pasa nada con la semilla durante los primeros siete años, a tal punto que, un cultivador inexperto estaría convencido de haber comprado semillas infértiles. <br /><br />

                            Sin embargo, durante el séptimo año, en un período de sólo seis semanas la planta de bambú crece ¡más de 30 metros! ¿Tardó sólo seis semanas crecer? No, la verdad es que se tomó siete años y seis semanas en desarrollarse. <br /><br />

                            Durante los primeros siete años de aparente inactividad, este bambú estaba generando un complejo sistema de raíces que le permitirían sostener el crecimiento, que iba a tener después de siete años. <br /><br />

                            Sin embargo, en la vida cotidiana, muchas veces queremos encontrar soluciones rápidas y triunfos apresurados, sin entender que el éxito es simplemente resultado del crecimiento interno y que éste requiere tiempo. <br /><br />

                            De igual manera, es necesario entender que en muchas ocasiones estaremos frente a situaciones en las que creemos que nada está sucediendo. Y esto puede ser extremadamente frustrante. <br /><br />

                            En esos momentos (que todos tenemos), recordar el ciclo de maduración del bambú japonés y aceptar que “en tanto no bajemos los brazos” ni abandonemos por no “ver” el resultado que esperamos, sí está sucediendo algo, dentro nuestro… Estamos creciendo, madurando. <br /><br />

                            Quienes no se dan por vencidos, van gradual e imperceptiblemente creando los hábitos y el temple que les permitirá sostener el éxito cuando éste al fin se materialice. <br /><br />

                                Si no consigues lo que anhelas, no desesperes…quizá sólo estés echando raíces…”</i>

                        </p>

                        <div style="text-align: right">
                            <button type="button" class="btn btn-accent-bright" onclick="goNextStep()">Completado!</button>
                        </div>
                    </div>

                    <div id="content-2" style="display: none; height: 500px;">
                    <p style="font-size: 1.2em">
                        <b>Instrucción:</b> Encuentra las palabras más importantes de la metáfora en la sopa de letras.</b>

                    </p>
              

                 <div id='puzzle'></div>
                 <div id='words'></div>
                  
                        <script>
                                var words = ['COSECHA', 'ABONO', 'SEMILLA', 'CRECIMIENTO', 'RAÍCES','CUIDADO','RESULTADOS','FRUSTRACIÓN'];

                                // start a word find game
                                var gamePuzzle = wordfindgame.create(words, '#puzzle', '#words');
                                // create just a puzzle, without filling in the blanks and print to console
                                
                                var puzzle = wordfind.newPuzzle(
                                  words, 
                                  {height: 24, width:24, fillBlanks: false} );
                                  wordfind.print(puzzle);  


                                setInterval( function () 
                                {
                                    if ($('#puzzle').hasClass('puzzle-complete')) 
                                    {
                                        $("#boton").show(); 
                                    }

                                }, 1000 );    
                        </script>

                </div> {{-- card-body no padding --}}

                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/de-quien-puedo-aprender-3')}}"> <button id="boton" style="display:none" type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                    </div>
                </div>
            </div><!--end .card-body -->

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
@section('addjs')
<script>

    function goNextStep(){
        $("#content-1").hide(3000);
        $("#content-2").fadeIn(2000);
    }
</script>
@endsection