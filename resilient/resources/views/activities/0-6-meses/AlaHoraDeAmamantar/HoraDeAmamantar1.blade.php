@extends('partials.layout')

@section('title')
 A La Hora De Amamantar
@endsection
<style>

     ul 
     {
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
                   <header>  A La Hora De Amamantar - Un Juego En El Que Todos Ganamos </header>
                </div>

              <div class="card-body floating-label">
                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        El periodo de la lactancia es todo un encuentro entre madre e hijo/a, quienes son partícipes de un juego
                         amoroso. Sin embargo; todos pueden participar de la lactancia, es importante involucrar al padre o al 
                         familiar que te sirve de apoyo en las primeras etapas de la maternidad. Tanto grandes como pequeños 
                         pueden participar. Así la succión supone para el bebé, además de todos los beneficios alimenticios y 
                         nutricionales:
                         <ul>
                            <li type="disc" > 
                                Satisfacción emocional.
                            </li>
                            <li type="disc" > 
                                Generas un vínculo afectivo que se convierte en un apego seguro que le servirá en el futuro,
                                 incluso para sus relaciones interpersonales.
                              </li>
                              <li type="disc" > 
                                  Compartes un momento especial con tu hijo/a.
                                </li>
                                <li type="disc" > 
                                    Te comunicas con tu bebé de manera verbal y no verbal.
                                  </li>
                                  <li type="disc" > 
                                      Al involucrar a tu pareja, generas en el bebé un lazo de afecto estrecho con su padre.
                                    </li>
                         </ul>
 
                    </p>      
                 </div>

             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/HoraAmamantar2')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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

});
</script>
@endsection