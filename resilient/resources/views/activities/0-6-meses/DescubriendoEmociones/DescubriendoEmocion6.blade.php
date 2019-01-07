@extends('partials.layout')

@section('title')
Descubriendo Las Emociones 
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/DescubriendoEmociones2')}}">
            <div class="card">

                <div class="card-head style-primary">
                   <header>  Descubriendo Las Emociones  - Parte Dos </header>
                </div>

              <div class="card-body floating-label">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:justify; text-justify: inter-word;">
                      YA QUE SABES PORQUÉ SON IMPORTANTES LAS EMOCIONES, ENCONTRARÁS TRES PUNTOS
                       POR LOS CUALES ES IMPORTANTE QUE TENGAS CONOCIMIENTO SOBRE LAS EMOCIONES
                  </p>
                  <ol>
                      <li >
                            <b> Te permite tener una mejor reacción ante tus emociones y mejora tus relaciones</b>
                      </li> 
                      <li >
                          <b> Te ayuda a entender las emociones de los demás</b>
                    </li>    
                    <li >
                        <b> Lograrás aceptar y vivir tus emociones </b>
                  </li>       
                  </ol>
                </div>  
                
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        Decir que hay que aceptar las emociones es extraño, poco escuchamos decir esto
                         a las personas, por el contrario oímos cosas como “deja de llorar, los hombres
                          no lloran” “no seas nena no pasó nada” “no entiendo porque te enojas por eso, 
                          que bobada”, este tipo de frases hacen que se le reste importancia a reconocer
                           y aceptar cual es la emoción que se está sintiendo, por el contrario deja un 
                           mensaje de “las emociones son malas” o “es mejor no sentir emociones molestas 
                           como el enojo, miedo o tristeza”. Con la siguiente actividad aprenderás un poco
                            más sobre el proceso natural y biológico de las emociones, lo cual ayudará a
                             entender la importancia de aceptarlas.
                    </p>

                    <p style="text-align:justify; text-justify: inter-word;">
                        Lo primero que tendrás que sabes sobre ellas es que tiene un proceso natural,
                         el cual se vería como la gráfica que ves aquí
                    </p>
                    <div align="center">
                          <img WIDTH="270" HEIGTH="270"  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/grafica.png')}}"/>
                    </div>

                    <p style="text-align:justify; text-justify: inter-word;">
                            Lee el siguiente ejemplo para que puedas entender mejor este concepto de la curva emocional 
                            y su graficación.
                        </p>

                     <p style="text-align:justify; text-justify: inter-word;">
                            Piensa una situación que te enoja mucho, cuando ya la tengas, imagina que ese enojo comienza
                             a aumentar, como puedes ver en la gráfica, pero después de unos minutos esa emoción comienza 
                             a disminuir y se calma. Esto les ha permitido a los investigadores comprender que las emociones
                              son pasajeras, pues aumentan pero después de unos minutos bajan de nuevo y volvemos a nuestro estado normal. 
                     </p>

                     <p style="text-align:justify; text-justify: inter-word;">
                     Pero ¿qué pasa con la curva emocional si no practicas la aceptación de la emociones? Pues el enojo que experimentas 
                     en ese momento no podrá disminuir pronto, y lo que sucederá es que esa emoción se acumulara, algo así como en la 
                     gráfica siguiente, tu emoción subirá pero no bajará pronto, y se demora más tiempo en disminuir o en caso dado 
                     jamás volverás a tu estado emocional normal. 
                    </p>

                    <div align="center">
                            <img WIDTH="370" HEIGTH="370"  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/grafica1.png')}}"/>
                      </div>

                      <p style="text-align:justify; text-justify: inter-word;">
                            Además de lo anterior, no aceptar tus emociones hará que seas más sensible a sentir esa emoción 
                            con cosas que antes no te la causaban, te vamos a dar un ejemplo.
                           </p>

                           <p style="text-align:justify; text-justify: inter-word;">
                           Juanita tenía un novio, un día ella vio una conversación en la que él le decía a una de sus amigas
                            “bebé” “amor” y “linda”, lo cual le enojó muchísimo, pero entonces comenzó a pensar “estoy exagerando”
                             “no es para tanto” “él me va a dejar si le digo que me enoje por eso” “que boba como me voy a enojar
                              por eso” “Pfff mejor me calmo y ya, lo dejo pasar”. Juanita siguió evadiendo su enojo cuando
                               evidenciaba este tipo de situaciones con su pareja.     
                            </p>

                            <p style="text-align:justify; text-justify: inter-word;">
                            Un día, después de algunos meses ellos estaban caminando por el centro comercial, y se encontraron 
                            con otra amiga de él. Cuando ellos se saludaron, él le dio un pequeño abrazo; en ese momento ella 
                            sintió mucho enojo, entonces se preguntó ¿Por qué estoy sintiendo enojo si ella me cae bien?! Jamás
                             me había enojado porque la saludara así! 
                            </p>

                            <p style="text-align:justify; text-justify: inter-word;">
                            Con este ejemplo podrás ver que Juanita en un inicio de la relación no experimentaba enojó 
                            cuando él saludaba a sus amigas, dándoles un pequeño abrazo. Pero después de algunas 
                            situaciones en las que ella sintió enojo por algunos comportamientos de él y se lo calló 
                            creyendo que estaba mal sentir eso, con el tiempo comenzó a experimentar esta emoción pero
                             con cosas que al inicio de la relación no le generaban enojo. Negar tus emociones lo único
                              que hará será que seas más sensible ante situaciones que antes no te generaban esa emoción
                               y con el tiempo tu emoción saldrá con mayor fuerza como es muñeco. 
                            </p>
                            
                            <p style="text-align:justify; text-justify: inter-word;">
                            Has visto que estos muñecos son difíciles de guardar en la caja, pues así es una emoción,
                             difícil de ocultar, y aunque lo logres, solo durará un tiempo guardada, y entonces saldrán
                              como este muñeco, que sale con toda su fuerza. 
                            </p>

                            <p style="text-align:justify; text-justify: inter-word;">
                            Diferentes investigaciones han llegado a la siguiente conclusión:
                            </p>
                              <div align="center">
                               <p style="text-align:justify; text-justify: inter-word;">
                                    ¡ACEPTAR LAS EMOCIONES ES MEJOR QUE INTENTAR HACER QUE SE VAYAN!
                                </p>
                                <img id="imagen1" src="{{asset('ActividadDescubriendoEmociones/algo.png')}}"/>
                            </div> 

                                <p style="text-align:justify; text-justify: inter-word;">
                                        Cuando las aceptas: 
                                        <ul>
                                            <li class="Bold">
                                                    Las podrás vivir sin juzgarlas.
                                            </li>
                                            <li class="Bold">
                                                    Aunque sentirás la molesta de esa emoción, aprenderás a vivir con ella.
                                                </li>
                                                <li class="Bold">
                                                        No reaccionaras de la misma forma que antes, podrá manejar
                                                         más no la emoción, pero si tus reacciones ante ellas. 
                                                    </li>
                                        </ul>
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