@extends('partials.layout')

@section('title')
Pretest 4
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" method="POST" action="{{route('/pretestprueba8')}}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                    <header>Pretest</header>
                </div>

                <div class="card-body floating-label">
                    <p><b>10. ¿Crees que fomentar la autonomía de un niño/a aporta a que sea más resiliente?
                        </b></p>
                    <br>

                    <div class="col-sm-9">
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="1" required>
                                    <span>Si, por que le permite adquirir herramientas para afrontar sus problemas y tomar decisiones a futuro.</span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="2">
                                    <span> b. No, porque ya no va a pedir ayuda para afrontar su problema y se quedara solo.</span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="3">
                                    <span>c. Sí, porque hará que adquiera herramientas para hacer todas las cosas solo, sin depender de sus padres, ni amigos. 
                                        </span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="4">
                                    <span>d. No, ya que un niño/a autónomo tiene mayor probabilidad de revelarse a los límites del hogar, y generar mayores dificultades. </span>
                                </label>
                            </div>
                    </div>

                   

                    <br><br>
                </div> {{-- card-body no padding --}}



                    
            </div><!--end .card-body -->

            <div class="card-actionbar">
                    <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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