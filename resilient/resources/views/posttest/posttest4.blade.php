@extends('partials.layout')

@section('title')
Post Test 3
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" id="formulario" method="POST" action="{{route('/posttest5')}}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                    <header>Post Test</header>
                </div>

                <div class="card-body floating-label">
                        <p><b>3. ¿Cuáles elementos crees que conforman la resiliencia? Puedes seleccionar una o varias opciones.</b></p>
                        <br>
    
                        <div class="col-sm-6">
                                <div class="checkbox checkbox-styled">
                                   <label class="checkbox-inline checkbox-styled">
                                        <input type="checkbox" name="Autoestima" value="1"><span>a. Autoestima</span>
                                        <!--{!! Form::checkbox('Autoestima', '1') !!}<span>a. Autoestima</span>-->
                                   </label>
                                </div>
    
                                <div class="checkbox checkbox-styled">
                                    <label class="checkbox-inline checkbox-styled">
                                        <input type="checkbox" name="Afecto" value="1"><span>b. Afecto</span>
                                        <!--{!! Form::checkbox('Afecto', '1') !!}<span>b. Afecto</span>-->
                                   </label>
                                </div>
    
                                <div class="checkbox checkbox-styled">
                                 <label class="checkbox-inline checkbox-styled">
                                        <input type="checkbox" name="Autonomia" value="1"><span>c. Autonomia</span>
                                       <!-- {!! Form::checkbox('Autonomia', '1') !!}<span>c. Autonomia</span>-->
                                 </label>
                                </div>
    
                                <div class="checkbox checkbox-styled">
                                <label class="checkbox-inline checkbox-styled">
                                        <input type="checkbox" name="Reconocimiento" value="1"><span>d.Reconocimiento de cuidadores</span>
                                      <!--  {!! Form::checkbox('Reconocimiento', '1') !!}<span>d.Reconocimiento de cuidadores</span>-->
                                 </label>
                                </div>
    
                                <div class="checkbox checkbox-styled">
                                <label class="checkbox-inline checkbox-styled">
                                        <input type="checkbox" name="Confianza" value="1"><span>e. Confianza</span>
                                       <!-- {!! Form::checkbox('Confianza', '1') !!}<span>e. Confianza</span>-->
                                 </label>
                                </div>
                                
                        </div>
    
    
                        <br><br>
                    </div> {{-- card-body no padding --}}
    
    
    
                        
                </div><!--end .card-body -->
    
                <div class="card-actionbar">
                        <div class="card-actionbar-row">
                        <a style="btn btn-flat btn-primary ink-reaction"> <button onclick="validar()" type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                        </div>
                  </div>
    
            </div><!--end .card -->
                
            </form>
        </div>

@endsection

@section('addjs')

<script>



 function validar ()
    {
        if($('input[type=checkbox]:checked').length == 0)
        {
            alert("debe seleccionar por lo menos un elemento ");
            event.preventDefault();
            return false;
        }else 
        {
            document.getElementById("formulario").submit();
            return true;
        }

    }   
    </script>

@endsection 