@extends('partials.layout')

@section('title')
Post Test Final
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                    <header>Post Test - Preguntas De Cierre</header>
                </div>

                <div class="card-body floating-label"> 
                <p style="text-align:center; text-justify: inter-word;">
                     Vamos a ver qué tanto aprendiste durante este tiempo con nosotros. A continuación, encontrarás las actividades 
                     sueltas y tendrás que arrastrarlas hasta la casilla que le corresponda.
                </p>

               </div>
                            
               </div>
                          
                    <br><br>
                </div> {{-- card-body no padding --}}  

            </div><!--end .card-body -->

            <div class="card-actionbar">
                    <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/preguntascierreposttest1')}}" > <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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