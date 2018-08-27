@extends('partials.layout')

@section('title')
Pretest 1
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" method="POST" action="{{route('/pretestprueba4')}}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                    <header>Pretest</header>
                </div>

                <div class="card-body floating-label">
                    <p><b>6. ¿Qué técnicas disciplinarias utilizas en la mayoría de los casos cuando tu hijo/a se comporta de manera inadecuada? Por favor marca tres técnicas que utilizas</b></p>
                    <br>

                    <div class="col-sm-6">
                            <div class="checkbox checkbox-styled">
                                  <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('ignorar', '1') !!}<span>a. Ignorar el comportamiento del niño/a y no le dice nada.</span>
                               </label>
                            </div>

                            <div class="checkbox checkbox-styled">
                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('golpear', '1') !!}<span>b. Golpear al niño/a. </span>
                               </label>
                            </div>

                            <div class="checkbox checkbox-styled">

                                  <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('explicarle', '1') !!}<span>c. Explicarle porque está mal lo que hace. </span>
                                 </label>
                            </div>

                            <div class="checkbox checkbox-styled">
                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('amenazar', '1') !!}<span>d. Amenazar al niño/a.</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-styled">

                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('prefiere', '1') !!}<span>e. Prefiere darle libertad en su personalidad.</span>
                                </label>
                            </div>
                            
                    </div>

                    <div class="col-sm-6">
                            <div class="checkbox checkbox-styled">

                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('razonar', '1') !!}<span>f. Razonar con el niño/a.</span>
                                </label>
                            </div>

                                <div class="checkbox checkbox-styled">
                                 
                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('grita', '1') !!}<span>g. Lo grita y le dice que no vuelva hacer eso.</span>
                                </label>
                                    </div>

                                    <div class="checkbox checkbox-styled">
                                    <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('no', '1') !!}<span>h. No utiliza ninguna técnica.</span>
                                   </label>
                                        </div>

                                        <div class="checkbox checkbox-styled">
                                        <label class="checkbox-inline checkbox-styled">
                                           {!! Form::checkbox('reflexionar', '1') !!}<span>i. Hace reflexionar a su hijo/a de su comportamiento.</span>
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