@extends('partials.layout')

@section('title')
Intro actividad con toda mi atención
@endsection

@section('addcss')
    <style>
    * {
        box-sizing: border-box;
    }

/* html, 
body {
  margin: 0;
  padding: 0;
  height: 100%;
  overflow: hidden;
  background-color: #eae4df;
}

body {
 display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
} */

.stage {
  width: 400px;
  height: 400px;
  border-radius: 50%;
  background-color: #f5f2f1;
  position: relative;
}

.stage:after {
  background-color: #eae4df;
  height: 100px;
  width: 100%;
  position: absolute;
  content: '';
  bottom: 0;
}

.table {
  position: absolute;
  bottom: 92px;
  width: 100%;
  height: 8px;
  background-color: #caa17f;
  z-index: 1;
  border-radius: 20px;
}

.pc {
  z-index: 2;
  position: absolute;
  bottom: 100px;
  width: 142px;
  height: 98px;
  background-color: #c0c0c2;
  border-radius: 5px;
  left: 50%;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
}

.pc:after {
  content: '';
  width: 14px;
  height: 14px;
  border-radius: 50%;
  background-color: #b5b7ba;
  position: absolute;
  top: 51%;
  left: 50%;
  -webkit-transform: translateX(-50%) translateY(-50%);
          transform: translateX(-50%) translateY(-50%);
}

.pc:before {
  content: '';
  position: absolute;
  top: 4px;
  left: 0;
  right: 0;
  height: calc(100% - 4px);
  background-color: #d1d3d5;
  border-radius: 2px;
}

.guy {
  width: 174px;
  height: 130px;
  position: absolute;
  left: 50%;
  -webkit-transform: translateX(-50%) translateY(0) translateZ(0);
          transform: translateX(-50%) translateY(0) translateZ(0);
  bottom: 198px;
  -webkit-animation: guyMove 3500ms cubic-bezier(0.4, 0, 1, 1) infinite alternate;
          animation: guyMove 3500ms cubic-bezier(0.4, 0, 1, 1) infinite alternate;
}

@-webkit-keyframes guyMove {
  0% {
    -webkit-transform: translateX(-50%) translateY(45px) translateZ(0);  
  }
  15% {
    -webkit-transform: translateX(-50%) translateY(50px) translateZ(0);  
  }
  30% {
    -webkit-transform: translateX(-50%) translateY(45px) translateZ(0);  
  }
  45% {
    -webkit-transform: translateX(-50%) translateY(50px) translateZ(0);  
  }
  60% {
    -webkit-transform: translateX(-50%) translateY(0px) translateZ(0);  
  }
  100% {
    -webkit-transform: translateX(-50%) translateY(0px) translateZ(0);  
  }
}


@keyframes guyMove {
  0% {
    transform: translateX(-50%) translateY(45px) translateZ(0);  
  }
  15% {
    transform: translateX(-50%) translateY(50px) translateZ(0);  
  }
  30% {
    transform: translateX(-50%) translateY(45px) translateZ(0);  
  }
  45% {
    transform: translateX(-50%) translateY(50px) translateZ(0);  
  }
  60% {
    transform: translateX(-50%) translateY(0px) translateZ(0);  
  }
  100% {
    transform: translateX(-50%) translateY(0px) translateZ(0);  
  }
}

.body {
  width: 70px;
  height: 40px;
  position: absolute;
  bottom: -14px;
  z-index: 1;
  left: 50%;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  border-radius: 50px 50px 0 0;
  background-color: #36508a;
}

.body:after {
  content: '';
  position: absolute;
  width: 60px;
  height: 30px;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  left: 50%;
  border-radius: 50px 50px 0 0;
  background-color: #4563a5;
  bottom: 5px;
}

.neck {
  width: 26px;
  height: 26px;
  background-color: #f6d2be;
  border-radius: 0 0 50px 50px;
  bottom: 4px;
  z-index: 4;
  position: absolute;
  left: 50%;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
}

.face {
  background-color: #f6d2be;
  width: 78px;
  border-radius: 0 0 50px 50px;
  height: 58px; 
  position: absolute;
  bottom: 26px;
  left: 50%;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
}

.face:after {
  background-color: #fddac5;
  width: 68px;
  border-radius: 0 0 50px 50px;
  height: 52px; 
  content: '';
  left: 50%;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  position: absolute;
}

.eye {
  width: 12px;
  height: 12px;
  background-color: #533d34;
  position: absolute;
  left: 15px;
  top: 14px;
  z-index: 5;
  border-radius: 50px;
}

.eye:nth-child(2) {
  left: auto;
  right: 15px;
}

