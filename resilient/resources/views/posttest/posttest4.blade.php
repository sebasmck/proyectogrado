@extends('partials.layout')

@section('title')
Post Test 3
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" method="POST" action="{{route('/posttest5')}}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                    <header>Post Test</header>
                </div>

                <div class="card-body floating-label">
                    <p><b>3. ¿Cuáles elementos crees que conforman la resiliencia? Puedes seleccionar una o varias opciones</b></p>
                    <br>

                    <div class="col-sm-6">
                            <div class="checkbox checkbox-styled">
                               <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('Autoestima', '1') !!}<span>a. Autoestima</span>
                               </label>
                            </div>

                            <div class="checkbox checkbox-styled">
                                <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('Afecto', '1') !!}<span>b. Afecto</span>
                               </label>
                            </div>

                            <div class="checkbox checkbox-styled">
                             <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('Autonomia', '1') !!}<span>c. Autonomia</span>
                             </label>
                            </div>

                            <div class="checkbox checkbox-styled">
                            <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('Reconocimiento', '1') !!}<span>d.Reconocimiento de cuidadores</span>
                             </label>
                            </div>

                            <div class="checkbox checkbox-styled">
                            <label class="checkbox-inline checkbox-styled">
                                    {!! Form::checkbox('Confianza', '1') !!}<span>e. Confianza</span>
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