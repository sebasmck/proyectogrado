@extends('partials.layout')

@section('title')
Post Test Cierre 2 
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" method="POST" action="{{route('/preguntascierreposttestfinal')}}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                <header> Post Test - Preguntas De Cierre Autoevaluación </header>
                </div>

          <div class="card-body floating-label">
                    <p style="text-align:center; text-justify: inter-word;">
                       ¿Qué tan comprometido estuviste de 1 a 5?
                    </p> 

                     <div style="margin-left:10%;" class="row">
                        <br>

                        <div class="col-sm-2">
                         <input type="radio" id="a" name="myCheckbox1" required value="1"/>
                         <label for="a"><img src="{{asset('posttest/estre1.png')}}" /></label>
                        <br> </div>

                         <div class="col-sm-2" >
                         <input type="radio" id="b" name="myCheckbox1" value="2"/>
                         <label for="b"><img src="{{asset('posttest/estre2.png')}}" /></label>
                        </div>

                         <div class="col-sm-2">
                          <input type="radio" id="c" name="myCheckbox1" value="3"/>
                          <label for="c"><img src="{{asset('posttest/estre3.png')}}" /></label>
                        </div>

                         <div class="col-sm-2">
                        <input type="radio" id="d" name="myCheckbox1" value="4"/>
                         <label for="d"><img src="{{asset('posttest/estre4.png')}}" /></label>
                        </div>    

                         <div class="col-sm-2">
                           <input type="radio" id="e" name="myCheckbox1" value="5"/>
                         <label for="e"><img src="{{asset('posttest/estre5.png')}}" /></label>
                        </div>
     
                    </div>

                    <br>

                   <div class="card-body floating-label">
                    <p style="text-align:center; text-justify: inter-word;">
                            ¿Qué tan motivado estuviste de 1 a 5?
                    </p> 

                     <div style="margin-left:10%;" class="row">
                        <br>
                        <div class="col-sm-2">
                         <input type="radio" id="f" name="myCheckbox2" required value="1"/>
                         <label for="f"><img src="{{asset('posttest/estre1.png')}}" /></label>
                        <br> </div>

                         <div class="col-sm-2" >
                         <input type="radio" id="g" name="myCheckbox2" value="2"/>
                         <label for="g"><img src="{{asset('posttest/estre2.png')}}" /></label>
                        </div>

                         <div class="col-sm-2">
                          <input type="radio" id="h" name="myCheckbox2" value="3"/>
                          <label for="h"><img src="{{asset('posttest/estre3.png')}}" /></label>

                        </div>

                         <div class="col-sm-2">
                        <input type="radio" id="i" name="myCheckbox2" value="4"/>
                         <label for="i"><img src="{{asset('posttest/estre4.png')}}" /></label>

                        </div>    

                         <div class="col-sm-2">
                          <input type="radio" id="j" name="myCheckbox2" value="5"/>
                         <label for="j"><img src="{{asset('posttest/estre5.png')}}" /></label>
                        </div>
     
                    </div>
                    <br>

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

<script>

    preventDoubleSubmit();

</script>

@endsection