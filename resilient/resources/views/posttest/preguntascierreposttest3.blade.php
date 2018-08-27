@extends('partials.layout')

@section('title')
Post Test Cierre 3 
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                <header> Post Test - Preguntas De Cierre 3 </header>
                </div>

                <div class="card-body floating-label">
                    <p style="text-align:left; text-justify: inter-word;">
                       ¿Crees que aprendiste a lo largo del programa?
                    </p> 
                     <div style="margin-left:10%;" class="row">
                        <br>
                        <div class="col-sm-2"><img src="{{asset('posttest/si.png')}}" alt=""><br> </div>
                        <div class="col-sm-2"><img src="{{asset('posttest/no.png')}}" alt=""></div>

                        <div class="col-sm-8" >
                                    <label for="">
                                    ¿POR QUÉ? 
                                    </label>
                                    <br>
                                    <textarea name="textarea13" id="textarea13" class="form-control" rows="3" placeholder="" required style="border:solid 1px blue;"></textarea><div class="form-control-line"></div>
                        </div>    
            
                    </div>
                    
                    </div>

                    <br>

        <div class="card-body floating-label">
           <p style="text-align: left; text-justify: inter-word;">
            ¿Recomendarías este programa a otros padres?
           </p> 
        <div style="margin-left:10%;" class="row">
           <br>
                <div class="col-sm-2"><img src="{{asset('posttest/si.png')}}" alt=""><br> </div>
                <div class="col-sm-2"><img src="{{asset('posttest/no.png')}}" alt=""></div>
             <div class="col-sm-8" >
                <label for="">
                ¿POR QUÉ? 
                </label>
                <br>
                <textarea name="textarea2" id="textarea2" class="form-control" rows="3" placeholder="" required style="border:solid 1px blue;"></textarea><div class="form-control-line"></div>
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