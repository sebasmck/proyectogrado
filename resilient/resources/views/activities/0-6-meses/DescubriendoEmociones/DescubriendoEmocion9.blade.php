@extends('partials.layout')

@section('title')
Descubriendo Las Emociones 
@endsection
  
@section('content')
<div class="container" id="initialContent" style="display:none">
        <div align="center">
                    <img style="width:300px;height:300px;text-align:center;" src="{{asset('img/logo.png')}}">
        </div>
</div>

<div class="col-lg-offset-2 col-md-8">
            <div class="card">
                <div class="card-head style-primary">
                   <header>  Descubriendo Las Emociones  - Parte Cuatro </header>
                </div>

              <div class="card-body floating-label">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                  <p style="text-align:justify; text-justify: inter-word;">
                        Ahora vas a conocer cuáles son las señales de tu cuerpo, tus pensamientos y tus 
                        acciones con cada una de las emociones básicas.
                  </p>
                  <p style="text-align:justify; text-justify: inter-word;">
                        Selecciona por cual emoción quieres comenzar
                  </p>
                </div> 

                <div>
                    <table align="center">
                        <tr>
                           <td> <input onclick="dialogoAlegria()" type="image" src="{{ asset('ActividadDescubriendoEmociones/btnAlegria.png') }}" height="" width=""/> </td>
                           <td> <input onclick="dialogoEnojo()" type="image" src="{{ asset('ActividadDescubriendoEmociones/btnEnojo.png') }}" height="" width=""/> </td>
                        </tr>
                        <tr>
                            <td><input onclick="dialogoMiedo()" type="image" src="{{asset('ActividadDescubriendoEmociones/btnMiedo.png') }}"/></td>
                            <td><input onclick="dialogoTristeza()" type="image" src="{{asset('ActividadDescubriendoEmociones/btnTristeza.png') }}" height="" width=""/> </td>
                        </tr>
                    </table>
                </div>

             </div> {{-- card-body no padding --}}
    

        </div><!--end .card -->
    </div>
    
<!-- Comienzo del modal de Inicio Actividad-->
<div class="modal fade" id="miedo1" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Miedo - ¿Para qué sirve el miedo? </b> </h4>
              </div>
               <div class="modal-body">
                    <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                            <p style="text-align:justify; text-justify: inter-word;">
                                    No siempre el miedo es negativo como muchas de las personas creen, 
                                    sino que tiene una función como mecanismo de seguridad que te permite
                                     llevar cabo acciones con las cuales te podrás defender frente a una 
                                     situación de amenaza. Aquí te daremos un ejemplo: en el video o animación 
                                     se ejemplifica una situación básica en la que van a robar a una persona, 
                                     y está activa el miedo y puede responder adecuadamente a la situación.
                            </p>
                          </div>  
                </div> <!--modal body close -->
              <div class="modal-footer">
                <span class="pull-right">
                <!-- SI acepta sigue el flujo normal de la aplicación-->
                   <button id="btnMiedo2" type="button" class="btn btn-primary" data-dismiss="modal">
                     Siguiente
                   </button>
                </span>
              </div>
         </div><!--modal content close -->
     </div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal Miedo 1 -->

<!-- Comienzo del modal de Miedo 2-->
<div class="modal fade" id="miedo2" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Miedo - ¿Cómo se experimenta el miedo? </b> </h4>
              </div>
               <div class="modal-body">
                    <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                            <p style="text-align:justify; text-justify: inter-word;">
                                Cada persona es un individuo diferentes y único, eso quiere decir que no todos vivimos el miedo 
                                de la misma forma; encontrarás unos ejemplos de cómo se puede experimentar 
                                y luego tú vas a tener que pensar y escribir cómo lo vives tú.  
                            </p>
                     </div>
                     <div align="center">
                            <img WIDTH="" HEIGTH=""  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/bMiedo.png')}}"/>
                     </div> 
                     <div align="center" >   
                         <img   id="imagen2" src="{{asset('ActividadDescubriendoEmociones/fMiedo.png')}}"/>
                         <img   id="imagen3" src="{{asset('ActividadDescubriendoEmociones/cMiedo.png')}}"/>
                         <img   id="imagen4" src="{{asset('ActividadDescubriendoEmociones/mMiedo.png')}}"/>
                    </div> 
                    <div align="center" >   
                            <img   id="imagen5" src="{{asset('ActividadDescubriendoEmociones/ejemploMiedo1.png')}}"/>
                            <img   id="imagen6" src="{{asset('ActividadDescubriendoEmociones/ejemploMiedo2.png')}}"/>
                            <img   id="imagen7" src="{{asset('ActividadDescubriendoEmociones/ejemploMiedo3.png')}}"/>
                    </div> 
                     
                </div> <!--modal body close -->
              <div class="modal-footer">
                <span class="pull-right">
                <!-- SI acepta sigue el flujo normal de la aplicación-->
                   <button id="btnMiedo3" type="button" class="btn btn-primary" data-dismiss="modal">
                     Siguiente
                   </button>
                </span>
              </div>
         </div><!--modal content close -->
     </div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal Miedo 2 -->

