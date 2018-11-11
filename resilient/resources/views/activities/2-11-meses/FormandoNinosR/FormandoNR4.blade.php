@extends('partials.layout')

@section('title')
Formando Niños Resilientes 4
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" method="GET" action="{{route('/FormandoNR5')}}">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Formando Niños Resilientes - Ejercicio  </header>
                </div>

                <div class="card-body floating-label">

                 <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;" > 
                       <p style="text-align:center; text-justify: inter-word;"><b> Este ejercicio es para mi </b></p>  
                      <!-- <img class="pull-right" src="{{asset('img/avatar.png')}}" alt="avatar">-->
                  </div>

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 16px;color:black;">
                    <p style="text-align:left; text-justify: inter-word;">
                            Del listado de características resilientes. ¿Cuáles identificas en ti mismo?</p>
                  </div> 
               
                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">    
                        <table border ="black" id="example" class="display" >
                                <tr>
                                <th> Caracteristicas Resilientes </th>
                                <th>La identifico en mi</th>
                                <th>No la identifico en mi</th>
                                </tr> 
     
                                <tr>
                                <td> Confianza</p></td>
                                <td> <input type="radio" name="si/No1" value="1" required> Si <br></td>
                                <td> <input type="radio" name="si/No1" value="0"> No <br> </td>
                                </tr> 
     
                                <tr>
                                <td>Educación</th>
                                <td><input type="radio" name="si/No2" value="1" required> Si</td>
                                <td><input type="radio" name="si/No2" value="0"> No</td>
                                </tr> 
     
                                <tr>
                                <td>Afecto <br></th>
                                <td><input type="radio" name="si/No3" value="1" required> Si</td>
                                <td><input type="radio" name="si/No3" value="0"> No</td>
                                </tr>
     
                                <tr>
                                <td>Socialización <br></td>
                                <td><input type="radio" name="si/No4" value="1" required> Si</td>
                                <td><input type="radio" name="si/No4" value="0"> No</td>
                                </tr> 

                                <tr>
                                        <td>Autonomía <br></td>
                                        <td><input type="radio" name="si/No5" value="1" required> Si</td>
                                        <td><input type="radio" name="si/No5" value="0"> No</td>
                                        </tr> 
     
                             </table>
                  </div>

                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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