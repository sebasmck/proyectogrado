@extends('partials.layout')

@section('title')
Una manita
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
                   <header> Descubre las palabras </header>
                </div>

                <div id="algo "class="card-body floating-label">
                    <p style="font-size: 1.2em">
                        <b>Instrucción:</b> A continuación se te presenta una sopa de letras, tú debes encontrar las palabras que te solicitan,
                        cada una de ellas es una pauta que es importante que conozcas e incorpores en la crianza que estas ofreciendo a tu niño.
                        <b>¡No lo pierdas de vista!.</b>

                    </p>
              

                 <div id='puzzle'></div>
                 <div id='words'></div>
                  
                        <script>
                                var words = ['YOPUEDO', 'FORTALEZAEMOCIONAL', 'AMIGOS', 'CONFLICTO', 'ACOMPAÑAR','AGRESIVIDAD','PONERLIMITE'];

                                // start a word find game
                                var gamePuzzle = wordfindgame.create(words, '#puzzle', '#words');
                                // create just a puzzle, without filling in the blanks and print to console
                                
                                var puzzle = wordfind.newPuzzle(
                                  words, 
                                  {height: 24, width:24, fillBlanks: false} );
                                  wordfind.print(puzzle);  
                                
                                var yoPuedo = $(".YOPUEDO");
                                var fortalezaEmocional = $(".FORTALEZAEMOCIONAL");
                                var amigos = $(".AMIGOS");
                                var conflicto = $(".CONFLICTO");
                                var acompanar = $(".ACOMPAÑAR");
                                var agresividad = $(".AGRESIVIDAD");
                                var ponerLimite = $(".PONERLIMITE");




                                setInterval( function () 
                                {
                                    if ($('#puzzle').hasClass('puzzle-complete')) 
                                    {
                                        $("#boton").show(); 
                                    }


                                    if(yoPuedo.hasClass("wordFound") && !yoPuedo.hasClass("Informada")){
                                        yoPuedo.addClass("Informada");
                                        $("#item1").show();
                                    }

                                    if(fortalezaEmocional.hasClass("wordFound") && !fortalezaEmocional.hasClass("Informada")){
                                        fortalezaEmocional.addClass("Informada");
                                        $("#item2").show();
                                    }

                                    if(amigos.hasClass("wordFound") && !amigos.hasClass("Informada")){
                                        amigos.addClass("Informada");
                                        $("#item3").show();
                                    }

                                    if(conflicto.hasClass("wordFound") && !conflicto.hasClass("Informada")){
                                        conflicto.addClass("Informada");
                                        $("#item4").show();
                                    }

                                    if(acompanar.hasClass("wordFound") && !acompanar.hasClass("Informada")){
                                        acompanar.addClass("Informada");
                                        $("#item5").show();
                                    }

                                    if(agresividad.hasClass("wordFound") && !agresividad.hasClass("Informada")){
                                        agresividad.addClass("Informada");
                                        $("#item6").show();
                                    }

                                    if(ponerLimite.hasClass("wordFound") && !ponerLimite.hasClass("Informada")){
                                        ponerLimite.addClass("Informada");
                                        $("#item7").show();
                                    }

                                }, 1000 );    
                        </script>

                    <hr />

                    <div style="overflow-y: scroll; height: 450px">
                        <div id="item1" style="display: none">
                            <b>Yo puedo:</b> Su coordinación y destreza motora de los niños ha aumentado considerablemente
                            y hay muchas cosas que pueden hacer por sí mismos. Si los dejamos hacer lo que pueden,
                            aunque no lo hagan perfecto, los ayudamos a fortalecer el gusto por la autonomía,
                            practicar y mejorar sus habilidades y aprender a tolerar y solucionar dificultades.
                        </div>
                        <div id="item2" style="display: none">
                            <b>Fortaleza emocional:</b> la prioridad debe ser criar niños y niñas fuertes emocionalmente.
                            Esto significa educarlos de tal forma que puedan ir de a poco aprendiendo a enfrentar frustraciones,
                            a conocer y saber qué hacer con sus emociones e impulsos, a ser capaces de ponerse en el lugar del otro,
                            a tolerar el estrés, a aprender a valorarse, a confiar en sí mismos, a tener esperanza, a saber relacionarse con los demás.
                        </div>
                        <div id="item3" style="display: none">
                            <b>Amigos:</b> Un niño que tiene amigos aprende a relacionarse con sus semejantes y descubre un mundo de alegrías y desafíos.
                            Tener  amigos lo hará sentirse más seguro, más apoyado y más valioso. Facilita esos espacios de socialización para tu niño.
                        </div>
                        <div id="item4" style="display: none">
                            <b>Conflicto:</b> Los conflictos de la amistad empiezan muy pronto. Enseñarles a resolver peleas sin violencia
                            es uno de los objetivos más importantes de la crianza. ¡Qué buena oportunidad para demostrarles que los entendemos,
                            que sabemos cómo se sienten porque también nos hemos sentido así, y para que se sientan apoyados!
                        </div>
                        <div id="item5" style="display: none">
                            <b>Acompañar:</b> Es bueno que los padres jueguen y compartan actividades con sus hijos e hijas como padres, no como amigos.
                            Es imprescindible que respeten el espacio que ocupan los amigos en la vida de los niños.
                        </div>
                        <div id="item6" style="display: none">
                            <b>Agresividad:</b> Son comportamientos habituales en esta etapa, pero no significa que no vamos a actuar.
                            Nuestro mejor aporte es empezar a enseñarles  a los niños, mejores maneras de conseguir lo que quieren,
                            hay que enseñarles a negociar, compartir, tomar turnos.
                        </div>
                        <div id="item7" style="display: none">
                            <b>Poner límites:</b> Es enseñarles qué es lo que está bien y qué es lo que está mal,
                            es enseñarles a cumplir las reglas que ya estableciste, no hace falta estar enojado para esto.
                            Los niños entienden el sentido de las reglas  y aprendan a respetarlas porque las entienden y
                            no por miedo u obediencia ciega y van aprendiendo a desarrollar la capacidad de controlar sus impulsos.
                        </div>
                    </div>

                </div> {{-- card-body no padding --}}

                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/una-manita-5')}}"> <button id="boton" style="display:none" type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                    </div>
                </div>
            </div><!--end .card-body -->

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
{{--@section('addjs')
<script>
        var tl = new TimelineLite();
        avatar = $('.avatar');

         var title = $('.title'),
        logo = $('#logo');
        tl.from(title, 2.5, {left:100, opacity:0});

        //  content = $('.content-card');
        // tl.to(title, 1.5, {y:10});
        // tl.from(card1, .3, {left:100, opacity:0});  
</script>
@endsection  --}} 