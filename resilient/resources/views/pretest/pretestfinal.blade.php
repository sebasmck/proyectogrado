@extends('partials.layout')

@section('title')
Pretest Final
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" action="{{ route("/pretestcompletado") }}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                    <header>Pretest</header>
                </div>

                <div class="card-body floating-label"> 

                    <div  style="font-family: 'Raleway', sans-serif; font-size: 24px;color:blue;">
                        <p style="text-align:center; text-justify: inter-word;">
                             <b>Has finalizado el pre test</b></p>
                      </div> 
                      <div  style="font-family: 'Raleway', sans-serif; font-size: 16px;color:black;">
                            <p style="text-align:center; text-justify: inter-word;">
                                 <b>da clic en finalizar para continuar</b></p>
    
                          </div> 
               </div>
                            
                    </div>
                          
                    <br><br>
                </div> {{-- card-body no padding --}}
    

            <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        <button class="btn btn-default ink-reaction btn-primary-dark">Finalizar</button>
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