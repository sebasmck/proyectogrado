@extends('partials.layout')

@section('title')
Pretest 12
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" method="POST" action="{{route('/respuestaposttest')}}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                    <header>Post Test</header>
                </div>

                <div class="card-body floating-label">
                    <p><b> A continuación, encontrarás unas preguntas de falso y verdadero, responde la que creas que es la correcta:
                        </b></p>
                    <br>

                    <div class="col-sm-9">
                    <div class="row">

<div class="card-body no-padding">

     {{--  <form name="comportamientos" id="comportamientos">  --}}

<ul class="list">
  <li class="tile">
    <a class="tile-content ink-reaction">
      {!! Form::select('pregunta15', [
        '0' => 'falso',
        '1' => 'verdadero',
       ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}

      <div class="tile-text">
        <small>
         <b>15.</b> La crianza implica tres procesos psicosociales: las pautas de crianza, las prácticas de
crianza y las creencias acerca de la crianza.
       </small>
     </div>

   </a>
 </li>
 <li class="divider-full-bleed"></li>

 <li class="tile">
      <a class="tile-content ink-reaction">
        {!! Form::select('pregunta16', [
          '0' => 'falso',
        '1' => 'verdadero',
         ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}

        <div class="tile-text">
          <small>
           <b>16.</b> Las pautas de crianza, se definen como las acciones y comportamientos de los padres
           dirigidas a guiar las conductas de los niños/as con el objetivo de que aprendan por
           medio de educación o por imitación.
         </small>
       </div>

     </a>
   </li>
   <li class="divider-full-bleed"></li>

   <li class="tile">
          <a class="tile-content ink-reaction">
            {!! Form::select('pregunta17', [
              '0' => 'falso',
              '1' => 'verdadero',
             ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}

            <div class="tile-text">
              <small>
               <b>17.</b> Las creencias acerca de la crianza se definen como el conocimiento sobre cómo se
debe criar un niño/a y a las explicaciones que brindan los padres frente a la forma como
estas causan las acciones de sus hijos
             </small>
           </div>

         </a>
       </li>
  <li class="divider-full-bleed"></li>
</ul>
</div>
                  
          </div>

          <br><br>
      </div> {{-- card-body no padding --}}



                    
            </div><!--end .card-body -->

            <div class="card-actionbar">
                    <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" > <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Finalizar</button></a>
                    </div>
              </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection

{{--  @section('addjs')

<script>

        var tl = new TimelineLite();
    
         avatar = $('.avatar');
        //  content = $('.content-card');



        
        // tl.to(title, 1.5, {y:10});
        // tl.from(card1, .3, {left:100, opacity:0});
        
    
    </script>

@endsection  --}}