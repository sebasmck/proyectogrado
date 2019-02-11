@extends('partials.layout')

@section('title')
Reconociendo a mi persona
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
                                            <p><b>Descripción de la actividad:</b> Para esta actividad inicialmente observarás 
                                            las siguientes imágenes, junto con la presentación de estas fotografías 
                                            responderás las preguntas que se presentan a continuación y marcaras con una
                                            X la opción que corresponda según la situación:
                                            </p>
                                            </label>
                                            <br>

                                            <div align="center">
                                            <p>Imagen 1</p>
                                            <img class="animated flipInX" width="760" height="440" id="img1" src="{{asset('img/reconociendoMiP1.png')}}">
                                            <table class="table table-striped animated jackInTheBox delay-2s">
                                            <thead>
                                            <th>Enunciado</th>
                                            <th>Si</th>
                                            <th>No</th>
                                            <th>No lo sé</th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td>¿Mi hijo/a reconoce quién cocina en casa? </td>
                                            <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio1" required="true"><span></span>
       </label></td>
                                            <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio1" required="true"><span></span>
       </label></td>
                                            <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio1" required="true"><span></span>
       </label></td>
                                            </tr>
                                            <tbody>
                                            </table>
                                            </div>


                                            <div align="center">
                                            <p>Imagen 2</p>
                                            <img class="animated flipInX" width="760" height="440" id="img2" src="{{asset('img/reconociendoMiP2.png')}}">
                                            <table class="table table-striped animated jackInTheBox delay-2s">
                                            <thead>
                                            <th>Enunciado</th>
                                            <th>Si</th>
                                            <th>No</th>
                                            <th>No lo sé</th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td>¿Mi hijo/a reconoce quién es papá y mamá?  </td>
                                            <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio2" required="true"><span></span>
       </label></td>
                                            <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio2" required="true"><span></span>
       </label></td>
                                            <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio2" required="true"><span></span>
       </label></td>
                                            </tr>
                                            <tbody>
                                            </table>
                                            </div>

                                            <div align="center">
                                            <p>Imagen 3</p>
                                            <img class="animated flipInX" width="760" height="440" id="img3" src="{{asset('img/reconociendoMiP3.png')}}">
                                            <table class="table table-striped animated jackInTheBox delay-2s">
                                            <thead>
                                            <th>Enunciado</th>
                                            <th>Si</th>
                                            <th>No</th>
                                            <th>No lo sé</th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td>¿Mi hijo/a reconoce a los miembros de su familia?</td>
                                            <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio3" required="true"><span></span>
       </label></td>
                                            <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio3" required="true"><span></span>
       </label></td>
                                            <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio3" required="true"><span></span>
       </label></td>
                                            </tr>
                                            <tbody>
                                            </table>
                                            </div>

                                            <div align="center">
                                            <p>Imagen 4</p>
                                            <img class="animated flipInX" width="760" height="440" id="img4" src="{{asset('img/reconociendoMiP4.png')}}">
                                            <table class="table table-striped animated jackInTheBox delay-2s">
                                            <thead>
                                            <th>Enunciado</th>
                                            <th>Si</th>
                                            <th>No</th>
                                            <th>No lo sé</th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td>¿Mi hijo reconoce quién lo baña? </td>
                                            <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio4" required="true"><span></span>
       </label></td>
                                            <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio4" required="true"><span></span>
       </label></td>
                                            <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio4" required="true"><span></span>
       </label></td>
                                            </tr>
                                            <tbody>
                                            </table>
                                            </div>


                                            <div align="center">
                                            <p>Imagen 5</p>
                                            <img class="animated flipInX" width="760" height="440" id="img5" src="{{asset('img/reconociendoMiP5.png')}}">
                                            <table class="table table-striped animated jackInTheBox delay-2s">
                                            <thead>
                                            <th>Enunciado</th>
                                            <th>Si</th>
                                            <th>No</th>
                                            <th>No lo sé</th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td>¿Mi hijo/a reconoce quién lava la ropa en casa? </td>
                                            <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio5" required="true"><span></span>
       </label></td>
                                            <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio5" required="true"><span></span>
       </label></td>
                                            <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio5" required="true"><span></span>
       </label></td>
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
});
 
</script>

@endsection