@extends('partials.layout')

@section('title')
Descubriendo Las Emociones 
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/DescubriendoEmociones6')}}">
            <div class="card">

                <div class="card-head style-primary">
                   <header>  Descubriendo Las Emociones  - Parte Dos </header>
                </div>

              <div class="card-body floating-label">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:justify; text-justify: inter-word;">
                        Verdad que no sería muy inadecuado, probablemente tu amiga se sentiría muy mal y a ti te haría 
                        enojar eso. Pensarás que es una falta de respeto. Con este ejemplo puedes ver cómo las emociones 
                        nos permiten adecuarnos a cada lugar y cada situación, por eso no es usual que veas personas riendo
                         en un funeral, pegándole a su jefe o poniéndose a llorar cuando un compañero hace un chiste. 
                  </p>
                  <ul>
                      <li class="grow" >
                            <b> Nos ayudan a comunicarnos con los demás </b>
                      </li>    
                  </ul>
                  <p style="text-align:justify; text-justify: inter-word;">
                    En este punto es importante que aprendas que las emociones básicas nos ayudan
                    a comunicarnos de forma universal con los otros. Cuando se habla de universal, 
                    se hace referencia a que personas de países ajenos al tuyo pueden ver tu rostro 
                    y entender que estas triste, enojado, con miedo o alegre, no tienen la necesidad 
                    de entender lo que estás hablando o hablar tú mismo idioma. 
                   </p>

                 <p style="text-align:justify; text-justify: inter-word;">
                    Te  daremos un ejemplo, mira las siguientes imágenes y escribe abajo que emoción crees que 
                    está experimentado la personas.  
                  </p>
                </div>  

              <div class="row" align="center">
                  <div>
                    <img WIDTH="150" HEIGTH="100"  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/ej1.png')}}"/>
                    <input type="text" required/>
                  </div>   
                  <div>
                        <img WIDTH="150" HEIGTH="100"  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/ej2.png')}}"/>
                        <input type="text" required/>
                      </div>  
                      <div>
                            <img WIDTH="150" HEIGTH="100"  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/ej3.png')}}"/>
                            <input type="text" required/>
                          </div>  
                          <div>
                                <img WIDTH="150" HEIGTH="100"  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/ej4.png')}}"/>
                                <input type="text" required/>
                              </div>  
              </div>

              <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; display:none;">
                    <p style="text-align:justify; text-justify: inter-word;">
                            ¿Fue difícil reconocer la emoción del personaje de la imagen? probablemente no ¿verdad? 
                            y te diste cuenta que para reconocer la emoción no necesitabas nada además de ver sus gestos. 
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

});
</script>
@endsection