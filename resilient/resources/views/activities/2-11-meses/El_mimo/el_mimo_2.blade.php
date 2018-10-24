@extends('partials.layout')

@section('title')
El mimo
@endsection

@section('content')
<form action="{{route('/ftpUpImagesActivityLoQueMasTGuste') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="col-lg-offset-2 col-md-8">

<div class="card">
<div class="card-head style-primary">
                    <header>Logros obtenidos</header>
                </div>
 <div class="card-body floating-label">
  <div class="row">

        

                 <div class="row">
                                   <div class="col-sm-12">
                                        <div class="form-group">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;" >
                                            <label> 
                                            <p>Incentivar a que los niños sean los mimos, es una de las habilidades que los cuidadores pueden fomentar
con situaciones de la vida cotidiana. Implementar a que los niños imiten comportamiento que les ayudará a afrontar situaciones en su vida.
Cada vez que tengas la oportunidad recuerda el papel de “mimo” que tiene tu niño. Haz lo posible por
proveer o fomentar situaciones asertivas o buenas para que él las replique.</p>
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
    


    <!--<input type="submit" value="Upload Image" name="submit"-->
                  </div>
             </div>
         </div> 

</div>
<br/>
</div>


              

<div class="card-actionbar">
                <div class="card-actionbar-row">
                <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                    </div>
            </div>
</div>


</div>

</form>
@endsection

@section('addjs')

<script>
$(document).ready(function(){


});
 
</script>

@endsection