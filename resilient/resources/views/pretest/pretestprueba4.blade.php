@extends('partials.layout')

@section('title')
Pretest 4
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                    <header>Pretest</header>
                </div>

                <div class="card-body floating-label">
                    <p><b> De las siguientes opciones 
                        ¿Cuáles crees que puede mejorar 
                        la relación con el niño(a)?</b></p>
                    <br>

                    <div class="col-sm-9">
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="option1" checked="">
                                    <span>a. Corregir por medio de la prohibición de salidas y otras cosas cuando se porten mal, pues así crecen con buenos valores.</span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="option1">
                                    <span> b. Colocando reglas y límites claros, horarios que puedan seguir y que además les ayuden a fomentar el orden.</span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="option2">
                                    <span>c. Realizando actividades diarias mediante el juego que me permitan conocer mejor a mi hijo(a), así como él a mí.
                                        </span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="option3">
                                    <span>d. Amenazándolo(a) cuando se comporta de manera inadecuada y retirarle el afecto.</span>
                                </label>
                            </div>
                    </div>

                   

                    <br><br>
                </div> {{-- card-body no padding --}}



                    
            </div><!--end .card-body -->

            <div class="card-actionbar">
                    <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/pretestprueba5')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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