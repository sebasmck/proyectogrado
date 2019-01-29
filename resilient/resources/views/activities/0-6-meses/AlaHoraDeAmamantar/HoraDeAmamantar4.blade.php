@extends('partials.layout')

@section('title')
 A La Hora De Amamantar
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/HoraAmamantar5')}}">
            <div class="card">

                <div class="card-head style-primary">
                   <header>  A La Hora De Amamantar - ¡OJO!  </header>
                </div>

              <div class="card-body floating-label">
                <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:justify; text-justify: inter-word;">
                      Papá o cuidador, puedes ayudar a la madre a tener menor estrés o carga al amamantar
                       o alimentar al bebé. Para ello pueden seguir los siguientes pasos, puedes marcar los 
                       ítems que te gustaría intentar y contarnos tu experiencia.
                  </p>
                  <ul>
                      <li type="disc" > 
                          La persona que participe de la lactancia puedes pasarle una almohada a la madre para que esté más cómoda a la hora de cargar el bebé. 
                      </li>
                      <li type="disc" > 
                          Ayúdale a acomodar el lugar donde va a amamantar al bebé.
                        </li>
                        <li type="disc" > 
                            Puedes traerle un vaso con agua.
                          </li>
                          <li type="disc" > 
                              Saca los gases de tu bebé después de que termine de comer. Para eso, debes recostar en tu pecho
                               al bebé; con uno de tus brazos vas a sostenerlo debajo de su cola, y con la otra harás toques suaves
                                pero firmes en su espalda para que se facilite al niño/a la eliminación de sus gases. 
                            </li>
                   </ul>
                   <p style="text-align:justify; text-justify: inter-word;">
                      Recuerda que en ocasiones se presentan ciertas circunstancias que no permiten que
                       la madre amamante a su bebé directamente. Sin embargo, esto no es impedimento para 
                       disfrutar de este momento con tu bebé, como dice la Dra. Jan Barger <i>"Ser una buena 
                         mamá es mucho más que amamantar" </i>, en el momento en que vas a alimentar a tu bebé, puedes realizar los mismos pasos.
                  </p>
                  <p style="text-align:justify; text-justify: inter-word;">
                    <b> Recuerda: </b>
                  </p>
                  <ul>
                      <li type="disc" > 
                          Mirarlo a los ojos.
                      </li>
                      <li type="disc" > 
                          Si debes darle biberón, se lo puedes dar como si le estuvieras dando el pecho.

                        </li>
                        <li type="disc" > 
                            Puedes sujetarlo en la misma posición.
                          </li>
                          <li type="disc" > 
                              No te olvides de tener contacto directo con la piel del bebé. 
                            </li>
                            <li type="disc" > 
                                Hablarle mientras lo estás alimentando. 
                              </li>
                   </ul>

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