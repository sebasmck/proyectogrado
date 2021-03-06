@extends('partials.layout')

@section('title')
Home
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 40px;" >
                Bienvenido
            </div>
            
            <div class="card">
                <div  class="card-body">
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
                                
                                <div class="col-md-5">
                                    <img src="{{ asset('img/profilepic.jpg') }}" style="width: 180px; margin-top: 70px; height: auto; vertical-align: center; border-radius: 100px;" alt="">
                                </div>
                                <div class="col-md-5" style="margin-top: 70px;">
                                    <h4>Nombre: {{ auth()->user()->name }}</h4> <br>
                                    <h4>Correo: {{ auth()->user()->email }}</h4><br>
                                    <h4>Usuario desde: {{ auth()->user()->created_at }} </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('addjs')

<script>

    var tl = new TimelineLite();

    var title = $('.title'),
     card1 = $('.card1'),
     card2 = $('.card2'),
     card3 = $('.card3'),
     card4 = $('.card4'),
     content = $('.content-card');


    tl.to(title, 1.5, {y:10});
    tl.from(card1, .3, {left:100, opacity:0});
    tl.from(card2, .3, {left:100, opacity:0});
    tl.from(card3, .3, {left:100, opacity:0});
    tl.from(card4, .3, {left:100, opacity:0});
    tl.from(content, .3, {left:100, opacity:0});

</script>

@endsection
