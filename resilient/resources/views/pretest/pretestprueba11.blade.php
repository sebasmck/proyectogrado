@extends('partials.layout')

@section('title')
Pretest 10
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                    <header>Pretest prueba 11</header>
                </div>

                <div class="card-body floating-label">
                    <p><b> De las siguientes opciones ¿cuál crees que es la definición correcta de crianza?
                        </b></p>
                    <br>

                    <div class="col-sm-9">
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="option1" checked="">
                                    <span>a. Son las técnicas y creencias que un padre/madre opta para formar a su hijo(a). </span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="option1">
                                    <span>b. Son las creencias, conocimiento y actitudes de un padre/madre hacia la formación de
                                            su hijo(a).</span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="option2">
                                    <span>
                                            c. Es la forma de castigo que opta un padre para corregir y formar a su hija(a).
                                        </span>
                                </label>
                            </div>

                            <div class="radio radio-styled">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="option2">
                                        <span>
                                                d. Son los valores que un padre/madre transmite a su hijo(a) para guiarlo de forma
adecuada.
                                            </span>
                                    </label>
                                </div>
                            
                    </div>

                   

                    <br><br>
                </div> {{-- card-body no padding --}}



                    
            </div><!--end .card-body -->

            <div class="card-actionbar">
                    <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/pretestprueba11')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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