.eye:after {
  content: '';
  width: 16px;
  left: -2px;
  height: 14px;
  background-color: #fddac5;
  border-radius: 50%;
  position: absolute;
  -webkit-animation: eyeMove 3500ms cubic-bezier(0.4, 0, 1, 1) infinite alternate;
          animation: eyeMove 3500ms cubic-bezier(0.4, 0, 1, 1) infinite alternate;
}

@-webkit-keyframes eyeMove {
  0% {
    -webkit-transform: translateY(16px) translateZ(0); 
  }
  15% {
    -webkit-transform: translateY(16px) translateZ(0);
  }
  30% {
    -webkit-transform: translateY(16px) translateZ(0);
  }
  45% {
    -webkit-transform: translateY(16px) translateZ(0);
  }
  60% {
    -webkit-transform: translateY(4px) translateZ(0);
  }
  100% {
    -webkit-transform: translateY(4px) translateZ(0); 
  }
}

@keyframes eyeMove {
  0% {
    transform: translateY(16px) translateZ(0); 
  }
  15% {
    transform: translateY(16px) translateZ(0);
  }
  30% {
    transform: translateY(16px) translateZ(0);
  }
  45% {
    transform: translateY(16px) translateZ(0);
  }
  60% {
    transform: translateY(4px) translateZ(0);
  }
  100% {
    transform: translateY(4px) translateZ(0); 
  }
}

.nose {
  background-color: #efc2a3;
  position: absolute;
  top: 20px;
  left: 50%;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  width: 6px;
  height: 14px;
  z-index: 5;
  border-radius: 20px;
}

.hat {
  background-color: #4563a5;
  height: 42px;
  width: 78px;
  top: 4px;
  left: 50%;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  border-radius: 50px 50px 0 0;
  position: absolute;
  z-index: 5;
}

.hat:before {
  height: 6px;
  width: 10px;
  background-color: #4563a5;
  position: absolute;
  content: '';
  border-radius: 50px 50px 0 0;
  top: -3px;
  left: 50%;
  margin-left: -5px;
}

.hat:after {
  height: 8px;
  width: 42px;
  background-color: #4563a5;
  position: absolute;
  content: '';
  border-radius: 50px 0 0 50px;
  bottom: 0;
  left: -38px;
}

.hair-left {
  background-color: #5e3919;
  position: absolute;
  top: 46px;
  z-index: 5;
  left: 48px;
  width: 8px;
  border-radius: 0 0 0 50px;
  height: 14px;
}

.hair-left:before {
  content: '';
  position: absolute;
  top: 0;
  left: 8px;
  width: 8px;
  height: 8px;
  background-color: #5e3919;
  border-radius: 0 0 50px 0;
}

.hair-right {
  background-color: #5e3919;
  position: absolute;
  top: 46px;
  z-index: 5;
  right: 48px;
  width: 8px;
  border-radius: 0 0 50px 0;
  height: 14px;
}

.hair-right:before {
  content: '';
  position: absolute;
  top: 0;
  right: 8px;
  width: 8px;
  height: 8px;
  background-color: #5e3919;
  border-radius: 0 0 0 50px ;
}

.hair-middle {
    background-color: #5e3919;
    top: 45px;
    left: 49%;
    z-index: 4;
    width: 14px;
    height: 6px;
    border-radius: 0 0 100px 100px;
    position: absolute;
    z-index: 4;
    -webkit-transform: translateX(-50%);
            transform: translateX(-50%) rotate(-15deg);
}

.hair-middle:after {
  content: '';
  position: absolute;
  top: -4px;
  right: -3px;
  width: 8px;
  height: 14px;
  border-radius: 0 50px 50px 0;
  background-color: #5e3919;
  transform: rotate(-15deg);
}

.hat-hair {
  width: 24px;
  height: 10px;
  background-color: #5e3919;
  border-radius: 50px 50px 0 0;
  position: absolute;
  bottom: 10px; 
  right: 6px;
}

.hat-hair:before {
  content: '';
  position: absolute;
  width: 8px;
  height: 8px;
  top: -5px;
  right: 3px;
  background-color: #5e3919;
  border-radius: 0 50px 0 0;
}

.hat-hair:after {
  content: '';
  position: absolute;
  width: 14px;
  height: 8px;
  top: 2px;
  right: -10px;
  background-color: #5e3919;
  border-radius: 0 0 50px 0;
}

.hat-close {
  position: absolute;
  bottom: 0;
  right: 2px;
  width: 28px;
  height: 10px;
  border-radius: 0 100px 100px 0;
  background-color: #879ed0;
}

.mouth {
  width: 18px;
  height: 8px;
  border-radius: 0 0 50px 50px;
  background-color: #fff;
  position: absolute;
  bottom: 11px;
  left: 50%;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  z-index: 12;;
}

