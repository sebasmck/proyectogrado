@extends('partials.layout')

@section('title')
Cuestionario 3
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                    <header>Pretest 3</header>
                </div>

                <div class="card-body floating-label">
                    <p><b>  Haz clic en los globos, y
                         selecciona cuáles elementos crees que conforman la resiliencia</b></p>
                    <br>
                    <div style="margin-left:10%;" class="row">
                        <br>
                        <div class="col-sm-2"><img src="{{asset('pretest/globo1.png')}}" alt=""><br>
                            <p style="margin-left: 20%;" >Autoestima </p> </div>
                        <div class="col-sm-2"><img src="{{asset('pretest/globo2.png')}}" alt="">
                            <p style="margin-left: 20%;" >Afecto </p></div>
                        <div class="col-sm-2"><img src="{{asset('pretest/globo3.png')}}" alt="">
                            <p style="margin-left: 20%;" >Autonomía </p></div>
                        <div class="col-sm-2"><img src="{{asset('pretest/globo4.png')}}" alt="">
                            <p style="margin-left: 20%;" >Reconocimiento </p></div>            
                            <div class="col-sm-2"><img src="{{asset('pretest/globo5.png')}}" alt="">
                                <p style="margin-left: 20%;" >Confianza </p></div>            
                    </div>
                    <br><br>
                    <center>
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/pretestprueba')}}"> <button type="button" class="btn btn-default ink-reaction btn-info">Verificar Respuesta</button></a>
                    </center>
                </div> {{-- card-body no padding --}}



                    
            </div><!--end .card-body -->

            <div class="card-actionbar">
                    <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/pretestprueba1')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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