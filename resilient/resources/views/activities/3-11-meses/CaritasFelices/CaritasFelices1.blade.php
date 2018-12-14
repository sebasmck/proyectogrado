@extends('partials.layout')

@section('title')
Caritas Felices
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Caritas Felices  </header>
                </div>

                <div class="card-body floating-label">

                 <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;" > 
                       <p style="text-align:center; text-justify: inter-word;"><b>Desarrollo Actividad</b></p>  
                  </div>

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 16px;color:black;">
                    <p style="text-align:left; text-justify: inter-word;">
                         <b>Cuando presto atención es cuando entiendo</b></p>
                  </div> 

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        <b>Instrucción:</b> sigue paso a paso el siguiente ejercicio de gimnasia cerebral y prepara tu organismo para una mejor respuesta en la adquisición de aprendizaje.
                    </p>
                         <p style="text-align:justify; text-justify: inter-word;">
                            <b>1.</b> Practica este ejercicio de preferencia en una silla, con una postura cómoda, con la columna recta y sin cruzar las piernas.</p>
                            <p style="text-align:justify; text-justify: inter-word;">
                                <b>2.</b> Tensa los músculos de los pies, junta los talones, luego las pantorrillas, las rodillas, tensa la parte superior de las piernas.                            </p>
                                <p style="text-align:justify; text-justify: inter-word;">
                                    <b>3.</b>Tensa los glúteos, el estómago, el pecho y los hombros. </p>
                                    <p style="text-align:justify; text-justify: inter-word;">
                                        <b>4.</b> Aprieta los puños, tensa tus manos y tus brazos.</p>
                                        <p style="text-align:justify; text-justify: inter-word;">
                                            <b>5.</b>  Tensa los músculos del cuello, aprieta tus mandíbulas, tensa el rostro, cerrando tus ojos, frunciendo tu ceño, hasta el cuero cabelludo.</p>
                                            <p style="text-align:justify; text-justify: inter-word;">
                                                <b>6.</b>  Una vez que esté todo tu cuerpo en tensión, toma aire, retenlo diez segundos y mientras cuentas tensa hasta el máximo todo el cuerpo.
                                            </p>
                                                <p style="text-align:justify; text-justify: inter-word;">
                                                    <b>7.</b>  Después de diez segundos exhala el aire aflojando totalmente el cuerpo.</p>             
                   </div>
                   


                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/CaritasFelices2')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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