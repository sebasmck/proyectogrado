@extends('partials.layout')

@section('title')
Pretest 1
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" id="pregunta3" method="POST" action="{{route('/pretest5')}}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                    <header>Pretest</header>
                </div>

                <div class="card-body floating-label">
                    <p><b>3. ¿Cuáles elementos crees que conforman la resiliencia? Puedes seleccionar una o varias opciones.</b></p>
                    <br>

                    <div class="col-sm-6">
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input type="checkbox" value="1" name="autoestima"  required="true">
                                    <span>a. Autoestima</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input type="checkbox" value="2" name="afecto">
                                    <span>b. Afecto</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input type="checkbox" value="3" name="autonomia">
                                    <span>c. Autonomía</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input type="checkbox" value="4" name="reconocimiento">
                                    <span>d. Reconocimiento de cuidadores</span>
                                </label>
                            </div>
                            <div class="checkbox checkbox-styled">
                                <label>
                                    <input type="checkbox" value="5" name="confianza">
                                    <span>e. Confianza</span>
                                </label>
                            </div>
                            
                    </div>


                    <br><br>
                </div> {{-- card-body no padding --}}



                    
            </div><!--end .card-body -->

            <div class="card-actionbar">
                    <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction"> <button onclick="convertirValoresCheckbox()" type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                    </div>
              </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection

@section('addjs')

<script>

        var tl = new TimelineLite();
    
         avatar = $('.avatar');

        

        function convertirValoresCheckbox()
        {
            var checkboxes = $("checkbox");  
            for (var i=0; i<checkboxes.length; i++) 
            {
               var actual = checkboxes[i];
               console.log("Entro al if");
               if($(actual.attr( "checked" )== true ))
               {
                console.log("Entro al if");
                   actual = 1;
               }
               else
               {
                   actual.val() = 0; 
               }

            }
           $('#pregunta3').submit();
        }
    
    </script>

@endsection 