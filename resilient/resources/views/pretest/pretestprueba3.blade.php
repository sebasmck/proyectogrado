@extends('partials.layout')

@section('title')
Pretest 1
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                    <header>Pretest prueba 3</header>
                </div>

                <div class="card-body floating-label">
                    <p><b>   ¿Qué técnicas disciplinarias utilizas 
                        o crees que utilizarías en la mayoría de 
                        los casos cuando el niños (a) se comporta 
                        de manera inadecuada? Por favor marque cada 
                        una de las técnicas que son utilizadas 
                        (puedes marcar más de una en este puntos).</b></p>
                    <br>

                    <div class="col-sm-6">
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input type="checkbox" value="">
                                    <span>a. Ignorar el comportamiento del niño(a)</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input type="checkbox" value="">
                                    <span>b. Decirle que se siente en una silla</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input type="checkbox" value="">
                                    <span>c. Usar la fuerza con el niño(a)</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input type="checkbox" value="">
                                    <span>d. Mandarlo(a) a la habitación</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input type="checkbox" value="">
                                    <span>e. Retirarle alguna actividad o comida</span>
                                </label>
                            </div>
                            
                    </div>

                    <div class="col-sm-6">
                            <div class="checkbox checkbox-styled">
                                    <label>
                                        <input type="checkbox" value="">
                                        <span>
                                                f. Explicarle porque está mal lo que hace</span>
                                    </label>
                                </div>

                                <div class="checkbox checkbox-styled">
                                        <label>
                                            <input type="checkbox" value="">
                                            <span>g. Utilizar amenazas con el niño(a)</span>
                                        </label>
                                    </div>

                                    <div class="checkbox checkbox-styled">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span>h. Razonar con el niño(a)</span>
                                            </label>
                                        </div>

                                        <div class="checkbox checkbox-styled">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span>i. No utiliza ninguna técnica</span>
                                                </label>
                                            </div>
                    </div>

                    <br><br>
                </div> {{-- card-body no padding --}}



                    
            </div><!--end .card-body -->

            <div class="card-actionbar">
                    <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/pretestprueba4')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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