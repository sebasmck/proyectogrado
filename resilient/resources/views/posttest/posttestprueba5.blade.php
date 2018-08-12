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
                    <p><b> Qué beneficios para fomentar la resiliencia puede tener que tu hijo te reconozca como cuidador y confíe en ti, en lugar de confiar en gente extraña.</b></p>
                    <br>

                    <div class="col-sm-9">
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="option1" checked="">
                                    <span>a. Que no se va a ir con otras personas que le pueden hacer daño. </span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="option1">
                                    <span> b. Si confía y me reconoce es porque yo estoy haciendo lo correcto con mi hijo. </span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="option2">
                                    <span>c. Que en un futuro mi hijo podrá confiar en mí y en otros, ya que yo soy quien suple sus necesidades.
                                        </span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="option3">
                                    <span>d. Ningún beneficio, pues si se pierde no va a pedirle ayuda a nadie.  </span>
                                </label>
                            </div>
                    </div>

                   

                    <br><br>
                </div> {{-- card-body no padding --}}



                    
            </div><!--end .card-body -->

            <div class="card-actionbar">
                    <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/posttestprueba6')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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