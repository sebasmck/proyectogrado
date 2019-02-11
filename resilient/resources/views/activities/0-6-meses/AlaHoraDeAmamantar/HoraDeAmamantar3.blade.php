@extends('partials.layout')

@section('title')
 A La Hora De Amamantar
@endsection
<style>
        ul {
            list-style-type: none;
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
            height: 100px;
            width: 100px;
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
      
      
          .objects {
              display:inline-table;
              background-color: #FFF3CC;
              border: #DFBC6A 1px solid;
              width: 150px; 
              height: 30px;
              margin: 10px;
              padding: 8px;
              font-size: 12px;
              text-align: center;
              box-shadow: 2px 2px 2px #999;
              cursor: move;
          }
          .drop_zone {
              background-color: #EEE; 
              border: #999 1px solid;
              width: 200px; 
              height: 150px;
              padding: 5px;
              font-size: 18px;
              margin-left: 140%;
          }
          .row, b{
              margin-bottom: 30px;
          }
          #qualities{
              margin-right: 25px;
              margin-left: 15px;
              font-size: 18px;
          }
           .actContainer{
              display: inline-block;
              margin-bottom: 20px;
              margin-left: 20px;
          }
      
          </style>
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/HoraAmamantar4')}}">
            <div class="card">

                <div class="card-head style-primary">
                   <header>  A La Hora De Amamantar - Actividad de identificación  </header>
                </div>

              <div class="card-body floating-label">
                <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:justify; text-justify: inter-word;">
                        A continuación, te brindamos algunos tips que puedes realizar en casa para aliviar
                         algunos síntomas ¡Dale click a cada uno de los globitos para que puedas verlos! 
                  </p>
                </div>   
              <div class="card-body floating-label">
                    <div align="center" class="row">
                            <input type="radio" id="cb1" name="optionsRadios" value="1"/>
                            <label class="grow" for="cb1"> Descansa <img src="{{asset('pretest/globo1.png')}}" name="llave1" alt="avatar" style="margin-inline-start:10%"> 
                            </label>

                            <input type="radio" id="cb2" name="optionsRadios" value="1"/>
                            <label class="grow" for="cb2"> Usa compresas <img src="{{asset('pretest/globo2.png')}}" name="llave1" alt="avatar" style="margin-inline-start:10%"> 
                            </label>

                            <input type="radio" id="cb3" name="optionsRadios" value="1"/>
                            <label class="grow" for="cb3"> Cuidate <img src="{{asset('pretest/globo3.png')}}" name="llave1" alt="avatar" style="margin-inline-start:10%"> 
                            </label>
                    </div> 
              </div> 

                    <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                      <p style="text-align:justify; text-justify: inter-word;">
                            <label id="info"> Seleccione un globo </label>
                      </p>
                    </div>   

             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" > <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
@section('addjs')

<script type="text/javascript">
$(document).ready(function(){

$('#btnhid').change(function(){
   $("#labelpan").css("display","none");
   $("#buttonPass").fadeIn(1000);
});
$('#cb1').on('change', function() 
{
      $("#info").text('Para tu bebé también es importante que puedas descansar, si cuentas con el apoyo de tu pareja o alguien de tu familia, puedes enseñarle a acomodar a tu bebé y pedirle que te colabore a la hora de lactar a tu bebé mientras tú descansas.'); 
}); 
$('#cb2').on('change', function() 
{
      $("#info").text('Puedes alternar confesar frías y tibias; las compresas frías te ayudarán a aliviar el dolor y la hinchazón. Las compresas tibias serán útiles para estimularás la bajada de la leche y no te dolerá tanto amamantar. Recuerda que debes envolver las compresas en una toalla, nunca debes ponerla directamente.'); 
}); 
$('#cb3').on('change', function() 
{
      $("#info").text(' A tu bebé le agrada que te sientas hermosa y quiere sobre todo que estés cómoda, puedes usar un brasier que no te apriete o puedes decidir no usarlo.'); 
}); 

});
</script>
@endsection