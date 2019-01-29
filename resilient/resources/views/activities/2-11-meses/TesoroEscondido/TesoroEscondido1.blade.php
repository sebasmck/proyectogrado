@extends('partials.layout')

@section('title')
UN TESORO ESCONDIDO.
@endsection

<style>

        ul {
      list-style-type: none;
    }
    
    li {
      display: inline-block;
    }
    
    input[type="radio"][id^="cb"] {
      display: none;
    }
    
    label {
      border: 1px solid #fff;
      padding: 10px;
      display: block;
      position: relative;
      margin: 10px;
      cursor: pointer;
    }
    
    label::before {
      background-color: white;
      color: white;
      content: " ";
      display: block;
      border-radius: 50%;
      border: 1px solid grey;
      position: absolute;
      top: -5px;
      left: -5px;
      width: 25px;
      height: 25px;
      text-align: center;
      line-height: 28px;
      transition-duration: 0.4s;
      transform: scale(0);
    }
    
    label img {
      height: 200px;
      width: 200px;
      transition-duration: 0.2s;
      transform-origin: 50% 50%;
    }
    
    :checked + label {
      border-color: #ddd;
    }
    
    :checked + label::before {
      content: "✓";
      background-color: grey;
      transform: scale(1);
    }
    
    :checked + label img {
      transform: scale(0.9);
      box-shadow: 0 0 5px #333;
      z-index: -1;
    }
    
    .grow { transition: all .2s ease-in-out; }
    .grow:hover { transform: scale(0.9); }
    
    
    </style>
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> UN TESORO ESCONDIDO. "SOY CAPAZ DE… Y ME AMO COMO SOY” </header>
                </div>

                <div class="card-body floating-label">

                 <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:#008efd;" > 
                       <p style="text-align:center; text-justify: inter-word;"><b>Desarrollo Actividad</b></p>  
                      <!-- <img class="pull-right" src="{{asset('img/avatar.png')}}" alt="avatar">-->
                  </div>


                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                            Identifica la imagen de un baúl antiguo, un laberinto y una serie de llaves; posteriormente encuentra la llave adecuada para abrir el cajón,
                             para ello es necesario que elijas haciendo clic en la llave que contenga la mayoría de componentes para fomentar autoestima. </p>
                  </div>
                
                   <!--<div style="margin-left:30%; margin-bottom:30px"> 
                     <img src="{{asset('img/avatar.png')}}" alt="avatar" >
                   </div>-->
                   
                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; margin-left:15% ">    
                        <p style="text-align:justify; text-justify: inter-word;"><b>Imagenes:</b> </p>
                     <img src="{{asset('ActividadTesoroEscondido/llaves.png')}}" alt="avatar" style="margin-inline-start:10%">
                     <img src="{{asset('ActividadTesoroEscondido/lab.png')}}" alt="avatar" style="margin-inline-start:5%">
                     <img src="{{asset('ActividadTesoroEscondido/cofre.png')}}" alt="avatar" style="margin-inline-start:5%">
                 </div>

                 <div align="center" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">    
                        <p style="text-align:justify; text-justify: inter-word;"><b>llaves:</b> </p>
                        <input type="radio" id="cb1" name="optionsRadios" value="1"/>
                          <label class="grow" for="cb1"> <img src="{{asset('ActividadTesoroEscondido/llave1.png')}}" name="llave1" alt="avatar" style="margin-inline-start:10%"> 
                        </label>
                     
                        <input type="radio" id="cb2" name="optionsRadios" value="2" />
                        <label class="grow" for="cb2"> <img src="{{asset('ActividadTesoroEscondido/llave2.png')}}" name="llave2" alt="avatar" style="margin-inline-start:10%">
                      </label>

                      <input type="radio" id="cb3" name="optionsRadios" value="3"/>
                          <label class="grow" for="cb3"> <img src="{{asset('ActividadTesoroEscondido/llave3.png')}}"  name="llave3" alt="avatar" style="margin-inline-start:10%"> 
                        </label>
                 </div>

                 <div id="Parte2" style="display:none">
                    <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                        <p style="text-align:justify; text-justify: inter-word;">Al abrir el candado del baúl encontraras tres objetos
                             que hacen referencia al tesoro que está dentro, elige cuál de estos elementos 
                            regalarías al niño o niña con el objetivo de iniciar el fortalecimiento de la autoestima. </p>
                     </div> 
                       <div align="center">    
                            <input type="radio" id="cb4" name="optionsRadios1" value="3"/>
                            <label class="grow" for="cb4"> <img src="{{asset('ActividadTesoroEscondido/mario.png')}}"  name="llave3" alt="avatar" style="margin-inline-start:10%"> 
                          </label>

                          <input type="radio" id="cb5" name="optionsRadios1" value="3"/>
                          <label class="grow" for="cb5"> <img src="{{asset('ActividadTesoroEscondido/espejo.png')}}"  name="llave3" alt="avatar" style="margin-inline-start:10%"> 
                        </label>
                       </div> 
                 </div>

                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/TesoroEscondido2')}}"> <button type="button" id="botonS" class="btn btn-default ink-reaction btn-primary-dark" style="display:none">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
@section('addjs')
<script>
         
  $('#cb2').on('change', function() 
  {
      $('#Parte2').show();
      $("#cb1").attr('disabled', true);
      $("#cb3").attr('disabled', true);
  });   

  $('#cb5').on('change', function() 
  {
    $("#cb4").attr('disabled', true);
    $('#botonS').show();
  });   

</script>
@endsection 