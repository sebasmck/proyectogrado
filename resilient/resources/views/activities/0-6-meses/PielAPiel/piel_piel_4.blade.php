@extends('partials.layout')

@section('title')
Piel a piel después del baño
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
                    <header>Piel a piel después del baño: Nuestros logros</header>
                </div>
 <div class="card-body floating-label">

    <!-- INICIO ROW-->              
    <div class="row">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;" >
 <div id="titleTxt">
 ¿Quiénes participaron en este encuentro?
</div>

                            <div class="checkbox checkbox-styled">
                               <label class="checkbox-inline checkbox-styled">
                                    <input type="checkbox" name="mama" value="1"><span>Mamá</span>
                               </label>
                            </div>

                                                        <div class="checkbox checkbox-styled">
                               <label class="checkbox-inline checkbox-styled">
                                    <input type="checkbox" name="papa" value="1"><span>Papá</span>
                               </label>
                            </div>

                                                        <div class="checkbox checkbox-styled">
                               <label class="checkbox-inline checkbox-styled">
                                    <input type="checkbox" name="hermano" value="1"><span>Hermanos</span>
                               </label>
                            </div>

                                                        <div class="checkbox checkbox-styled">
                               <label class="checkbox-inline checkbox-styled">
                                    <input type="checkbox" name="abuelo" value="1"><span>Abuelos</span>
                               </label>
                            </div>

                                                        <div class="checkbox checkbox-styled">
                               <label class="checkbox-inline checkbox-styled">
                                    <input type="checkbox" name="tios" value="1"><span>Tios</span>
                               </label>
                            </div>

                                <div class="checkbox checkbox-styled">
                               <label class="checkbox-inline checkbox-styled">
                                    <input id="otr" type="checkbox" name="otro" value="1"><span>Otro ¿Quien?</span>
                               </label>
                            </div>

                            <div style="display:none;" id="inputOtroP" class="input-group-content">
                                                    <input type="text" placeholder="Otro" class="form-control" id="otroI" name="otroI">
                                                    <label for="otroI"></label>
                            </div>
                           <br>

                            <div id="divInput2" class="input-group-content">
                            ¿Cuál fue la participación de cada uno de ellos?
                                                    <input type="text" class="form-control" id="input2" name="input2">
                                                    <label for="input2"></label>
                            </div>
                            <br>
                            <div id="divInput3" class="input-group-content">
                            ¿Qué lugar de la casa hemos escogido? 
                                                    <input type="text" class="form-control" id="input3" name="input3">
                                                    <label for="input3"></label>
                            </div>
                            <br>
                            <div id="divInput4" class="input-group-content">
                            ¿Cómo me siento compartiendo el masaje con el bebé? 
                            <input type="text" class="form-control" id="input4" name="input4">
                             <label for="input4"></label>
                            </div>

                            <br>

                            <div id="divInput5" class="input-group-content">
                            ¿Cómo fue el comportamiento del bebé durante el masaje? 
                            <input type="text" class="form-control" id="input5" name="input5">
                             <label for="input5"></label>
                            </div>

<br><br>
                                        <table class="table table-striped animated jackInTheBox delay-2s">
  
  <thead>
  <th>Enunciado</th>
  <th>Si</th>
  <th>No</th>
  </thead>
  <tbody>
    <tr>
      <td><p>¿El bebé expresa sus emociones 
      de agrado o desagrado a la hora del masaje?</p></td>

      <td><label class="radio-inline radio-styled">
                                            <input type="radio" name="radio1" required="true"><span></span>
                                        </label></td>
      <td><label class="radio-inline radio-styled">
        <input type="radio" name="radio1" required="true"><span></span>
       </label></td>
    </tr>

    <tr>
      <td><p>¿Lograste que el bebé descanse más profundamente en la noche?
</p></td>

      <td><label class="radio-inline radio-styled">
                                            <input type="radio" name="radio2" required="true"><span></span>
                                        </label></td>
                                        <td><label class="radio-inline radio-styled">
                                            <input type="radio" name="radio2" required="true"><span></span>
                                        </label></td>
    </tr>

    <tr>
      <td><p>¿Siento que puedo hablarle a bebé y él se muestra receptivo?</p></td>

      <td><label class="radio-inline radio-styled">
                                            <input type="radio" name="radio3" required="true"><span></span>
                                        </label></td>
                                        <td><label class="radio-inline radio-styled">
                                            <input type="radio" name="radio3" required="true"><span></span>
                                        </label></td>
    </tr>
  </tbody>
</table>
<br>
                                                        <div id="divInput6" class="input-group-content">
                                                        ¿Qué puedo mejorar a la de masajear al bebé? 
                            <input type="text" class="form-control" id="input6" name="input6">
                             <label for="input6"></label>
                            </div>


                </div>

            </div> 

    </div>
    <br/>
    </div>
    <!-- FIN ROW-->

              

<div class="card-actionbar">
                <div class="card-actionbar-row" id="butt">
                <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark" id="next">Siguiente</button></a>
                    </div>
            </div>
</div>


</div>

</form>
@endsection

@section('addjs')
<script src="{{asset('js/jquery.maphilight.js')}}"></script>
<script>
$(document).ready(function(){ 

  $("#otr").click(function(){ 

      if($("#otr").attr("checked")){
        $("#inputOtroP").fadeIn();
        $("#otroI").prop("required", true);
      }else{
        $("#inputOtroP").fadeOut();
        $("#otroI").prop("required", false);
      }
  });

});
</script>

@endsection