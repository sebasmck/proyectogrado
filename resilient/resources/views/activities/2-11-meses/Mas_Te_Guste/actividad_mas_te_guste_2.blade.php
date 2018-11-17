@extends('partials.layout')

@section('title')
Hasta el final
@endsection

@section('content')
<form action="{{route('/ftpUpImagesActivityLoQueMasTGuste') }}" method="post" enctype="multipart/form-data">
<div class="col-lg-offset-2 col-md-8">

<div class="card">
<div class="card-head style-primary">
                    <header>Aprendiendo a emprender</header>
                </div>
 <div class="card-body floating-label">
  <div class="row">

        

                 <div class="row">
                                   <div class="col-sm-12">
                                        <div class="form-group">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px; text-align:center;" >
                                            <label> 
                                            Ahora, ¡Hazlo tú! Con el ejercicio que elegiste con tu hijo
                                            </label>

                                             </div>
                                        </div>
                                    </div> 
                 </div>
</div>
                <br />
              
                <div class="row">


<div class="row">
        <div class="col-sm-12">
             <div class="form-group">
             <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:gray;" >
    
           
{{ csrf_field() }}

<table class="table table-striped">


<tr>
<td>
<label id="labelpan" class="btn btn-default btn-file" style="background-color:#0097A7;color:white;  border-radius: 25px;">
    Seleccionar Imagen <input required type="file" name="fileToUpload1" style="display: none;" id="btnhid">
</label>
<button id="buttonPass" style="color:black;background-color:gray;display:none;border-radius:15px;border: 2px solid gray;" disabled>Imagen ya seleccionada</button>
</td>

<td><label id="labelpan2" class="btn btn-default btn-file" style="background-color:#AFB42B; color:white;border-radius: 25px;">
    Seleccionar Imagen <input required type="file" name="fileToUpload2" style="display: none;" id="btnhid2">
</label>
<button id="buttonPass2" style="color:black;background-color:gray;display:none;border-radius:15px;border: 2px solid gray;" disabled>Imagen ya seleccionada</button>
</td>
<td><label id="labelpan3" class="btn btn-default btn-file" style="background-color:#388E3C;color:white;  border-radius: 25px;">
    Seleccionar Imagen <input required type="file" name="fileToUpload3" style="display: none;" id="btnhid3">
</label>
<button id="buttonPass3" style="color:black;background-color:gray;display:none;border-radius:15px;border: 2px solid gray;" disabled>Imagen ya seleccionada</button>
</td>
</tr>

<tr>
<td>
<label id="labelpan4" class="btn btn-default btn-file" style="background-color:#FBC02D; color:white; border-radius: 25px;">
    Seleccionar Imagen <input required type="file" name="fileToUpload4" style="display: none;" id="btnhid4">
</label>
<button id="buttonPass4" style="color:black;background-color:gray;display:none;border-radius:15px;border: 2px solid gray;" disabled>Imagen ya seleccionada</button>
</td>

<td><label id="labelpan5" class="btn btn-default btn-file" style="background-color:#F57C00; color:white; border-radius: 25px;">
    Seleccionar Imagen <input required type="file" name="fileToUpload5" style="display: none;" id="btnhid5">
</label>
<button id="buttonPass5" style="color:black;background-color:gray;display:none;border-radius:15px;border: 2px solid gray;" disabled>Imagen ya seleccionada</button>
</td>
<td><label id="labelpan6" class="btn btn-default btn-file" style="background-color:#5D4037;color:white; color:white; border-radius: 25px;">
    Seleccionar Imagen <input required type="file" name="fileToUpload6" style="display: none;" id="btnhid6">
</label>
<button id="buttonPass6" style="color:black;background-color:gray;display:none;border-radius:15px;border: 2px solid gray;" disabled>Imagen ya seleccionada</button>
</td>
</tr>


<tr>
<td>
<label id="labelpan7" class="btn btn-default btn-file" style="background-color:#455A64; color:white; border-radius: 25px;">
    Seleccionar Imagen <input required type="file" name="fileToUpload7" style="display: none;" id="btnhid7">
</label>
<button id="buttonPass7" style="color:black;background-color:gray;display:none;border-radius:15px;border: 2px solid gray;" disabled>Imagen ya seleccionada</button>
</td>

<td><label id="labelpan8" class="btn btn-default btn-file" style="background-color:#689F38; color:white; border-radius: 25px;">
    Seleccionar Imagen <input required type="file" name="fileToUpload8" style="display: none;" id="btnhid8">
</label>
<button id="buttonPass8" style="color:black;background-color:gray;display:none;border-radius:15px;border: 2px solid gray;" disabled>Imagen ya seleccionada</button>
</td>
<td><label id="labelpan9" class="btn btn-default btn-file" style="background-color:#AFB42B;color:white; color:white; border-radius: 25px;">
    Seleccionar Imagen <input required type="file" name="fileToUpload9" style="display: none;" id="btnhid9">
</label>
<button id="buttonPass9" style="color:black;background-color:gray;display:none;border-radius:15px;border: 2px solid gray;" disabled>Imagen ya seleccionada</button>
</td>
</tr>

</table>


    <!--<input type="submit" value="Upload Image" name="submit"-->
                  </div>
             </div>
         </div> 

</div>
<br/>
</div>


              

<div class="card-actionbar">
                <div class="card-actionbar-row">
                <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Subir imágenes y seguir</button></a>
                    </div>
            </div>
</div>


</div>

</form>
@endsection

@section('addjs')

<script type="text/javascript">
$(document).ready(function(){

$('#btnhid').change(function(){
   $("#labelpan").css("display","none");
   $("#buttonPass").fadeIn(1000);
});

$('#btnhid2').change(function(){
   $("#labelpan2").css("display","none");
   $("#buttonPass2").fadeIn(1000);
});

$('#btnhid3').change(function(){
   $("#labelpan3").css("display","none");
   $("#buttonPass3").fadeIn(1000);
});

$('#btnhid4').change(function(){
   $("#labelpan4").css("display","none");
   $("#buttonPass4").fadeIn(1000);
});

$('#btnhid5').change(function(){
   $("#labelpan5").css("display","none");
   $("#buttonPass5").fadeIn(1000);
});

$('#btnhid6').change(function(){
   $("#labelpan6").css("display","none");
   $("#buttonPass6").fadeIn(1000);
});

$('#btnhid7').change(function(){
   $("#labelpan7").css("display","none");
   $("#buttonPass7").fadeIn(1000);
});

$('#btnhid8').change(function(){
   $("#labelpan8").css("display","none");
   $("#buttonPass8").fadeIn(1000);
});

$('#btnhid9').change(function(){
   $("#labelpan9").css("display","none");
   $("#buttonPass9").fadeIn(1000);
});





});
</script>
@endsection