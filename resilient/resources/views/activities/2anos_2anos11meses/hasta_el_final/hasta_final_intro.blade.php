@extends('partials.layout')

@section('title')
Hasta el final
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
 <form class="form" method="POST" action="{{route('/test1_actividad_real') }}">
{{csrf_field()}}
<div class="card">
         
 <div class="card-body floating-label">
  <div class="row">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group"> 
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 40px;">
                                            <label> 
                                            Hasta el Final</label></div>
                                        </div>
                                    </div>
                                </div>

                 <div class="row">
                                   <div class="col-sm-12">
                                        <div class="form-group">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:gray;" >
                                            <label> 
                                             El periodo de tiempo comprendido entre los 2 y los 3 años son en los cuales la autonomía
                                             de los niños empieza a desarrollarse con mayor fuerza. Este cambio se genera cuando los 
                                             niños o niñas insisten en hacer las cosas por sí mismo, muestra insistencia en conseguir lo 
                                             que desea, avisa cuando tiene necesidades fisiológicas, ayuda en las actividades de la casa,
                                             empieza a comer solo o a vestirse solo. Pero de igual forma frente a algunas situaciones
                                             puede hacer berrinches al frustrarse, impaciente o demandante.

                                            Es por esto por lo que esta semana se trabajará es en algunas destrezas para ayudar a los
                                            niños y niñas a impulsar su autonomía y así poder resolver problemas “hasta el final”. Así
                                            mismo ayudara a impulsarlo a hacer cosas por sí mismo poco a poco con menos ayuda de
                                            algún adulto.
                                           </label>
                                             </div>
                                        </div>
                                    </div>                       
                 </div>
            <hr>     

        </div>
</div>

<div class="card-actionbar">
                <div class="card-actionbar-row">
                <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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