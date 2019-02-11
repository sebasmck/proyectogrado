@extends('partials.layout')

@section('title')
Actividad juguemos a conocer nuestras emociones
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
        height: 200px;
        width: 200px;
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
      #object1
      {
          background-color: pink;
      }
  
      #object3
      {
          background-color: lightblue;
      }
  
      #object4
      {
          background-color: lightgreen;
      }
  
      #object5
      {
          background-color: darkgoldenrod;
      }
  
      #object6
      {
          background-color: lightcoral;
      }
  
  
      </style>
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/CulminacionJuguemosEmociones')}}">
            {{ csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                   <header>  Instrucción - Nuestros Logros </header>
                </div>

                <div class="card-body floating-label"> 
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                        <p style="text-align:justify; text-justify: inter-word;">
                            Debes arrastrar la actividad hacia el día que la hiciste. Por ejemplo, puedes arrastrar la actividad globos al día lunes,
                             porque ese día lo usaste. 
                        </p>
                </div>  
                <div align="center" >
                      <div class="row">
                        <div class="col-sm-2 actContainer">
                           <div id="drop_zone1" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" >
                                <p style="text-align:center; text-justify: inter-word; color:black">  
                                   Lunes
                               </p> 
                           </div>   
                        </div>
           
                        <div class="col-sm-2 actContainer">
                           <div id="drop_zone2" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > 
                               <p style="text-align:center; text-justify: inter-word; color:black"> 
                                   Martes
                               </p> 
                           </div>   
                        </div>
           
                        <div class="col-sm-2 actContainer">
                           <div id="drop_zone3" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > 
                               <p style="text-align:center; text-justify: inter-word;color:black "> 
                                   Miercoles
                               </p> 
                           </div>   
                        </div>

                        <div class="col-sm-2 actContainer">
                            <div id="drop_zone4" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > 
                                <p style="text-align:center; text-justify: inter-word;color:black "> 
                                    Jueves
                                </p> 
                            </div>   
                         </div>

                    </div>

                    <div class="row" >
                         <div class="col-sm-2 actContainer">
                            <div id="drop_zone5" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > 
                                <p style="text-align:center; text-justify: inter-word;color:black "> 
                                  Viernes
                                </p> 
                            </div>   
                         </div>

                         <div class="col-sm-2 actContainer">
                            <div id="drop_zone6" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > 
                                <p style="text-align:center; text-justify: inter-word;color:black "> 
                                    Sabado
                                </p> 
                            </div>   
                         </div>

                         <div class="col-sm-2 actContainer">
                            <div id="drop_zone7" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > 
                                <p style="text-align:center; text-justify: inter-word;color:black "> 
                                   Domingo
                                </p> 
                            </div>   
                        </div>
                      </div>
                    </div>

                      <div >
                        <div id="qualities"style="text-align:center" >
                             <b> Opciones </b>
                             <hr>
                             <div id="object1" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Globos</div>
                             <div id="object2" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Caras</div>
                             <div id="object3" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Fotos</div>
                             <div id="object4" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Video</div>
                        </div> 
                     </div> 

                     <div class="col-sm-13" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; background-color: lightcyan">
                        <label for="" style="color:black" >
                            Cuéntanos cómo fue tu experiencia ayudando a tu bebé a reconocer las emociones
                        </label>
                        <br>
                           <textarea name="textarea2" id="textarea2" class="form-control" rows="3" placeholder="" required></textarea>
                        <div class="form-control-line">
                        </div>
                   </div> 
                      
                      
             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" > <button id="siguiente"type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
@section('addjs')

@endsection