<!-- Comienzo del modal de Inicio Actividad Miedo 3 -->
<div class="modal fade" id="miedo3" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Miedo - ¿Para qué sirve el miedo? </b> </h4>
              </div>
               <div class="modal-body">

                    <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                            <p style="text-align:justify; text-justify: inter-word;">
                                    Ahora es tu turno, escribe una situación que te genera miedo y
                                     después piensa qué siente tu cuerpo en esa situación, que piensas y cuáles 
                                     son las acciones que tomas. 
                            </p>
                          </div>
                          <div align="center">
                                <img style="margin-right:5%" WIDTH="" HEIGTH=""  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/bMiedo.png')}}"/>
                         </div> 
                         <div align="center" >   
                             <img  style="margin-right:12% "id="imagen2" src="{{asset('ActividadDescubriendoEmociones/fMiedo.png')}}"/>
                             <img   style="margin-right:10%" id="imagen3" src="{{asset('ActividadDescubriendoEmociones/cMiedo.png')}}"/>
                             <img   style="margin-right:5%"  id="imagen4" src="{{asset('ActividadDescubriendoEmociones/mMiedo.png')}}"/>
                        </div>  
                        <div  class="rows" align="center" >   
                                <textarea cols="30" rows="10" required></textarea>
                                <textarea cols="30" rows="10" required></textarea>
                                <textarea cols="30" rows="10" required></textarea>
                        </div>    
                </div> <!--modal body close -->
              <div class="modal-footer">
                <span class="pull-right">
                <!-- SI acepta sigue el flujo normal de la aplicación-->
                   <button id="btnMiedoFinal" type="button" class="btn btn-primary" data-dismiss="modal">
                     Siguiente
                   </button>
                </span>
              </div>
         </div><!--modal content close -->
     </div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal Miedo 3 -->

<!-- Comienzo del modal de alegria 1-->
<div class="modal fade" id="alegria1" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Alegría - ¿Para qué sirve la alegría? </b> </h4>
              </div>
               <div class="modal-body">
                    <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                            <p style="text-align:justify; text-justify: inter-word;">
                                    La alegría produce comportamientos que nos permiten ser más generosos, se tiene mayor inclinación a prestar ayuda, 
                                    genera mayor apertura a la relación con otros y esto nos permite generar nuevas relaciones sociales o hacer
                                     que sean más cercanas aquellas relaciones que ya existen. 
                            </p>
                    </div>  
                </div> <!--modal body close -->
              <div class="modal-footer">
                <span class="pull-right">
                <!-- SI acepta sigue el flujo normal de la aplicación-->
                   <button id="btnAlegria2" type="button" class="btn btn-primary" data-dismiss="modal">
                     Siguiente
                   </button>
                </span>
              </div>
         </div><!--modal content close -->
     </div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal Alegria 1 -->

<!-- Comienzo del modal de alegria 2-->
<div class="modal fade" id="alegria2" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Alegría - ¿Cómo se experimenta la alegría? </b> </h4>
              </div>
               <div class="modal-body">
                    <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                            <p style="text-align:justify; text-justify: inter-word;">
                              Cada persona es un individuo diferente y único, eso quiere decir que no todos
                               viven la alegría de la misma forma; pero te daremos unos ejemplos de cómo se puede
                                experimentar y luego tú vas a tener que pensar y escribir cómo lo vives tú. 
                            </p>
                     </div>
                     <div align="center">
                            <img WIDTH="" HEIGTH=""  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/bAlegria.png')}}"/>
                     </div> 
                     <div align="center" >   
                         <img   id="imagen2" src="{{asset('ActividadDescubriendoEmociones/fAlegria.png')}}"/>
                         <img   id="imagen3" src="{{asset('ActividadDescubriendoEmociones/cAlegria.png')}}"/>
                         <img   id="imagen4" src="{{asset('ActividadDescubriendoEmociones/mAlegria.png')}}"/>
                    </div> 
                    <div align="center" >   
                      <img   id="imagen5" src="{{asset('ActividadDescubriendoEmociones/ejemploAlegria1.png')}}"/>
                      <img  id="imagen6" src="{{asset('ActividadDescubriendoEmociones/ejemploAlegria2.png')}}"/>
                      <img   id="imagen7" src="{{asset('ActividadDescubriendoEmociones/ejemploAlegria3.png')}}"/>
                    </div>   
                </div> <!--modal body close -->
              <div class="modal-footer">
                <span class="pull-right">
                <!-- SI acepta sigue el flujo normal de la aplicación-->
                   <button id="btnAlegria3" type="button" class="btn btn-primary" data-dismiss="modal">
                     Siguiente
                   </button>
                </span>
              </div>
         </div><!--modal content close -->
     </div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal Alegria 2 -->

