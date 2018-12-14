@extends('partials.layout')

@section('title')
Caritas Felices
@endsection
<style>

        .activities{
            width: 600px;
            margin-top: 10px;
        }
    
    </style>
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Caritas Felices - ¡A leer se dijo!  </header>
                </div>

              <div class="card-body floating-label">
                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        <b>Instrucción:</b> Lee el siguiente texto
                    </p>      
                 </div>
                 <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                        <p style="text-align:justify; text-justify: inter-word;">
                           Érase una vez dos hermanitos, Sara y Pedro, que se querían mucho y pasaban todos los días juntos. Sara tenía seis años y Pedro cinco. Se acercaba el cumpleaños de Sara y entre todos empezaron a preparar una gran fiesta para celebrarlo. Los padres de Sara y Pedro hicieron invitaciones para los amiguitos de Sara. Todo el mundo ayudaba en algo para la fiesta, y Pedro empezaba a estar un poco cansado porque no se hablaba de otra cosa durante todo el día y no le hacían mucho caso. Además, esa no era su fiesta. El día del cumpleaños de Sara, sus padres se levantaron temprano para decorar toda la casa. Había un gran cartel que decía: “Muchas felicidades, Sara”. Cuando llegó la hora de saludarla, los padres de Pedro y Sara fueron a la habitación de Sara para despertarla. Ella estaba contentísima, porque además le habían llevado un gran regalo envuelto en un papel de muchos colores y con una gran cinta roja alrededor. Lo desenvolvió con cuidado y… ¡era un oso de peluche enorme! Sara estaba muy alegre y no paraba de dar las gracias a sus padres por ese regalo tan bonito. Luego, Sara preguntó por Pedro, que se tenía que haber despertado con todo el ruido, pero no había ido a felicitarla todavía. Así era, Pedro lo estaba escuchando todo, pero él también quería regalos y no le apetecía ir a darle a Sara el suyo; sin embargo, sus padres fueron a despertarlo y a decirle que debía felicitar a su hermana. Así lo hizo, pero Sara, aunque no dijo nada, se dio cuenta de que no lo hacía de corazón como solía hacerlo. Desayunaron todos juntos, aunque Pedro no estaba alegre como de costumbre. Se fueron a la escuela. Todo el mundo felicitaba a Sara y en su clase le cantaron “Cumpleaños feliz”. A la salida, todos los compañeros de Sara la acompañaron a su casa. Fue una fiesta genial, pero Pedro seguía molesto porque nadie le hacía caso. Todo el mundo estaba pendiente de Sara. Le daban muchos regalos y estaba tan contenta y ocupada con todos sus amigos que no le hacía caso. Pedro se sintió tan molesto, que se fue a otra habitación. Sin embargo Sara sí que estaba pendiente de su hermano y se puso muy triste de verlo enfadado con ella. Ya no le importaban los regalos, ni la torta con las velas, ni las canciones ni nada, porque ella quería mucho a su hermanito y él estaba molesto con ella. Entonces, decidió ir a hablar con él. Al principio, Pedro hacía como si no la escuchara, pero en realidad estaba muy contento de que Sara hubiera ido a hablar con él. Sara le dijo que no se molestara, que le daba todo lo que le habían regalado con tal de que él estuviera contento. En ese momento, Pedro se dio cuenta de lo buena que era su hermanita y de cuánto lo quería. Él no tenía ningún motivo para molestarse, era el cumpleaños de su hermana y tenían que estar todos contentos por ella. Así que le pidió disculpas por su comportamiento y se fueron los dos juntos con el resto de sus amigos para apagar las velas de la torta.

                        </p>      
                     </div>


             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/CaritasFelices5')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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