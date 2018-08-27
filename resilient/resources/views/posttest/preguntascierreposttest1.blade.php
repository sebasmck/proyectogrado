@extends('partials.layout')

@section('title')
Post Test Cierre 1 
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                <header> Post Test - Preguntas De Cierre 1 </header>
                </div>

                <div class="card-body floating-label">
                    <p style="text-align:center; text-justify: inter-word;">
                        Frente a todo lo desarrollado y la participación de cada sesión, ¿qué tan satisfecho se siente
                        frente al programa, su contenido, sus actividades y recursos? Teniendo en cuenta que 1 es
                        insatisfecho y 5 es satisfecho
                    </p> 

                     <div style="margin-left:10%;" class="row">
                        <br>

                        <div class="col-sm-2"><img src="{{asset('posttest/Calificacion1.jpg')}}" alt=""><br> </div>
                        <div class="col-sm-2"><img src="{{asset('posttest/Calificacion2.jpg')}}" alt=""></div>
                        <div class="col-sm-2"><img src="{{asset('posttest/Calificacion3.jpg')}}" alt=""></div>
                        <div class="col-sm-2"><img src="{{asset('posttest/Calificacion4.jpg')}}" alt=""> </div>      
                        <div class="col-sm-2"><img src="{{asset('posttest/Calificacion5.jpg')}}" alt=""></div>
     
                    </div>

                    <br><br>

                    <div class="col-sm-8" >
                                    <label for="">
                                    Respecto a todo lo desarrollado a lo largo del programa, ¿qué sugerencias/comentarios tienes en
                                    cuanto al contenido y todo lo alcanzado durante todas las sesiones?
                                    </label>
                                    <br>
                                    <textarea name="textarea13" id="textarea13" class="form-control" rows="3" placeholder="" required style="border:solid 1px blue;"></textarea><div class="form-control-line"></div>
                    </div>


                </div> {{-- card-body no padding --}}

                    
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" > <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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