<!-- Comienzo del modal de Inicio Actividad alegria 3 -->
<div class="modal fade" id="alegria3" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Alegría - ¿Cómo se experimenta la alegría? </b> </h4>
              </div>
              <div class="modal-body">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                        <p style="text-align:justify; text-justify: inter-word;">
                            Ahora es tu turno, escribe una situación que te genera alegría y después piensa qué siente tu cuerpo 
                            en esa situación, que piensas y cuáles son las acciones que tomas
                        </p>
                 </div>
                 <div align="center">
                        <img WIDTH="" HEIGTH=""  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/bAlegria.png')}}"/>
                 </div> 
                 <div align="center" >   
                     <img   id="imagen2" src="{{asset('ActividadDescubriendoEmociones/fAlegria.png')}}"/>
                     <img   id="imagen3" src="{{asset('ActividadDescubriendoEmociones/cAlegria.png')}}"/>
                     <img   id="imagen4" src="{{asset('ActividadDescubriendoEmociones/mAlegria.png')}}"/>
                </div> 
                <div  class="rows" align="center" >   
                  <textarea cols="30" rows="10" required></textarea>
                  <textarea cols="30" rows="10" required></textarea>
                  <textarea cols="30" rows="10" required></textarea>
                </div>    
            </div> <!--modal body close -->
              <div class="modal-footer">
                <span class="pull-right">
                <!-- SI acepta sigue el flujo normal de la aplicación-->
                   <button id="btnAlegriaFinal" type="button" class="btn btn-primary" data-dismiss="modal">
                     Siguiente
                   </button>
                </span>
              </div>
         </div><!--modal content close -->
     </div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal alegria 3 -->



<!-- Comienzo del modal de enojo 1-->
<div class="modal fade" id="enojo1" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Enojo- ¿Para qué sirve el enojo? </b> </h4>
              </div>
               <div class="modal-body">
                    <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                            <p style="text-align:justify; text-justify: inter-word;">
                                    El enojo permite centrar la atención en las situaciones que comprometen la integridad física, autoimagen o 
                                    la autoestima, permitiendo actuar en defensa propia.
                            </p>
                    </div>  
                </div> <!--modal body close -->
              <div class="modal-footer">
                <span class="pull-right">
                <!-- SI acepta sigue el flujo normal de la aplicación-->
                   <button id="btnEnojo2" type="button" class="btn btn-primary" data-dismiss="modal">
                     Siguiente
                   </button>
                </span>
              </div>
         </div><!--modal content close -->
     </div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal Enojo 1 -->

<!-- Comienzo del modal de enojo 2-->
<div class="modal fade" id="enojo2" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Enojo- ¿Cómo se experimenta el enojo?
                </b> </h4>
              </div>
               <div class="modal-body">
                    <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                            <p style="text-align:justify; text-justify: inter-word;">
                              Cada persona es un individuo diferente y único, eso quiere decir que no todos 
                              viven el enojo de la misma forma; por lo que encontrarás unos ejemplos de cómo se 
                              puede experimentar y luego tú vas a tener que pensar y escribir cómo lo vives tú. 
                            </p>
                     </div>
                     <div align="center">
                            <img WIDTH="" HEIGTH=""  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/bEnojo.png')}}"/>
                     </div> 
                     <div align="center" >   
                         <img   id="imagen2" src="{{asset('ActividadDescubriendoEmociones/fEnojo.png')}}"/>
                         <img   id="imagen3" src="{{asset('ActividadDescubriendoEmociones/cEnojo.png')}}"/>
                         <img   id="imagen4" src="{{asset('ActividadDescubriendoEmociones/mEnojo.png')}}"/>
                    </div> 
                    <div align="center" >   
                      <img   id="imagen5" src="{{asset('ActividadDescubriendoEmociones/ejemploEnojo1.png')}}"/>
                      <img  id="imagen6" src="{{asset('ActividadDescubriendoEmociones/ejemploEnojo2.png')}}"/>
                      <img   id="imagen7" src="{{asset('ActividadDescubriendoEmociones/ejemploEnojo3.png')}}"/>
                    </div>   
                </div> <!--modal body close -->
              <div class="modal-footer">
                <span class="pull-right">
                <!-- SI acepta sigue el flujo normal de la aplicación-->
                   <button id="btnEnojo3" type="button" class="btn btn-primary" data-dismiss="modal">
                     Siguiente
                   </button>
                </span>
              </div>
         </div><!--modal content close -->
     </div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal Enojo 2 -->

