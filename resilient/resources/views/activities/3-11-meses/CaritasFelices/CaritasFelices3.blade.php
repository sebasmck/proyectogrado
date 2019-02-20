@extends('partials.layout')

@section('title')
Caritas Felices
@endsection
<style>

        .activities{
            width: 600px;
            margin-top: 10px;
        }
    
    </style>
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Caritas Felices - Encuentra la pareja correcta  </header>
                </div>

              <div class="card-body floating-label">
                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        <b>Instrucción:</b> Escribe una  situación que te despierte cada 
                        emoción e identifica en que parte de tu cuerpo se siente y de qué manera.
                    </p>      
                   </div>
                     
                   <div class="row">
                        <ul>
                            <li>
                               <label>Felicidad</label>  <input class="activities" type="text">
                            </li>
                            <li>
                                <label> Parte del cuerpo donde lo siento</label> <input class="activities" type="text">
                            </li>

                            <li>
                              <label> Tristeza</label> <input class="activities" type="text">
                            </li>
                            <li>
                                <label>Parte del cuerpo donde lo siento</label> <input class="activities" type="text">
                            </li>
                            
                            <li>
                                <label>Miedo</label> <input class="activities" type="text">
                            </li>
                                
                            <li>
                                <label> Parte del cuerpo donde lo siento</label> <input class="activities" type="text">
                            </li>

                            <li>
                                <label>Sorpresa</label> <input class="activities" type="text">
                            </li>
                        
                            <li>
                                <label>Parte del cuerpo donde lo siento</label>  <input class="activities" type="text">
                            </li>  
                            
                            <li>
                                <label>Asco</label><input class="activities" type="text">
                                </li>
                            
                                <li>
                                    <label>Parte del cuerpo donde lo siento</label>  <input class="activities" type="text">
                                </li> 

                                <li>
                                    <label> Ira</label> <input class="activities" type="text">
                                    </li>
                                
                                    <li>
                                        <label>Parte del cuerpo donde lo siento</label>  <input class="activities" type="text">
                                    </li>    

                        </ul>
                    </div>


             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                      <button type="button" class="btn btn-default ink-reaction btn-primary-dark" onclick="guardarRespuestaConcatenadaPorInputsyHermanos(1)">Siguiente</button>
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/CaritasFelices4')}}"> </a>
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