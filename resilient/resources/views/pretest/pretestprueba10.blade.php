@extends('partials.layout')

@section('title')
Pretest 10
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card" method="POST" action="{{route('/pretestprueba11')}}">
        {{csrf_field()}}

                <div class="card-head style-primary">
                    <header>Pretest</header>
                </div>

                <div class="card-body floating-label">
                    <p><b> 13. ¿Cuándo crees que se comienza a desarrollar la confianza?
                        </b></p>
                    <br>

                    <div class="col-sm-9">
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="1" required>
                                    <span>a.   Desde los 10 años.</span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="2">
                                    <span>b.   Desde los 5 años.</span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="3">
                                    <span>
                                            c. Desde los 2 años.
                                        </span>
                                </label>
                            </div>

                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="4">
                                    <span>
                                           d.  Desde el primer día de nacimiento.
                                        </span>
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