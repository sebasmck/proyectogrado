@extends('partials.layout')

@section('title')
Home
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 40px;" >
                Bienvenido Cuidador 
            </div>
            
            <div class='card' >
                <div  class="card-body">

                    <div class="row"> 

                             <div class="col-md-6">
                                <div class="card ">

                                 <a href="/lista-actividades/{{ $infante }}">
                                    <div class="card-body small-padding text-center" style="height: 350px">
                                        <img style="width:100%;height:300px" src="{{ asset('img/libros.jpg') }}" alt="">Ir A Actividades
                                    </div>
                                </a>
                                </div>
                            </div>

                           <!-- <div class="col-md-6">
                             <div class="card ">
                              <a href="{{ route('/cuidador-infantes') }}"><div class="card-body small-padding text-center ">
                               <img style="width:100%;height:300px" src="{{ asset('img/libros.jpg') }}" alt="">
                                 My BOOK
                               </div>
                              </a>
                           </div> -->
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
