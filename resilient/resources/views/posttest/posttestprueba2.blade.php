@extends('partials.layout')

@section('title')
Post Test 1
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" method="POST" action="{{route('/posttestprueba3')}}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                    <header>Post Test</header>
                </div>

                <div class="card-body floating-label">
                    <p><b>5. ¿Cómo crees que una buena relación entre el cuidador y el niño/a aportaría en el desarrollo de la resiliencia del menor?</b></p>
                    <br>

                    <div class="col-sm-9">
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="1"  required >
                                    <span>a. En que fomenta la confianza que tiene en sus capacidades y en los otros, permitiéndole apoyarse en ellos para pasar situaciones difíciles.  </span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="2">
                                    <span> b.   Permitiendo mediante esa relación, que el niño/a aprenda capacidades que después le aportarán a superar dificultades.  </span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="3">
                                    <span>c. Mejorando el concepto que el niño/a tiene de sí mismo.</span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="4">
                                    <span>d. Todas las anteriores. </span>
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

@section('addjs')

<script>

    preventDoubleSubmit();

</script>

@endsection