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
  height: 85px;
  width: 350px;
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


                  <div  style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                         <b>Tareas para la semana</b> </p>
                   </div>
                
                   <!--<div style="margin-left:30%; margin-bottom:30px"> 
                     <img src="{{asset('img/avatar.png')}}" alt="avatar" >
                   </div>-->
                   
                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">    
                        <p style="text-align:justify; text-justify: inter-word;">Selecciona una de estas tres frases e identifica la más apropiada para generar autoestima en tu niño o niña </p>
                       <div align="center">
                        <img src="{{asset('ActividadTesoroEscondido/corazon.png')}}" name="corazon" alt="avatar" > 
                        <div> 

                        <input type="radio" id="cb1" name="optionsRadios" value="1"/>
                        <label class="grow" for="cb1"> <img src="{{asset('ActividadTesoroEscondido/c1.png')}}" name="llave1" alt="avatar" > 
                      </label>

                      <input type="radio" id="cb1" name="optionsRadios" value="1"/>
                        <label class="grow" for="cb1"> <img src="{{asset('ActividadTesoroEscondido/c3s.png')}}" name="llave1" alt="avatar" > 
                      </label>

                      <input type="radio" id="cb1" name="optionsRadios" value="1"/>
                        <label class="grow" for="cb1"> <img src="{{asset('ActividadTesoroEscondido/c3.png')}}" name="llave1" alt="avatar"> 
                      </label>
                 </div>

                   <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        <b>NOTA:</b> A lo largo de la semana haz uso de frases como la que seleccionaste anteriormente 
                         para fomentar autoestima en el niño o niña. </p>
                   </div>


                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/TesoroEscondido3')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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