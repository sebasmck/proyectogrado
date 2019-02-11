@extends('partials.layout')
@section('title')
Actividad Siempre Contigo  
@endsection
<style>
        ul {
            list-style-type: none;
          }
          input[type="radio"][id^="cb"] {
            display: none;
          }
          label {
            border: 1px solid #fff;
            padding: 10px;
            display: block;
            position: relative;
            margin: 10px;
            cursor: pointer;
          }
          label::before {
            background-color: white;
            color: white;
            content: " ";
            display: block;
            border-radius: 50%;
            border: 1px solid grey;
            position: absolute;
            top: -5px;
            left: -5px;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 28px;
            transition-duration: 0.4s;
            transform: scale(0);
          }
          
          label img {
            height: 100px;
            width: 100px;
            transition-duration: 0.2s;
            transform-origin: 50% 50%;
          }
          
          :checked + label {
            border-color: #ddd;
          }
          
          :checked + label::before {
            content: "✓";
            background-color: grey;
            transform: scale(1);
          }
          
          :checked + label img {
            transform: scale(0.9);
            box-shadow: 0 0 5px #333;
            z-index: -1;
          }
          
          .grow { transition: all .2s ease-in-out; }
          .grow:hover { transform: scale(0.9); }
      
      
          .objects {
              display:inline-table;
              background-color: #FFF3CC;
              border: #DFBC6A 1px solid;
              width: 150px; 
              height: 30px;
              margin: 10px;
              padding: 8px;
              font-size: 12px;
              text-align: center;
              box-shadow: 2px 2px 2px #999;
              cursor: move;
          }
          .drop_zone {
              background-color: #EEE; 
              border: #999 1px solid;
              width: 200px; 
              height: 150px;
              padding: 5px;
              font-size: 18px;
              margin-left: 140%;
          }
          .row, b{
              margin-bottom: 30px;
          }
          #qualities{
              margin-right: 25px;
              margin-left: 15px;
              font-size: 18px;
          }
           .actContainer{
              display: inline-block;
              margin-bottom: 20px;
              margin-left: 20px;
          }
      
          </style>
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/SiempreContigo3')}}">
        <div class="card">

                <div class="card-head style-primary">
                   <header>  Contigo Siempre  - Actividad  </header>
                </div>

              <div class="card-body floating-label">

                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:justify; text-justify: inter-word;">
                        En el siguiente cuadro debes seleccionar o hacer click en las canciones que usaste con tu bebé 
                        en esta semana, y que día de la semana. Además vas encontrar algunas casillas libres donde podrás
                         escribir si usaste un material diferente al propuesto por nosotros.
                    </p>
                </div>  
                <div align="center">
                  <table>
                        <tr>
                            <th> <div align="center"> <label style="background-color: chartreuse;"> Lunes </label> </div></th>
                            <th> <div align="center"> <label style="background-color: lightblue;"> Martes </label> </div></th>
                            <th>  <div align="center"> <label style="background-color:plum;"> Miércoles</label> </div></th>
                            <th>  <div align="center"> <label style="background-color: salmon;"> Jueves</label> </div></th>
                            <th>  <div align="center"> <label style="background-color: powderblue;"> Viernes </label> </div></th>
                            <th>  <div align="center"> <label style="background-color: pink;"> Sábado </label> </div></th>
                            <th>  <div align="center"> <label style="background-color: sandybrown;"> Domingo</label> </div> </th>
                        </tr> 
                        
                        <tr>
                                <td> 
                                        <input type="radio" id="cb1" name="optionsRadios" value="1"/>
                                        <label class="grow" for="cb1"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion1.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>

                                <td> 
                                        <input type="radio" id="cb2" name="optionsRadios" value="1"/>
                                        <label class="grow" for="cb2"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion1.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>
                                <td> 
                                        <input type="radio" id="cb3" name="optionsRadios" value="1"/>
                                        <label class="grow" for="cb3"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion1.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>
                                <td> 
                                        <input type="radio" id="cb4" name="optionsRadios" value="1"/>
                                        <label class="grow" for="cb4"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion1.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>
                                <td> 
                                        <input type="radio" id="cb5" name="optionsRadios" value="1"/>
                                        <label class="grow" for="cb5"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion1.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>  
                                <td> 
                                        <input type="radio" id="cb6" name="optionsRadios" value="1"/>
                                        <label class="grow" for="cb6"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion1.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>
                                <td> 
                                        <input type="radio" id="cb7" name="optionsRadios" value="1"/>
                                        <label class="grow" for="cb7"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion1.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>
                        </tr>  

                        <tr>
                                <td> 
                                        <input type="radio" id="cb8" name="optionsRadios1" value="1"/>
                                        <label class="grow" for="cb8"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion2.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>
                                <td> 
                                        <input type="radio" id="cb9" name="optionsRadios1" value="1"/>
                                        <label class="grow" for="cb9"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion2.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>
                                <td> 
                                        <input type="radio" id="cb10" name="optionsRadios1" value="1"/>
                                        <label class="grow" for="cb10"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion2.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>
                                <td> 
                                        <input type="radio" id="cb11" name="optionsRadios1" value="1"/>
                                        <label class="grow" for="cb11"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion2.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>
                                <td> 
                                        <input type="radio" id="cb12" name="optionsRadios1" value="1"/>
                                        <label class="grow" for="cb12"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion2.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>
                                <td> 
                                        <input type="radio" id="cb13" name="optionsRadios1" value="1"/>
                                        <label class="grow" for="cb13"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion2.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>
                                <td> 
                                        <input type="radio" id="cb14" name="optionsRadios1" value="1"/>
                                        <label class="grow" for="cb14"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion2.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>       
                        </tr>  


                        <tr>
                                <td> 
                                        <input type="radio" id="cb15" name="optionsRadios2" value="1"/>
                                        <label class="grow" for="cb15"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion3.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>    
                                <td> 
                                        <input type="radio" id="cb16" name="optionsRadios2" value="1"/>
                                        <label class="grow" for="cb16"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion3.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>    
                                <td> 
                                        <input type="radio" id="cb17" name="optionsRadios2" value="1"/>
                                        <label class="grow" for="cb17"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion3.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>    
                                <td> 
                                        <input type="radio" id="cb18" name="optionsRadios2" value="1"/>
                                        <label class="grow" for="cb18"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion3.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>    
                                <td> 
                                        <input type="radio" id="cb19" name="optionsRadios2" value="1"/>
                                        <label class="grow" for="cb19"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion3.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>    
                                <td> 
                                        <input type="radio" id="cb20" name="optionsRadios2" value="1"/>
                                        <label class="grow" for="cb20"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion3.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>    
                                <td> 
                                        <input type="radio" id="cb21" name="optionsRadios2" value="1"/>
                                        <label class="grow" for="cb21"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion3.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>         

                        </tr>  

                        <tr>
                                <td> 
                                        <input type="radio" id="cb22" name="optionsRadios3" value="1"/>
                                        <label class="grow" for="cb22"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion4.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td> 
                                <td> 
                                        <input type="radio" id="cb23" name="optionsRadios3" value="1"/>
                                        <label class="grow" for="cb23"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion4.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td> 
                                <td> 
                                        <input type="radio" id="cb24" name="optionsRadios3" value="1"/>
                                        <label class="grow" for="cb24"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion4.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td> 
                                <td> 
                                        <input type="radio" id="cb25" name="optionsRadios3" value="1"/>
                                        <label class="grow" for="cb25"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion4.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td> 
                                <td> 
                                        <input type="radio" id="cb26" name="optionsRadios3" value="1"/>
                                        <label class="grow" for="cb26"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion4.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>         
                                <td> 
                                        <input type="radio" id="cb27" name="optionsRadios3" value="1"/>
                                        <label class="grow" for="cb27"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion4.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td> 
                                <td> 
                                        <input type="radio" id="cb28" name="optionsRadios3" value="1"/>
                                        <label class="grow" for="cb28"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/cancion4.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td> 
                        </tr>  
                        <tr>
                                <td> 
                                        <input type="radio" id="cb29" name="optionsRadios4" value="1"/>
                                        <label class="grow" for="cb29"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/otro.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td> 
                                <td> 
                                        <input type="radio" id="cb30" name="optionsRadios4" value="2"/>
                                        <label class="grow" for="cb30"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/otro.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td> 
                                <td> 
                                        <input type="radio" id="cb31" name="optionsRadios4" value="3"/>
                                        <label class="grow" for="cb31"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/otro.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td> 
                                <td> 
                                        <input type="radio" id="cb32" name="optionsRadios4" value="4"/>
                                        <label class="grow" for="cb32"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/otro.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td> 
                                <td> 
                                        <input type="radio" id="cb33" name="optionsRadios4" value="5"/>
                                        <label class="grow" for="cb33"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/otro.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td> 
                                <td> 
                                        <input type="radio" id="cb34" name="optionsRadios4" value="6"/>
                                        <label class="grow" for="cb34"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/otro.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td> 
                                <td> 
                                        <input type="radio" id="cb35" name="optionsRadios4" value="7"/>
                                        <label class="grow" for="cb35"><img WIDTH="100" HEIGTH="100"  id="imagen1" src="{{asset('ActividadSiempreContigo/otro.png')}}" style="margin-inline-start:10%"/> 
                                        </label>
                                </td>      

                        </tr>        
                  </table>
                           
                </div>    

                <div id="otro" class="col-sm-13" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; background-color: lightcyan; display: none;">
                                <label id="labelOtro" for="" style="color:black" >
                                       Otra Canción
                                </label>
                                <br>
                                   <textarea name="textarea1" id="textarea" class="form-control" rows="3" placeholder="" required></textarea>
                                <div class="form-control-line">
        
                                </div>
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

