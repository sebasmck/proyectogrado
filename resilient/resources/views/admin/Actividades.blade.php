@extends('partials.layout')

@section('title')
Home

@endsection

@section('content')
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="title animated lightSpeedIn" style="font-family: 'Raleway', sans-serif; font-size: 40px;" >
                Actividades
            </div>
            
            <div style="margin-top: 50px;" class="card">
                <div  class="card-body">

                  <!--  <video autobuffer autoloop loop controls>
                        <source src="/media/video.oga">
                        <object type="video/ogg" data="/media/video.oga" width="320" height="240">
                        <param name="src" value="/media/video.oga">
                        <param name="autoplay" value="false">
                        <param name="autoStart" value="0">
                        <p><a href="/media/video.oga">Download this video file.</a></p>
                        </object>
                    </video>
                        -->
                    <div class="col-md-2 col-xs-6"></div>
                    <div class="col-md-8 col-xs-6">
                        <iframe  width="700" height="400"  src="https://www.youtube.com/embed/DAkLbUwoqMo" allowfullscreen>
                        
                        </iframe>   
                    </div>
                     <div class="col-md-2 col-xs-6"></div>
                    </div>
              <!--  <div  class="card-body">
                    <div class="col-md-3 col-xs-6">
                        <div class="card card1">
                        <a href="/home"><div class="card-body small-padding style-primary-dark text-center">Perfil</div></a>
                        </div>
                        <br><br>
                        <div class="card card2">
                            <a href="{{route('/users')}}"><div class="card-body small-padding style-primary text-center">Usuarios</div></a>
                        </div>
                        <br><br>
                        <div class="card card3">
                           <a href=""> <div class="card-body small-padding style-primary-light text-center">Reportes</div></a>
                        </div>
                        <br><br>
                        <div class="card card4">
                           <a href=""> <div class="card-body small-padding style-primary-bright text-center">Estadisticas</div> </a>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card content-card">
                            <div class="card-body" style=" height: 400px;">
                                
                               
                            </div>
                        </div>
                    </div>

                </div> -->
                </div> 
            </div>
        </div>
    </div>
</div>

@endsection

