@extends('partials.layout')

@section('title')
Formando Niños Resilientes 4
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Formando Niños Resilientes - Ejercicio  </header>
                </div>

                <div class="card-body floating-label">

                 <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;" > 
                       <p style="text-align:center; text-justify: inter-word;"><b>  Yo cuidador </b></p>  
                      <!-- <img class="pull-right" src="{{asset('img/avatar.png')}}" alt="avatar">-->
                  </div>

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 16px;color:black;">
                    <p style="text-align:left; text-justify: inter-word;">
                            Selecciona las actividades que realizas junto a tu hijo, para que tu hijo 
                            te reconozca como su principal cuidador. </p>
                  </div> 

                  <div class="row">
                    <div class="col-sm-2">
                        <b> 1. Van juntos de viaje</b>
                        <div class="checkbox checkbox-styled">
                                <input type="checkbox" id="1" name="myCheckbox1"  value="1" />
                                <label class="checkbox-inline checkbox-styled" for="1"><img src="{{asset('ActividadFormandoNR/1.png')}}" /> </label>
                        </div>
                    </div>

                    <div class="col-sm-2"> 
                        <b> 2. Leen juntos</b> 
                        <div class="checkbox checkbox-styled">
                                <input type="checkbox" id="2" name="myCheckbox2" value="2" />
                                <label class="checkbox-inline checkbox-styled" for="2"><img src="{{asset('ActividadFormandoNR/2.png')}}" /></label>
                        </div>
                    </div>   

                    <div class="col-sm-2">
                        <b> 3. Siembran juntos</b>
                        <div class="checkbox checkbox-styled">
                                <input type="checkbox" id="3" name="myCheckbox3"  value="3" />
                                <label  class="checkbox-inline checkbox-styled" for="3"><img src="{{asset('ActividadFormandoNR/3.png')}}" /></label>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <b> 4. Tomar onces juntos</b>
                        <div class="checkbox checkbox-styled">
                                <input type="checkbox" id="4" name="myCheckbox4" value="4" />
                                <label class="checkbox-inline checkbox-styled" for="4"><img src="{{asset('ActividadFormandoNR/4.png')}}" /></label>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <b> 5. Conversan juntos	</b>
                        <div class="checkbox checkbox-styled">
                                <input type="checkbox" id="5" name="myCheckbox5"  value="5" />
                                <label class="checkbox-inline checkbox-styled" for="5"><img src="{{asset('ActividadFormandoNR/5.png')}}" /></label>
                        </div>
                    </div>

                </div>


                <div class="row">

                      <div class="col-sm-2">
                          <b> 6. Caminan juntos</b> 
                        <div class="checkbox checkbox-styled">
                                <input type="checkbox" id="6" name="myCheckbox6"  value="6"/>
                                <label  class="checkbox-inline checkbox-styled" for="6"><img src="{{asset('ActividadFormandoNR/6.png')}}"/></label>
                        </div>
                    </div>
                    
                    <div class="col-sm-2">
                        <b>7. Van de paseo juntos</b>
                        <div class="checkbox checkbox-styled">
                                <input type="checkbox" id="7" name="myCheckbox7"  value="7"/>
                                <label class="checkbox-inline checkbox-styled" for="7"><img src="{{asset('ActividadFormandoNR/7.png')}}" /></label>
                        </div>
                    </div>

                    <div class="col-sm-2"> 
                        <b> 8. Van de vacaciones juntos</b>
                        <div class="checkbox checkbox-styled">
                                <input type="checkbox" id="8" name="myCheckbox8" value="8"/>
                                <label class="checkbox-inline checkbox-styled" for="8"><img src="{{asset('ActividadFormandoNR/8.png')}}" /> </label>
                        </div>
                    </div>

                    <div class="col-sm-2">   
                        <b> 9. Cocinan juntos</b> 
                        <div class="checkbox checkbox-styled">
                                <input type="checkbox" id="9" name="myCheckbox9" value="9"/>
                                <label class="checkbox-inline checkbox-styled" for="9"><img src="{{asset('ActividadFormandoNR/9.png')}}" /></label>
                        </div>
                    </div>

                    <div class="col-sm-2">  
                        <b> 10. Hacen tareas juntos</b> 
                        <div class="checkbox checkbox-styled">
                                <input type="checkbox" id="10" name="myCheckbox10"  value="10"/>
                                <label class="checkbox-inline checkbox-styled" for="10"><img src="{{asset('ActividadFormandoNR/10.png')}}" /></label>
                        </div>
                    </div>
                  
                </div>

                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/FormandoNR6')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
@section('addjs')

<script scr="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script>
    $(document).ready( function () {
        $('#example').DataTable();
    } );    
</script>


@endsection  