@extends('partials.layout')

@section('title')
Hasta el final
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
 <form class="form" method="GET" action="{{route('/HastaFinal4') }}">
{{csrf_field()}}
<div class="card">
<div class="card-head style-primary">
                    <header>Logros obtenidos</header>
                </div>
 <div class="card-body floating-label">
  <div class="row">

        

                 <div class="row">
                                   <div class="col-sm-7">
                                        <div class="form-group">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:gray;" >
                                            <label> 
                                            ¿Cuál fue la reacción de tu hijo al decirle estas frases?
                                           </label>

                                             </div>
                                        </div>
                                    </div> 

                                    <div class="col-sm-4">
                                    <textarea class="form-control" rows="4" cols="30"></textarea>
                                    </div>
                 </div>
</div>
                <br />
              
                <div class="row">


<div class="row">
        <div class="col-sm-7">
             <div class="form-group">
             <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:gray;" >
                 <label> 
                 ¿Cómo te sentiste al decirle estas palabras a tu hijo?
                </label>

                  </div>
             </div>
         </div> 

         <div class="col-sm-4">
         <textarea class="form-control" rows="4" cols="30"></textarea>
         </div>
</div>
<br/>
</div>

                <div class="row">

<div class="row">
        <div class="col-sm-7">
             <div class="form-group">
             <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:gray;" >
                 <label> 
                 ¿Implementarías estas frases en otras actividades de tu hijo?
                </label>

                  </div>
             </div>
         </div> 

         <div class="col-sm-4">
         <textarea class="form-control" rows="4" cols="30"></textarea>
         </div>
</div>
</div>

              

<div class="card-actionbar">
                <div class="card-actionbar-row">
                <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark" onclick="guardarRespuestasPorArrayTextArea([6,7,8])">Siguiente</button></a>
                    </div>
            </div>
</div>
 </form> 
</div>

@endsection

@section('addjs')

<script>



</script>



@endsection