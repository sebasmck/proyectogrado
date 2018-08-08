@extends('partials.layout')

@section('title')
Postest 1 
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                    <header>PostTest Pregunta 1</header>
                </div>

                <div class="card-body floating-label">
                    <p><b> 1. ¿Sabes qué es resiliencia? </b></p>
                    <div class="row">
                        <div class="col-sm-6">
                                <div class="col-sm-9">
                                        <label class="radio-inline radio-styled">
                                            <input id="si" type="radio" name="inlineRadioOptions" value="option1"><span>Si</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="inlineRadioOptions" value="option2" id="no"><span>No</span>
                                        </label>
                                    </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                              <div class="col-sm-8" id="casoSi" style="display:none;">
                                    <label for="">
                                            ¿Qué descubriste que era?
                                    </label>
                                    <br><br>
                                    <textarea name="textarea13" id="textarea13" class="form-control" rows="3" placeholder=""></textarea><div class="form-control-line"></div>
                              </div>

                               <div class="col-sm-8" id="casoNo" style="display:none;">
                                    <label for="">
                                            ¿Qué crees que hizo que aprendieras poco sobre la resiliencia?
                                    </label>
                                    <br><br>
                                    <textarea name="textarea13" id="textarea13" class="form-control" rows="3" placeholder=""></textarea><div class="form-control-line"></div>
                              </div>

                            <div class="col-sm-4">
                                <img class="pull-right" src="{{asset('img/avatar.png')}}" alt="avatar">
                            </div>
                    </div>
                    
                </div> {{-- card-body no padding --}}

                    
            </div><!--end .card-body -->

            <div class="card-actionbar">
                    <div class="card-actionbar-row">
                   <!-- <button type="button" onClick="llamar();" >onClick</button> -->
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/posttest2')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                    </div>
              </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
@section('addjs')

<script>

    $("#si").on( "click", function() {
            $('#casoSi').show(); //muestro mediante id
            $('#casoNo').hide();
         });
        $("#no").on( "click", function() {
            $('#casoNo').show(); //oculto mediante id
            $('#casoSi').hide(); //muestro mediante clase
        });

    $(document).ready(function()
    {
        console.log("xd");
    
    });

            var tl = new TimelineLite();
        
            avatar = $('.avatar');
            //  content = $('.content-card');
            // tl.to(title, 1.5, {y:10});
            // tl.from(card1, .3, {left:100, opacity:0});
</script>

@endsection