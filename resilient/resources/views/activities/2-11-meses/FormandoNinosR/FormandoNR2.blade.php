@extends('partials.layout')

@section('title')
Formando NR 
@endsection
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}"> 
<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<script type="text/javascript" src="{{ URL::asset('js/wordfind.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('js/wordfindgame.js')}}"></script> 

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div id="h" class="card-head style-primary">
                   <header> FORMANDO NIÑOS RESILIENTES - Sopa de letras de “Caparazón de la Resiliencia” </header>
                </div>

                <div id="algo "class="card-body floating-label">
                <div  id ="algo2" class="title" style="font-family: 'Raleway', sans-serif;" > 
                       <p style="text-align:left; text-justify: inter-word;">Para afianzar tus conocimientos debes realizar la actividad 
                        que veras a continuación. Para ello debes encontrar en la sopa de letras las cinco palabras que permitirán 
                           la creación de un caparazón para el fomento de la resiliencia en tu niño.  </p>  
                 </div>
              

                 <div id='puzzle'></div>
                 <div id='words'></div>
                  
                        <script>
                                var words = ['AFECTO', 'EDUCACION', 'AUTONOMIA', 'CONFIANZA', 'SOCIALIZACION'];
                                // start a word find game
                                var gamePuzzle = wordfindgame.create(words, '#puzzle', '#words');
                                // create just a puzzle, without filling in the blanks and print to console
                                var puzzle = wordfind.newPuzzle(
                                  words, 
                                  {height: 18, width:18, fillBlanks: false} );
                                wordfind.print(puzzle);      
                        </script>
                  

               
                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->
            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/FormandoNR3')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

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