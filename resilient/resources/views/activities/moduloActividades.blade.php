@extends('partials.layout')

@section('title')
    Actividades
@endsection

@section('addcss')
    <style>
        @-webkit-keyframes eyes {
            0%,
            8.8888888889%,
            100% {
                top: -50px;
            }
            17.7777777778% {
                top: -45px;
            }
            91.1111111111% {
                top: -20px;
            }
            57.7777777778%,
            88.8888888889% {
                top: -15px;
            }
            66.6666666667% {
                top: -25px;
            }
        }
        @keyframes eyes {
            0%,
            8.8888888889%,
            100% {
                top: -50px;
            }
            17.7777777778% {
                top: -45px;
            }
            91.1111111111% {
                top: -20px;
            }
            57.7777777778%,
            88.8888888889% {
                top: -15px;
            }
            66.6666666667% {
                top: -25px;
            }
        }
        @-webkit-keyframes wings {
            0%,
            88.8888888889%,
            100% {
                top: 70px;
            }
            91.1111111111% {
                top: 60px;
            }
        }
        @keyframes wings {
            0%,
            88.8888888889%,
            100% {
                top: 70px;
            }
            91.1111111111% {
                top: 60px;
            }
        }
        @-webkit-keyframes feet {
            0%,
            88.8888888889%,
            100% {
                top: -2px;
            }
            91.1111111111% {
                top: 0px;
            }
        }
        @keyframes feet {
            0%,
            88.8888888889%,
            100% {
                top: -2px;
            }
            91.1111111111% {
                top: 0px;
            }
        }
        @-webkit-keyframes cloud {
            0% {
                left: -140px;
            }
            100% {
                left: 280px;
            }
        }
        @keyframes cloud {
            0% {
                left: -140px;
            }
            100% {
                left: 280px;
            }
        }

        a {
            color: #aaa;
        }

        .globe {
            margin: 1em 0 0 0;
            position: relative;
            display: inline-block;
            text-align: left;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            border: 20px solid black;
            box-sizing: border-box;
            background: linear-gradient(to bottom, #86aecc 0%, #d4e4ef 100%);
            overflow: hidden;
            box-shadow: inset 0 0 80px rgba(0, 0, 0, 0.5), 0 0 20px rgba(0, 0, 0, 0.3);
        }
        .globe:before, .globe:after {
            position: absolute;
            content: "";
            box-sizing: border-box;
            border-radius: 50%;
            z-index: 10;
        }
        .globe:before {
            height: 94%;
            width: 94%;
            top: 3%;
            right: 3%;
            border: 10px solid transparent;
            border-right-color: rgba(255, 255, 255, 0.3);
            border-right-width: 10px;
            border-right-style: solid;
        }
        .globe:after {
            top: 50px;
            right: 65px;
            width: 10px;
            height: 10px;
            background: rgba(255, 255, 255, 0.3);
        }
        .globe .bird {
            position: absolute;
            z-index: 1;
            left: 96px;
            top: 100px;
        }
        .globe .bird .body {
            position: absolute;
            width: 175px;
            height: 186px;
            border-radius: 50%;
            background-clip: padding-box;
            background-color: #4d2b89;
            box-shadow: inset 0 0 80px rgba(0, 0, 0, 0.3);
        }
        .globe .bird .body:before, .globe .bird .body:after {
            position: absolute;
            content: "";
            z-index: -1;
            width: 26px;
            height: 93px;
            border-radius: 50%;
            background-color: #4d2b89;
            box-shadow: inset 0 0 13px rgba(0, 0, 0, 0.3);
            top: 70px;
            -webkit-animation: wings 4.5s linear infinite;
            animation: wings 4.5s linear infinite;
        }
        .globe .bird .body:before {
            left: 0;
        }
        .globe .bird .body:after {
            right: 0;
        }
        .globe .bird .body .eye {
            position: absolute;
            z-index: 1;
            overflow: hidden;
            width: 56px;
            height: 56px;
            top: 28px;
            border-radius: 50%;
            background-color: #fff;
            border: 1px solid #4d2b89;
            box-shadow: inset 0 0 0 1px #4d2b89;
        }
        .globe .bird .body .eye:before, .globe .bird .body .eye:after {
            position: absolute;
            content: "";
        }
        .globe .bird .body .eye:before {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background-color: #000;
            top: 30px;
        }
        .globe .bird .body .eye:after {
            width: 200px;
            height: 200px;
            background: radial-gradient(ellipse at center, rgba(109, 0, 25, 0) 0%, rgba(130, 1, 31, 0) 35%, #4d2b89 36%, #4d2b89 100%);
            -webkit-animation: eyes 4.5s linear infinite;
            animation: eyes 4.5s linear infinite;
        }
        .globe .bird .body .eye.left {
            left: 15px;
        }
        .globe .bird .body .eye.left:before {
            left: 20px;
        }
        .globe .bird .body .eye.left:after {
            left: -60px;
            top: -45px;
        }
        .globe .bird .body .eye.right {
            right: 15px;
        }
        .globe .bird .body .eye.right:before {
            right: 20px;
        }
        .globe .bird .body .eye.right:after {
            right: -60px;
            top: -45px;
        }
        .globe .bird .body .beak {
            position: absolute;
            z-index: 1;
            width: 41px;
            height: 55px;
            top: 70px;
            left: 67px;
            border-radius: 50%;
            background-color: #4d2b89;
        }
        .globe .bird .body .beak:before {
            position: absolute;
            content: "";
            width: inherit;
            height: inherit;
            top: 2px;
            border-radius: 50%;
            background: #eb9f2d;
        }
        .globe .bird .body .beak:after {
            position: absolute;
            content: "";
            z-index: -1;
            width: 37px;
            height: inherit;
            top: 12px;
            left: 2px;
            border-radius: 50%;
            background: #4d2b89;
        }
        .globe .bird .body .beak div {
            position: absolute;
            width: 43px;
            height: 43px;
            top: -1px;
            left: -1px;
            border-radius: 50% 60% 50%  40%;
            background-clip: padding-box;
            background-color: #f7d35d;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }
        .globe .bird .body .beak div:before {
            position: absolute;
            content: "";
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            width: 17px;
            height: 8px;
            top: 10px;
            left: 20px;
            border-radius: 50%;
            background-color: #fff;
        }
        .globe .bird .body .feet {
            position: absolute;
            bottom: 15px;
            width: 100%;
        }
        .globe .bird .body .feet:before, .globe .bird .body .feet:after {
            position: absolute;
            content: "";
            width: 27px;
            height: 21px;
            border-radius: 50%;
            background-color: #f8c14d;
            box-shadow: inset 0 0 12px rgba(0, 0, 0, 0.2);
            -webkit-animation: feet 4.5s linear infinite;
            animation: feet 4.5s linear infinite;
        }
        .globe .bird .body .feet:before {
            left: 40px;
        }
        .globe .bird .body .feet:after {
            right: 40px;
        }
        .globe .wire {
            position: absolute;
            z-index: -1;
            width: 500px;
            height: 400px;
            left: -173px;
            top: -215px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-bottom-color: black;
        }
        .globe .hills {
            position: absolute;
            width: 60px;
            height: 60px;
            border-radius: 30%;
            top: 230px;
            left: 60px;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            background: radial-gradient(ellipse at top left, #aad95d 0%, #bbc369 100%);
            box-shadow: inset 5px 0 12px rgba(0, 0, 0, 0.2);
        }
        .globe .hills:before, .globe .hills:after {
            position: absolute;
            content: "";
            width: 178px;
            height: 90px;
            border-radius: 50%;
            background: inherit;
            box-shadow: inherit;
        }
        .globe .hills:before {
            left: -90px;
            top: 30px;
            z-index: -1;
            -webkit-transform: rotate(-20deg);
            transform: rotate(-20deg);
        }
        .globe .hills:after {
            left: 0px;
            top: -55px;
            -webkit-transform: rotate(120deg);
            transform: rotate(120deg);
        }
        .globe .cloud {
            position: absolute;
            width: 70px;
            height: 24px;
            background: linear-gradient(to bottom, #f2f9fe 5%, #d6f0fd 100%);
            border-radius: 20px;
            top: -20px;
            z-index: -1;
            -webkit-animation: cloud 9s linear infinite;
            animation: cloud 9s linear infinite;
        }
        .globe .cloud.small {
            top: -50px;
            -webkit-transform: scale(0.6);
            transform: scale(0.6);
            -webkit-animation-delay: -1.5s;
            animation-delay: -1.5s;
            -webkit-animation-duration: 13.5s;
            animation-duration: 13.5s;
        }
        .globe .cloud:before, .globe .cloud:after {
            position: absolute;
            content: "";
            background: inherit;
            z-index: -1;
        }
        .globe .cloud:before {
            width: 36px;
            height: 36px;
            top: -18px;
            right: 10px;
            border-radius: 40px;
        }
        .globe .cloud:after {
            width: 20px;
            height: 20px;
            top: -10px;
            left: 10px;
            border-radius: 20px;
        }
    </style>
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
            <div class="card-head style-primary small-padding">
               <h2> Actividades a realizar</h2>
            </div>
            <div class="card-body">
                <div class="list-group">
                <?php
                        $semanas= array();

                        if($activities != null && $actividadPendiente != null){
                            foreach ($activities as $activity){

                                if(!in_array($activity->semana,$semanas) )
                                {
                                    array_push($semanas,$activity->semana);
                                    echo ('<div class="list-group-item list-group-item-action align-items-start style-primary-dark">
                                            <div class="d-flex w-100 justify-content-between">
                                              <h3 class="mb-1"> Semana No '.$activity->semana.'</h3>
                                            </div>
                                    </div>');
                                }

                                if($actividadPendiente->Id_Actividad == $activity->Id_Actividad){
                                    echo ('<a href="'.env('APP_URL').'/get-activity-info/'.$activity->Id_Actividad.'" class="list-group-item list-group-item-action align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                  <h4 class="mb-1"><b>'.$activity->Nombre_Actividad.'</b></h4>
                                </div>
                                <p class="mb-1">'.$activity->Descripcion_Actividad.'</p>
                                </a>');
                                }
                                else
                                {
                                echo (
                            '<div class="list-group-item list-group-item-action align-items-start disabled">
                                <div class="d-flex w-100 justify-content-between">
                                  <h4 class="mb-1"><b>'.$activity->Nombre_Actividad.'</b></h4>
                                </div>
                                 <p class="mb-1">'.$activity->Descripcion_Actividad.'</p>
                              </div>');
                                }
                            }
                        }else{
                            echo '<div style="text-align: center;">
                                  <div><p style="font-size: 1.3em">Ya has terminado todas las actividades propuestas para este infante</p></div>
                                    <div class="globe">
                                    <div class="bird">
                                        <div class="body">
                                        <div class="eye left"></div>
                                        <div class="eye right"></div>
                                        <div class="beak"><div></div></div>
                                        <div class="feet"></div>
                                        <div class="wire"></div>
                                        </div>
                                        <div class="hills"></div>
                                        <div class="cloud"></div>
                                        <div class="cloud small"></div>
                                    </div>
                                    </div>

                                 <h3>Dozing Bird<br><span>based on <a href="https://dribbble.com/shots/2015903-Dozing-bird" target="_blank">dribbble</a> by  Colin Chang</span></h3>
                    </div>';
                        }

                      

                ?>
                </div>
            </div>
        </div>
    </div>
@endsection