.ear-left {
  position: absolute;
  top: 50px;
  left: 40px;
  border-radius: 50px 0 0 50px;
  width: 16px;
  height: 24px;
  background-color: #f6d2be;
}

.ear-right {
  position: absolute;
  top: 50px;
  right: 40px;
  border-radius: 0 50px 50px 0;
  width: 16px;
  height: 24px;
  background-color: #f6d2be;
}

.clock {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  background-color: #eae4df;
  position: absolute;
  right: 16px;
  top: 24px;
}

.clock:before {
  content: '';
  width: 66px;
  height: 66px;
  background-color: #f6f7f8;
  border-radius: 50%;
  position: absolute;
  top: 7px;
  left: 7px;
  z-index: 2;
}

.pointer-min {
  height: 22px;
  width: 4px;
  border-radius: 0 0 50px 50px;
  background-color: #e0dddb;
  position: absolute;
  left: 50%;
  top: calc(50% + 10px);
  -webkit-transform: translateX(-50%) translateY(-50%) rotate(-30deg);
          transform: translateX(-50%) translateY(-50%) rotate(-30deg);
  z-index: 20;
  transform-origin: top;
  -webkit-animation: min 30s linear infinite;
          animation: min 30s linear infinite;
}

@-webkit-keyframes min {
  0% {
    -webkit-transform: translateX(-50%) translateY(-50%) rotate(-30deg);  
  } 
  100% {
    -webkit-transform: translateX(-50%) translateY(-50%) rotate(330deg);
  }
}

@keyframes min {
  0% {
    transform: translateX(-50%) translateY(-50%) rotate(-30deg);  
  } 
  100% {
    transform: translateX(-50%) translateY(-50%) rotate(330deg);
  }
}

.pointer-hour {
  width: 14px;
  height: 4px;
  border-radius: 50px 0 0 50px;
  background-color: #e0dddb;
  position: absolute;
  top: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  z-index: 20;
  left: 22px;
}

.pointer {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translateX(-50%) translateY(-50%);
          transform: translateX(-50%) translateY(-50%);
  width: 10px;
  height: 10px;
  border: 3px solid #e0dddb;
  background-color: #f6f7f8;
  border-radius: 50%;
  z-index: 30;
}

.marker-top {
  width: 6px;
  height: 6px;
  background-color: #e0dddb;
  position: absolute;
  top: 10px;
  left: 50%;
  z-index: 20;
  border-radius: 50%;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
}

.marker-right {
  width: 6px;
  height: 6px;
  background-color: #e0dddb;
  position: absolute;
  right: 10px;
  top: 50%;
  z-index: 20;
  border-radius: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
}

.marker-bottom {
  width: 6px;
  height: 6px;
  background-color: #e0dddb;
  position: absolute;
  bottom: 10px;
  left: 50%;
  z-index: 20;
  border-radius: 50%;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
}

.marker-left {
  width: 6px;
  height: 6px;
  background-color: #e0dddb;
  position: absolute;
  left: 10px;
  top: 50%;
  z-index: 20;
  border-radius: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
}

.cup {
  width: 36px;
  height: 60px;
  position: absolute;
  bottom: 90px;
  z-index: 20;
  right: 56px;
  border-top: 50px solid #fff;
  border-left: 4px solid transparent;
  border-right: 4px solid transparent;
}

.cup:after {
  content: '';
  position: absolute;
  right: -1px;
  top: -46px;
  width: 4px;
  border-top: 38px solid rgba(220, 220, 220, 0.41);
  border-left: 0px solid transparent;
  border-right: 4px solid transparent;
}

.cup-cover {
  width: 44px;
  right: 52px;
  position: absolute;
  bottom: 150px;
  z-index: 21;
  border-bottom: 6px solid #ce4646;
  border-left: 2px solid transparent;
  border-right: 2px solid transparent;
}

.cup-cover:after {
  content: '';
  width: 32px;
  right: 2px;
  position: absolute;
  bottom: 0;
  z-index: 21;
  border-bottom: 4px solid #af4242;
  border-left: 2px solid transparent;
  border-right: 2px solid transparent; 
}

.book.one {
  position: absolute;
  bottom: 100px;
  width: 64px;
  height: 16px;
  left: 46px;
  background-color: #fff;
  border-top: 3px solid #FB904D;
  border-right: 6px solid #FB904D;
  border-bottom: 3px solid #FB904D;
  border-radius: 0 4px 4px 0;
}

