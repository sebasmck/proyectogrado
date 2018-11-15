@extends('partials.layout')

@section('title')
Post Test Cierre 1 
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" method="POST" action="{{route('/preguntascierreposttest2')}}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                <header> Post Test - Preguntas De Cierre  </header>
                </div>

                <div class="card-body floating-label">
                    <p style="text-align:center; text-justify: inter-word;">
                        Frente a todo lo desarrollado y la participación de cada sesión, ¿qué tan satisfecho se siente
                        frente al programa, su contenido, sus actividades y recursos? Teniendo en cuenta que 1 es
                        insatisfecho y 5 es satisfecho
                    </p> 

                    <div style="margin-left:10%;" class="row">
                        <br>
                   
                        <div class="col-sm-2">
                         <input type="radio" id="a" name="myCheckbox1" required value="1"/>
                         <label for="a"><img src="{{asset('posttest/Calificacion1.jpg')}}" /></label>
                        <!--<img src="{{asset('posttest/Calificacion1.jpg')}}" alt="">-->
                        <br> </div>

                         <div class="col-sm-2" >
                         <input type="radio" id="b" name="myCheckbox1" value="2"/>
                         <label for="b"><img src="{{asset('posttest/Calificacion2.jpg')}}" /></label>
                        <!--<img src="{{asset('posttest/Calificacion2.jpg')}}" alt=""> --> 
                        </div>

                         <div class="col-sm-2">
                          <input type="radio" id="c" name="myCheckbox1" value="3"/>
                          <label for="c"><img src="{{asset('posttest/Calificacion3.jpg')}}" /></label>
                         <!--<img src="{{asset('posttest/Calificacion3.jpg')}}" alt="">--> 
                        </div>

                         <div class="col-sm-2">
                        <input type="radio" id="d" name="myCheckbox1" value="4"/>
                         <label for="d"><img src="{{asset('posttest/Calificacion4.jpg')}}" /></label>
                        <!--<img src="{{asset('posttest/Calificacion4.jpg')}}" alt="">--> 
                        </div>    

                         <div class="col-sm-2">
                        <input type="radio" id="e" name="myCheckbox1" value="5"/>
                         <label for="e"><img src="{{asset('posttest/Calificacion5.jpg')}}" /></label>
                        <!--<img src="{{asset('posttest/Calificacion5.jpg')}}" alt="">--> 
                        </div>
     
                    </div>

                    <br><br>

                    <div class="col-sm-11">
                           <p style="text-align:left; text-justify: inter-word;">
                                    Respecto a todo lo desarrollado a lo largo del programa, ¿qué sugerencias/comentarios tienes en
                                    cuanto al contenido y todo lo alcanzado durante todas las sesiones?
                            </p>
                                    <br>
                                    <textarea name="textarea13" id="textarea13" class="form-control" rows="3" placeholder="" required style="border:solid 1px blue;" required></textarea><div class="form-control-line"></div>
                    </div>


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

@section('addjs')

<script>

    preventDoubleSubmit();

</script>

@endsection