<!-- Comienzo del modal de Inicio Actividad enojo 3 -->
<div class="modal fade" id="enojo3" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Enojo- ¿Cómo se experimenta el enojo?</b> </h4>
              </div>
              <div class="modal-body">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                        <p style="text-align:justify; text-justify: inter-word;">
                            Ahora es tu turno escribe una situación que te genera enojo y después piensa qué siente tu cuerpo en esa situación, 
                            que piensas y cuáles son las acciones que tomas. 
                        </p>
                 </div>
                 <div align="center">
                  <img WIDTH="" HEIGTH=""  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/bEnojo.png')}}"/>
                </div> 
                <div align="center" >   
                  <img   id="imagen2" src="{{asset('ActividadDescubriendoEmociones/fEnojo.png')}}"/>
                  <img   id="imagen3" src="{{asset('ActividadDescubriendoEmociones/cEnojo.png')}}"/>
                  <img   id="imagen4" src="{{asset('ActividadDescubriendoEmociones/mEnojo.png')}}"/>
              </div> 
                <div  class="rows" align="center" >   
                  <textarea cols="30" rows="10" required></textarea>
                  <textarea cols="30" rows="10" required></textarea>
                  <textarea cols="30" rows="10" required></textarea>
                </div>    
            </div> <!--modal body close -->
              <div class="modal-footer">
                <span class="pull-right">
                <!-- SI acepta sigue el flujo normal de la aplicación-->
                   <button id="btnEnojoFinal" type="button" class="btn btn-primary" data-dismiss="modal">
                     Siguiente
                   </button>
                </span>
              </div>
         </div><!--modal content close -->
     </div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal Enojo 3 -->

<!-- Comienzo del modal de tristeza 1-->
<div class="modal fade" id="tristeza1" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Tristeza- ¿Para qué sirve la tristeza? </b> </h4>
              </div>
               <div class="modal-body">
                    <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                            <p style="text-align:justify; text-justify: inter-word;">
                                    La tristeza indica que hay una situación que es poco agradable y nos permite hacer una llamada de “auxilio” 
                                    a las personas cercanas, de forma que se genera unión.
                            </p>
                    </div>  
                </div> <!--modal body close -->
              <div class="modal-footer">
                <span class="pull-right">
                <!-- SI acepta sigue el flujo normal de la aplicación-->
                   <button id="btnTristeza2" type="button" class="btn btn-primary" data-dismiss="modal">
                     Siguiente
                   </button>
                </span>
              </div>
         </div><!--modal content close -->
     </div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal tristeza 1 -->

<!-- Comienzo del modal de tristeza 2-->
<div class="modal fade" id="tristeza2" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Tristeza- ¿Cómo se experimenta la tristeza?
                </b> </h4>
              </div>
               <div class="modal-body">
                    <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                            <p style="text-align:justify; text-justify: inter-word;">
                                Cada persona es un individuo diferente y único, eso quiere decir que no todos vivimos
                                 la tristeza de la misma forma; pero te daremos unos ejemplos de cómo se puede experimentar
                                  y luego tú vas a tener que pensar y escribir cómo lo vives tú.
                            </p>
                     </div>
                     <div align="center">
                            <img WIDTH="" HEIGTH=""  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/bTristeza.png')}}"/>
                     </div> 
                     <div align="center" >   
                         <img   id="imagen2" src="{{asset('ActividadDescubriendoEmociones/fTristeza.png')}}"/>
                         <img   id="imagen3" src="{{asset('ActividadDescubriendoEmociones/cTristeza.png')}}"/>
                         <img   id="imagen4" src="{{asset('ActividadDescubriendoEmociones/mTristeza.png')}}"/>
                    </div> 
                    <div align="center" >   
                      <img   id="imagen5" src="{{asset('ActividadDescubriendoEmociones/ejemploTristeza1.png')}}"/>
                      <img  id="imagen6" src="{{asset('ActividadDescubriendoEmociones/ejemploTristeza2.png')}}"/>
                      <img   id="imagen7" src="{{asset('ActividadDescubriendoEmociones/ejemploTristeza3.png')}}"/>
                    </div>   
                </div> <!--modal body close -->
              <div class="modal-footer">
                <span class="pull-right">
                <!-- SI acepta sigue el flujo normal de la aplicación-->
                   <button id="btnTristeza3" type="button" class="btn btn-primary" data-dismiss="modal">
                     Siguiente
                   </button>
                </span>
              </div>
         </div><!--modal content close -->
     </div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal tristeza 2 -->

