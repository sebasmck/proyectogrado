@extends('partials.layout')

@section('title')
Pretest 4
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                    <header>Post Test</header>
                </div>

                <div class="card-body floating-label">
                    <p><b>  ¿Qué cosas crees que como padres se puede hacer para desarrollar la autonomía de un niño/a?
                        </b></p>
                    <br>

                    <div class="col-sm-9">
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input type="checkbox" value="">
                                    <span>a.  Pidiéndole al niño/as que haga todas las labores de casa y de escuela solo. </span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input type="checkbox" value="">
                                    <span>b.  No dejando salir al niño/a, para protegerlo de los peligros que hay afuera. </span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input type="checkbox">
                                    <span>c.  Dándole herramientas al niño/as para que experimente los alrededores. </span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input type="checkbox">
                                    <span>d. Enseñando herramientas para que ejecute tareas correspondientes para su edad. </span>
                                </label>
                            </div>
                        </div>

                   

                    <br><br>
                </div> {{-- card-body no padding --}}



                    
            </div><!--end .card-body -->

            <div class="card-actionbar">
                    <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/posttestprueba9')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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