.book.two {
  position: absolute;
  bottom: 116px;
  width: 70px;
  height: 20px;
  left: 44px;
  background-color: #fff;
  border-top: 3px solid #45a58b;
  border-right: 11px solid #45a58b;
  border-bottom: 3px solid #45a58b;
  border-radius: 0 7px 8px 0;
}

.book.three {
  position: absolute;
  bottom: 136px;
  width: 62px;
  height: 20px;
  left: 48px;
  background-color: #ff443d;
}

.book.three:after {
  content: '';
  position: absolute;
  top: 5px;
  left: 5px;
  width: 8px;
  height: 8px;
  background-color: #fff;
  border-radius: 50%;
}


 

h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
	  font-weight: bold;
	  font-size: 1em;
  text-align: left;
  color: #185875;
}

.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
	  text-align: left;
	  overflow: hidden;
	  width: 80%;
	  margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
	  padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #2C3446;
}

.container th {
	  background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}

button {
  width: 150px;
  border: none;
  border-radius: 0 8px;
  padding: 10px;
  margin: 5px auto;
  color: #fff;
  background-color:#edbd4e;
  box-shadow: 0px 4px 0px 0px #d1a24b;
  transition: .35s;
}

button:hover {
  cursor: pointer;
  box-shadow: 0px 2px 0px 0px #d1a24b;
  transform: translateY(2px);
}

</style>
@endsection

@section('content')
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="title animated lightSpeedIn" style="font-family: 'Raleway', sans-serif; font-size: 40px;" >
                Actividad con toda mi atención
            </div>
        </div> 
        

        <div class="col-md-7">
            <div class="card">
                <div class="card-head">
                    <header> <center> <b> Aspectos Actividad </b> </center></header>
                </div>
                <div class="card-body text-default-light">
                   
                        <table class="container">
                                <thead>
                                    <tr>
                                        <th><h1>Competencia</h1></th>
                                        <th><h1>Detalle</h1></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Procesos psicosociales</td>
                                        <td>Práctica de crianza</td>
                                    </tr>
                                    <tr>
                                        <td>Competencias de padres y/o cuidadores</td>
                                        <td>Aporte educativo, aporte socializador, aporte afectivo, cuidado y estimulación, promoción de la resiliencia</td>
                                    </tr>
                                    <tr>
                                        <td>Rasgos resilientes</td>
                                        <td>independencia</td>
                                    </tr>
                                    <tr>
                                        <td>Semana</td>
                                        <td>7</td>
                                    </tr>
                                <tr>
                                </tbody>
                            </table>

                </div><!--end .card-body -->
                <div class="card-body floating-label" style="text-align:justify;">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="heading1">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                <b> Descripción Actividad</b>
                                </button>
                            </h5>
                        </div>
                        <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
                            <div class="card-body" >
                            <label> 
                               <p style="text-align:justify; text-justify: inter-word; color:black;">
                                 La actividad aquí planteada fortalece el rasgo resiliente de independencia en los niños y niñas
                                 ya que les enseña a calmarse a través de sus propios medios antes de manifestar sus problemas
                                 o de realizar comportamientos inaceptables.</p>
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                </div><!--end .card-actionbar -->
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-body text-default-light">
                    
                        <div class="stage">
                                <div class="table"></div>
                                <div class="pc"></div>
                                <div class="cup"></div>
                                <div class="cup-cover"></div>
                                <div class="clock">
                                  <div class="marker-top"></div>
                                  <div class="marker-right"></div>
                                  <div class="marker-bottom"></div>
                                  <div class="marker-left"></div>
                                  <div class="pointer-min"></div>
                                  <div class="pointer-hour"></div>
                                  <div class="pointer"></div>
                                </div>
                                <div class="guy">
                                  <div class="hat">
                                    <div class="hat-hair"></div>
                                    <div class="hat-close"></div>
                                  </div>
                                  <div class="hair-left"></div>
                                  <div class="hair-middle"></div>
                                  <div class="hair-right"></div>
                                  <div class="ear-left"></div>
                                  <div class="ear-right"></div>
                                  <div class="face">
                                    <div class="eye"></div>
                                    <div class="eye"></div>
                                    <div class="nose"></div>
                                    <div class="mouth"></div>
                                  </div>
                                  <div class="neck"></div>
                                  <div class="body"></div>
                                </div>
                                <div class="book one"></div>
                                <div class="book two"></div>
                                <div class="book three"></div>
                              </div>

                </div><!--end .card-body -->
                
                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/con-toda-mi-atencion-2')}}"> <button type="button" style="margin-top:50px; margin-left:30%; margin-right:30% ">Comenzar</button></a>
                    </div>
                </div><!--end .card-actionbar -->
            </div>
        </div>
            
            
                
        
        
        
    </div>
</div>
    </div>
</div>

@endsection

