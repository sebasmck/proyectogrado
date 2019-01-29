@extends('partials.layout')

@section('title')
Post Test Cierre 3 
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" method="POST" action="{{route('/preguntascierreposttest4')}}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                <header> Post Test - Preguntas De Cierre  </header>
                </div>

                <div class="card-body floating-label">
                    <p style="text-align:left; text-justify: inter-word;">
                       ¿Crees que aprendiste a lo largo del programa?
                    </p> 
                     <div style="margin-left:10%;" class="row">
                        <br>

                        <div class="col-sm-2">
                         <input type="radio" id="a" name="myCheckbox1" required value="1"/>
                         <label for="a"><img src="{{asset('posttest/si.png')}}" /></label>
                          <br></div>
                         <div class="col-sm-2" >
                         <input type="radio" id="b" name="myCheckbox1" value="0"/>
                         <label for="b"><img src="{{asset('posttest/no.png')}}" /></label> 
                        </div>



                        <div class="col-sm-8" >
                                    <label for="">
                                    ¿POR QUÉ? 
                                    </label>
                                    <br>
                                    <textarea name="textarea13" id="textarea13" class="form-control" rows="3" placeholder="" required style="border:solid 1px blue;"></textarea><div class="form-control-line"></div>
                        </div>    
            
                    </div>
                    
                    </div>

                    <br>

        <div class="card-body floating-label">
           <p style="text-align: left; text-justify: inter-word;">
            ¿Recomendarías este programa a otros padres?
           </p> 
        <div style="margin-left:10%;" class="row">
           <br>
                         <div class="col-sm-2">
                         <input type="radio" id="ab" name="myCheckbox2" required value="1" />
                         <label for="ab"><img src="{{asset('posttest/si.png')}}" /></label>
                          <br></div>
                         <div class="col-sm-2" >
                         <input type="radio" id="bc" name="myCheckbox2" value="0"/>
                         <label for="bc"><img src="{{asset('posttest/no.png')}}" /></label> 
                        </div>

             <div class="col-sm-8" >
                <label for="">
                ¿POR QUÉ? 
                </label>
                <br>
                <textarea name="textarea2" id="textarea2" class="form-control" rows="3" placeholder="" required style="border:solid 1px blue;" ></textarea><div class="form-control-line"></div>
             </div>  
               
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