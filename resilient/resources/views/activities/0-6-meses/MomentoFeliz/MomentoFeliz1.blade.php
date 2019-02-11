@extends('partials.layout')

@section('title')
Actividad Momento Feliz
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/CulminacionMomentoFeliz')}}">
            <div class="card">

                <div class="card-head style-primary">
                   <header>  Momento Feliz  - Explicación </header>
                </div>

              <div class="card-body floating-label">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:justify; text-justify: inter-word;">
                    Esta actividad se realizará en 3 días diferentes y en la medida que puedas involucrar a 
                    más personas de la familia cercanas al bebé, te será de mayor beneficio.
                  <ul>
                    <li>
                       <p>El primer día vas a escoger 10 minutos en los que puedas tener 
                            la máxima atención de tu bebé. </p> 
                    </li>
                    <li>
                        <p> Vas a tomar un espejo y vas a identificar expresiones positivas en tu rostro, 
                            por ejemplo, si estás feliz, es probable que estés sonriendo ligeramente o expresando una gran sonrisa. </p>
                        
                    </li>
                    <li>
                        <p>Una vez identifiques tu expresión, pasa la mano abierta del bebé sobre tu rostro, 
                            siente las caricias de tu bebé. </p>
                        
                    </li>
                    <li>
                         <p>Mientras pasas tu mano, cuéntale de manera sencilla cual es esa expresión, puede que tu bebé 
                            no logre comprender el contenido de la frase, pero en la medida que tomes tiempo para realizar esta actividad,
                             el bebé irá aprendiendo cuál es ese tono de voz para la alegría, la sorpresa, el entusiasmo, etc. </p> 
                            
                    </li>
                    <li >
                        <p>Los bebés logran aprender a imitar  las muecas de la madre o del cuidador principal, 
                            ello será fundamental para en un futuro reconocer las emociones y estimular el lenguaje, por ello trata
                             de ser muy expresivo a la hora de realizar este ejercicio.</p>
                           
                    </li>
                    <li>
                         <p>Ahora vas a pasar un dedo sobre las facciones de tu bebé, 
                            probable que no sean muy evidentes las expresiones, no te preocupes, con el tiempo
                             se irán haciendo más fáciles de reconocer. </p>
                            
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