@extends('partials.layout')

@section('title')
Foraleciendo la comunicación con mi hijo
@endsection

@section('content')

<!-- Si necesitan animaciones shake (como se mueven los emoticones) ahi les dejo los links de
la documentación -->
<!-- https://github.com/elrumordelaluz/csshake-->
<!-- http://elrumordelaluz.github.io/csshake/-->
<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-slow.css')}}" />

<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-hard.css')}}" />

<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-crazy.css')}}" />

<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-little.css')}}" />

<!-- Otra libreria. animaciones para la tabla y animar los
números de la tabla use esta libreria. Ahí dejo el los links de la documentación-->
<!-- https://daneden.github.io/animate.css/ -->
<!-- -https://github.com/daneden/animate.css -->
<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/animate.css')}}" />


<form action="{{route('/RespirarActuar2') }}" method="get" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="col-lg-offset-2 col-md-8">

<div class="card">
<div class="card-head style-primary">
                    <header>Reconociendo a mi persona</header>
                </div>
 <div class="card-body floating-label">

 <!-- INICIO ROW-->
  <div class="row">
                 <div class="row">
                                   <div class="col-sm-12">
                                        <div class="animated bounceInDown delay-1s">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;">
                                            <label> 
                                            <p><b>Descripción de la actividad:</b> Esta actividad consiste en transformar 
                                            las frases negativas que se encuentran en el lado izquierdo de la hoja a frases 
                                            positivas, después encontrarás al final de la hoja la parte de retroalimentación
                                            de la actividad la cual te dará una idea más clara. A continuación, deberás 
                                            escribir  la expresión positiva de la frase negativa que se te presente en el
                                            siguiente cuadro, cuando lo hayas hecho presiona el corazón el cual te indicara
                                            otro ejemplo de frase positiva.
                                            </p>
                                            </label>
                                            <br>

                                            <div align="center">
                                            <table class="table table-striped animated jackInTheBox delay-2s">
                                            <thead>
                                            <th><p style="color:red;">Frase Negativa</p></th>
                                            <th><p style="color:green;">Frase Positiva</p></th>
                                            <th><p style="color:blue;">Frase Comparación</p></th>
                                            </thead>
                                            <tbody>

                                            <tr>
                                            <td><p>¿No puedes quedarte quieto?<br>¡Vas a caerte!</p></td>
                                            <td><input type="text" class="form-control" id="input6" name="input6" required placeholder="Escribe tu frase aquí"></td>
                                            <td><p class="animated animateP flipInX" style="display:none;">Si sigues corriendo puedes<br>caerte y te puedes lastimar</p> <img class="animated flipInX imgC" width="260" height="200" id="img1" src="{{asset('img/fortaleciendo1.png')}}">
                                                
                                            </td>
                                            </tr>

                                            <tr>
                                            <td><p>No te voy a poner el pantalón<br> rosado, te voy a poner el vestido<br> azul y punto.</p></td>
                                            <td><input type="text" class="form-control" id="input7" name="input7" required placeholder="Escribe tu frase aquí"></td>
                                            <td><p class="animated animateP flipInX" style="display:none;">Quizás el pantalón rosado<br>lo podríamos dejar<br>para mañana mientras<br>te lo lavo y hoy<br>podría ponerte este<br>lindo vestido azul</p><img class="animated flipInX imgC" width="260" height="200" id="img2" src="{{asset('img/fortaleciendo1.png')}}"></td>
                                            </tr>

                                                                                        <tr>
                                            <td><p>¡Te he dicho que no cojas eso!<br> ¿Por qué no haces caso?</p></td>
                                            <td><input type="text" class="form-control" id="input8" name="input8" required placeholder="Escribe tu frase aquí"></td>
                                            <td><p class="animated animateP flipInX" style="display:none;">Ven, dejemos esto aquí,<br> este es el lugar de<br> los juguetes</p><img class="animated flipInX imgC" width="260" height="200" id="img3" src="{{asset('img/fortaleciendo1.png')}}"></td>
                                            </tr>

                                                                                        <tr>
                                            <td><p>¡No llores! Los niños no lloran.</p></td>
                                            <td><input type="text" class="form-control" id="input9" name="input9" required placeholder="Escribe tu frase aquí"></td>
                                            <td><p class="animated animateP flipInX" style="display:none;">Dime que pasa, ¿por qué<br> lloras?</p><img class="animated flipInX imgC" width="260" height="200" id="img4" src="{{asset('img/fortaleciendo1.png')}}"></td>
                                            </tr>

                                                                                        <tr>
                                            <td><p>No puedo jugar contigo tengo<br> cosas que hacer</p></td>
                                            <td><input type="text" class="form-control" id="input10" name="input10" required placeholder="Escribe tu frase aquí"></td>
                                            <td><p class="animated animateP flipInX" style="display:none;">¿Me ayudas a poner la ropa<br> sucia en el canasto,<br> y después jugamos?</p><img class="animated flipInX imgC" width="260" height="200" id="img4" src="{{asset('img/fortaleciendo1.png')}}"></td>
                                            </tr>

                                                                                        <tr>
                                            <td><p> No vamos a ir al parque</p></td>
                                            <td><input type="text" class="form-control" id="input11" name="input11" required placeholder="Escribe tu frase aquí"></td>
                                            <td><p class="animated animateP flipInX" style="display:none;">¿Qué te parece si jugamos<br> hoy en casa?</p><img class="animated flipInX imgC" width="260" height="200" id="img4" src="{{asset('img/fortaleciendo1.png')}}"></td>
                                            </tr>

                                                                                        <tr>
                                            <td><p>No te voy a comprar dulces</p></td>
                                            <td><input type="text" class="form-control" id="input12" name="input12" required placeholder="Escribe tu frase aquí"></td>
                                            <td><p class="animated animateP flipInX" style="display:none;">Te propongo que en lugar de<br> dulces, compremos frutas<br> para prepararte tu compota<br>  favorita, te parece?</p><img class="animated flipInX imgC" width="260" height="200" id="img4" src="{{asset('img/fortaleciendo1.png')}}"></td>
                                            </tr>

                                                                                        <tr>
                                            <td><p>No escribas en la pared</p></td>
                                            <td><input type="text" class="form-control" id="input13" name="input13" required placeholder="Escribe tu frase aquí"></td>
                                            <td><p class="animated animateP flipInX" style="display:none;">Escribe aqui te puse<br> un papel donde puedes<br> escribir.</p><img class="animated flipInX imgC" width="260" height="200" id="img4" src="{{asset('img/fortaleciendo1.png')}}"></td>
                                            </tr>

                                                                                        <tr>
                                            <td><p>No te saques los mocos</p></td>
                                            <td><input type="text" class="form-control" id="input14" name="input14" required placeholder="Escribe tu frase aquí"></td>
                                            <td><p class="animated animateP flipInX" style="display:none;">Límpiate la nariz con<br> un papel.</p><img class="animated flipInX imgC" width="260" height="200" id="img4" src="{{asset('img/fortaleciendo1.png')}}"></td>
                                            </tr>

                                                                                        <tr>
                                            <td><p>No rompas los juguetes</p></td>
                                            <td><input type="text" class="form-control" id="input15" name="input15" required placeholder="Escribe tu frase aquí"></td>
                                            <td><p class="animated animateP flipInX" style="display:none;">Mira el juguete está<br> completo lo puedes estar<br> dañando</p><img class="animated flipInX imgC" width="260" height="200" id="img4" src="{{asset('img/fortaleciendo1.png')}}"></td>
                                            </tr>

                                                                                        <tr>
                                            <td><p>No le pegues.</p></td>
                                            <td><input type="text" class="form-control" id="input16" name="input16" required placeholder="Escribe tu frase aquí"></td>
                                            <td><p class="animated animateP flipInX" style="display:none;">Ven déjame ver las<br> manos con las manos<br> acaricias</p><img class="animated flipInX imgC" width="260" height="200" id="img4" src="{{asset('img/fortaleciendo1.png')}}"></td>
                                            </tr>

                                                                                        <tr>
                                            <td><p>No tires la comida.</p></td>
                                            <td><input type="text" class="form-control" id="input17" name="input17" required placeholder="Escribe tu frase aquí"></td>
                                            <td><p class="animated animateP flipInX" style="display:none;">La comida es para<br> comer</p><img class="animated flipInX imgC" width="260" height="200" id="img4" src="{{asset('img/fortaleciendo1.png')}}"></td>
                                            </tr>

                                                                                        <tr>
                                            <td><p>No grites cuando estoy en el teléfono.</p></td>
                                            <td><input type="text" class="form-control" id="input18" name="input18" required placeholder="Escribe tu frase aquí"></td>
                                            <td><p class="animated animateP flipInX" style="display:none;">¿Necesitas algo? espera<br> terminó de hablar y<br> ya te colaboro.</p><img class="animated flipInX imgC" width="260" height="200" id="img4" src="{{asset('img/fortaleciendo1.png')}}"></td>
                                            </tr>

                                            <tbody>
                                            </table>
                                            </div>   

                                             </div>
                                        </div>
                                    </div> 
                 </div>
</div>
<!-- FIN ROW -->
                <br />



    <!-- INICIO ROW-->              
    <div class="row">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;" >
 
    
                </div>
            </div> 

    </div>
    <br/>
    </div>
    <!-- FIN ROW-->

              

<div class="card-actionbar">
                <div class="card-actionbar-row" id="butt">
                <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark" id="next" disabled>Siguiente</button></a>
                    </div>
            </div>
</div>


</div>

</form>
@endsection

@section('addjs')
<script>
$(document).ready(function(){
    $("#next").prop("disabled", false);

    $("#next").click(function(e){
        e.preventDefault();
    });
    
    $(".imgC").click(function(){
        $(this).removeClass("flipInX");
        $(this).addClass("flipOutX");
        $(this).siblings().css("display", "block");
        $(this).delay(5000).remove();
    });

});
 
</script>

@endsection