<!-- Comienzo del modal de Inicio Actividad tristeza 3 -->
<div class="modal fade" id="tristeza3" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
     data-show="true">

       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;" > <b>Tristeza- ¿Cómo se experimenta la tristeza?</b> </h4>
              </div>
              <div class="modal-body">
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                        <p style="text-align:justify; text-justify: inter-word;">
                            Ahora es tu turno escribe una situación que te genera tristeza
                             y después piensa qué siente tu cuerpo en esa situación, que piensas 
                             y cuáles son las acciones que tomas. 

                        </p>
                 </div>
                 <div align="center">
                    <img WIDTH="" HEIGTH=""  id="imagen1" src="{{asset('ActividadDescubriendoEmociones/bTristeza.png')}}"/>
             </div> 
             <div align="center" >   
                 <img   id="imagen2" src="{{asset('ActividadDescubriendoEmociones/fTristeza.png')}}"/>
                 <img   id="imagen3" src="{{asset('ActividadDescubriendoEmociones/cTristeza.png')}}"/>
                 <img   id="imagen4" src="{{asset('ActividadDescubriendoEmociones/mTristeza.png')}}"/>
            </div> 
                <div  class="rows" align="center" >   
                  <textarea cols="30" rows="10" required></textarea>
                  <textarea cols="30" rows="10" required></textarea>
                  <textarea cols="30" rows="10" required></textarea>
                </div>    
            </div> <!--modal body close -->
              <div class="modal-footer">
                <span class="pull-right">
                <!-- SI acepta sigue el flujo normal de la aplicación-->
                   <button id="btnTristezaFinal" type="button" class="btn btn-primary" data-dismiss="modal">
                     Siguiente
                   </button>
                </span>
              </div>
         </div><!--modal content close -->
     </div> <!--modal dialog close -->
</div>  <!--modal fade close -->
<!-- Fin del modal Enojo 3 -->
@endsection
@section('addjs')

<script type="text/javascript">
var contador = 0 ; 

function dialogoMiedo()
{
    $('#miedo1').modal('toggle');
}
$("#btnMiedo2").click(function()
   {
     $('#miedo2').modal('toggle');
});
$("#btnMiedo3").click(function()
   {
     $('#miedo3').modal('toggle');
});
$("#btnMiedoFinal").click(function()
{
    $("#initialContent").fadeOut();
    contador ++;  
});  

function dialogoAlegria()
{
    $('#alegria1').modal('toggle');
}

$("#btnAlegria2").click(function()
   {
     $('#alegria2').modal('toggle');
});
$("#btnAlegria3").click(function()
   {
     $('#alegria3').modal('toggle');
});
$("#btnAlegriaFinal").click(function()
{
    $("#initialContent").fadeOut();
    contador ++;  
});  

function dialogoEnojo()
{
    $('#enojo1').modal('toggle');
}
$("#btnEnojo2").click(function()
   {
     $('#enojo2').modal('toggle');
});
$("#btnEnojo3").click(function()
   {
     $('#enojo3').modal('toggle');
});
$("#btnEnojoFinal").click(function()
{
    $("#initialContent").fadeOut();
    contador ++;  
});  


function dialogoTristeza()
{
    $('#tristeza1').modal('toggle');
}
$("#btnTristeza2").click(function()
   {
     $('#tristeza2').modal('toggle');
});
$("#btnTristeza3").click(function()
   {
     $('#tristeza3').modal('toggle');
});
$("#btnTristezaFinal").click(function()
{
    $("#initialContent").fadeOut();
    contador ++;  
});  


</script>
@endsection