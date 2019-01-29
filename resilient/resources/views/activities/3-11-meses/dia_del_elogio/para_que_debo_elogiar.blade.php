@extends('partials.layout')

@section('title')
    ¿Para qué debo elogiar a mi niño?
@endsection

@section('addcss')
    <style type="text/css">

        .label-image {
            position: absolute;
            width: 200px;
            display: inline;
            left: 80px;
            margin-top: -200px;
            text-justify: distribute-all-lines;
            text-align: center;
            z-index: 1;
        }

        .image-ajust {
            width: 330px;
            height: 280px;
            z-index: -1;
        }

        .floating-div {
            position: absolute;
            display: none;
        }

    </style>
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
            <div class="card-head style-accent-dark">
                <header>¿Para qué debo elogiar a mi niño?</header>
            </div>

            <div class="card-body" style="height: 570px">

                <p>El elogio es una técnica sencilla que siempre vas a tener a la mano y no representa ningún costo. </p>

                <div style="text-align: center">
                    <img  src="{{ asset('ActividadDiaDelElogio/001_elogio_a_mi_nino.png') }}" width="500px" height="360px" />
                </div>
                <div id="elogio-1" class="floating-div" style="top: 35px; left: -80px">
                    <img src="{{ asset('ActividadDiaDelElogio/002_corazon.png') }}" class="image-ajust" />
                    <p class="label-image"> El elogio motiva a tu niño a terminar la tarea encomendada o a enfrentarse a una nueva por difícil que parezca. </p>
                </div>
                <div id="elogio-2" class="floating-div" style="top: 280px; left: -50px">
                    <img src="{{ asset('ActividadDiaDelElogio/003_corazon_lleno.png') }}" class="image-ajust" />
                    <p class="label-image">Ayuda a incorporar un nuevo hábito o a que se presenten con mayor frecuencia conductas que a ti te gustan.</p>
                </div>
                <div id="elogio-3" class="floating-div" style="top: 430px; left: 200px;">
                    <img src="{{ asset('ActividadDiaDelElogio/002_corazon.png') }}" class="image-ajust" />
                    <p class="label-image"> El elogio fortalece la autoestima en tu niño, si tu como cuidador le reconoces sus logros el empezará a reconocer lo bueno que es en ello.</p>
                </div>
                <div id="elogio-4" class="floating-div" style="top: 440px; left: 530px">
                    <img src="{{ asset('ActividadDiaDelElogio/003_corazon_lleno.png') }}" class="image-ajust" />
                    <p class="label-image"> Tu niño aprenderá a elogiar a otros niños y ello le ayudará a fortalecer vínculos con sus pares.</p>
                </div>
                <div id="elogio-5" class="floating-div" style="top: 35px; left: 850px">
                    <img src="{{ asset('ActividadDiaDelElogio/002_corazon.png') }}" class="image-ajust" />
                    <p class="label-image">  Fortalecerá la confianza entre ustedes ¡Imagínate que él te presente cada trabajo que realice!</p>
                </div>
                <div id="elogio-6" class="floating-div" style="top: 280px; left: 850px">
                    <img src="{{ asset('ActividadDiaDelElogio/003_corazon_lleno.png') }}" class="image-ajust" />
                    <p class="label-image">  Después de elogiar constantemente a tu niño, la conducta de usar palabras motivadoras por sus logros se convierte en un hábito para ti y te va saliendo espontáneamente.</p>
                </div>

            </div>

                <div class="card-foot" style="padding: 35px">
                    <div style="text-align: left; display: inline">
                        <a href="https://www.freepik.es/fotos-vectores-gratis/corazon">Vector de corazón creado por rocketpixel - www.freepik.es</a>
                    </div>
                    <div id="nextStep" style="text-align: right; display: none">
                        <a href="{{ route('/dia-del-elogio-4') }}"><button class="btn style-accent-light">Aquí vamos!</button></a>
                    </div>
                </div>
        </div>
    </div>


@endsection

@section('addjs')
    <script type="text/javascript">

        function showContent() {
            for(var i = 1; i < 7; i++){
               var elogio = $("#elogio-"+i);
                showElogio( elogio, (i*3000));
            }

            setTimeout(function () {
                var nextStep = $("#nextStep");
                nextStep.fadeIn(3000);
            }, 20000);
        }

        function showElogio(elogio, time){
            setTimeout(function () {
                elogio.fadeIn(3000);
            },time);
        }

        showContent();
    </script>
@endsection