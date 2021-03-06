@extends('partials.layout')

@section('title')
Creando Confianza 3
@endsection
 <style>
    .linea {
        float: left;
        margin-right:50px;
    }
 </style>   

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" method="POST" action="{{route('/CreandoConfianzaLogros')}}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                   <header> Creando Confianza - Logros Obtenidos </header>
                </div>

                <div class="card-body floating-label">

                  <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;" >
                  <label> <p style="text-align:justify; text-justify: inter-word;">
                  1. ¿Cómo te sentiste la primera vez que dejaste a tu hijo en un centro educativo? 
                  Si no lo has hecho ¿cómo crees que te sentirías?</p></label>
                  </div>

                  <div class="title" >
                    <p style="text-align:center;"> 
                     <img src="{{asset('ActividadCreandoConfianza/Logros.png')}}" alt="Logo" id="logo" width="90%">
                    </p> 
                   </div>  

                    <div class="col-sm-12" >
                            <div class="radio radio-styled" >
                                    
                                <div class="linea col-2" style="margin-left:15%; " >
                                    <label >
                                    <input type="radio" name="optionsRadios" value="1"  required >
                                    <span>a. Alegria  </span></label> 
                                </div>

                                <div class="linea col-2">
                                   <label>
                                       <input type="radio" name="optionsRadios" value="2">
                                       <span>  b. Miedo </span> 
                                   </label>
                               </div>
                               <div class="linea col-2">

                                   <label>
                                       <input type="radio" name="optionsRadios" value="3">
                                       <span>c. Rabia </span> 
                                   </label>
                               </div>

                               <div class="linea col-2">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="4">
                                        <span>d. Tristeza </span> 
                                    </label>
                                    
                                </div> 
                                
                                <div class="linea col-2">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="5">
    
                                        <span>d. Sorpresa </span> 
                                    </label>
                                </div>

                            </div>
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
         var tl = new TimelineLite();
        avatar = $('.avatar');

         var title = $('.title'),
        logo = $('#logo');
        tl.from(title, 2.5, {left:100, opacity:0});
        //  content = $('.content-card');
        // tl.to(title, 1.5, {y:10});
        // tl.from(card1, .3, {left:100, opacity:0});  
</script>
@endsection  