<script type="text/javascript">

$("#cb29").change(function()
{
            $("#otro").show();
            $("#labelOtro").text('Otra canción lunes'); 
            $("#textarea").attr("required", "true");
});
$("#cb30").change(function()
{
            $("#otro").show();
            $("#labelOtro").text('Otra canción martes'); 
            $("#textarea").attr("required", "true");
});
$("#cb31").change(function()
{
            $("#otro").show();
            $("#labelOtro").text('Otra canción miércoles'); 
            $("#textarea").attr("required", "true");
});
$("#cb32").change(function()
{
            $("#otro").show();
            $("#labelOtro").text('Otra canción jueves'); 
            $("#textarea").attr("required", "true");
});
$("#cb33").change(function()
{
            $("#otro").show();
            $("#labelOtro").text('Otra canción viernes'); 
            $("#textarea").attr("required", "true");
});
$("#cb34").change(function()
{
            $("#otro").show();
            $("#labelOtro").text('Otra canción sábado'); 
            $("#textarea").attr("required", "true");
});
$("#cb35").change(function()
{
            $("#otro").show();
            $("#labelOtro").text('Otra canción  domingo'); 
            $("#textarea").attr("required", "true");
});

$(document).ready(function()
{
$('#btnhid').change(function(){
   $("#labelpan").css("display","none");
   $("#buttonPass").fadeIn(1000);
});

});
</script>
@endsection