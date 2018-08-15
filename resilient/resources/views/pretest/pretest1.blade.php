@extends('partials.layout')

@section('title')
Cuestionario 1
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" method="POST" action="{{route('/pretest2')}}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                    <header>Bienvenido al modulo pretest</header>
                </div>

                <div class="card-body floating-label">
                    <p><b> 1. ¿Sabes qué es resiliencia? </b></p>
                    <div class="row">
                        <div class="col-sm-6">
                                <div class="col-sm-9">
                                        <label class="radio-inline radio-styled">
                                            <input id="si" type="radio" name="opcion" value="1" checked ="true" required="true"><span>Si</span>
                                        </label>

                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="opcion" value="2" id="no"><span>No</span>
                                        </label>
                                    </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-sm-8"  id="casoSi" style="display:none;">
                                    <label for="" >
                                           Cuéntanos qué entiendes por resiliencia
                                    </label>
                                    <br><br>
                                   
                                    <textarea name="textarea1" id="textarea" class="form-control" rows="3" placeholder=""></textarea><div class="form-control-line"></div>
                               </div> 

                                   <div class="col-sm-8" id="casoNo" style="display:none;">
                                    <label for="">
                                         De acuerdo, ¿Qué crees o entiendes de este término?
                                    </label>
                                    <br><br>
                                    <textarea name="textarea2" id="textarea2" class="form-control" rows="3" placeholder=""></textarea><div class="form-control-line"></div>
                              </div>
                                 

                            </div>
                            
                </div> {{-- card-body no padding --}}

                     <div class="col-sm-4">
                                <img class="pull-right" src="{{asset('img/avatar.png')}}" alt="avatar">
                            </div>
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

         $("#si").on( "click", function() {
            $('#casoSi').show(); //muestro mediante id
            $('#casoNo').hide();
         });
        $("#no").on( "click", function() {
            $('#casoNo').show(); //oculto mediante id
            $('#casoSi').hide(); //muestro mediante clase
        });

        var tl = new TimelineLite();
    
         avatar = $('.avatar');
        //  content = $('.content-card');



        
        // tl.to(title, 1.5, {y:10});
        // tl.from(card1, .3, {left:100, opacity:0});
        
    
    </script>

@endsection  