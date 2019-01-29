@extends('partials.layout')

@section('title')
Qué Quieres Ser Cuando Seas Grande 
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
        margin-left: 140%;
    }
     
    #drop_zone1
    {
        background-image: url({{asset('ActividadQueQsCsGrande/izquierda.png')}});
        background-repeat: no-repeat;
        background-size: 200px 150px;
    }
    #drop_zone2
    {
        background-image: url({{asset('ActividadQueQsCsGrande/centro.png')}});
        background-repeat: no-repeat;
        background-size: 200px 150px;
    }
    #drop_zone3
    {
        background-image: url({{asset('ActividadQueQsCsGrande/derecha.png')}});
        background-repeat: no-repeat;
        background-size: 200px 150px;
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
        <form class="form">
        {{csrf_field()}}

            <div class="card">
                <div class="card-head style-primary">
                    <header>Qué Quieres Ser Cuando Seas Grande - Reflexión  </header>
                </div>

                <div class="card-body floating-label"> 
                   <p style="font-family: 'Raleway', sans-serif;  font-size: 14px;color:black; text-align:left; text-justify: inter-word;">
                     <b>Instrucción: </b> Selecciona la mejor opción que consideres con tu hijo 
                  </p>
               </div>
              

               <div align="center" style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">          
                        <input type="radio" id="cb1" name="optionsRadios" value="1"/>
                        <label class="grow" for="cb1"> Escuchar los concejos de los ancianos <img src="{{asset('ActividadQueQsCsGrande/escuchar.png')}}" name="llave1" alt="avatar" style="margin-inline-start:10%"> 
                        </label>
                     
                        <input type="radio" id="cb2" name="optionsRadios" value="2" />
                        <label class="grow" for="cb2"> No escuchar los concejos del anciano <img src="{{asset('ActividadQueQsCsGrande/noescuchar.png')}}" name="llave2" alt="avatar" style="margin-inline-start:10%">
                        </label>
                 </div>
                 <br> 
                 <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black; margin-left: 2%">
                                <ol>
                                    <li>
                                                Piensa en una experiencia en la que tuviste que tomar una decisión en las dos últimas semanas y reflexiona.
                                    </li>
                                    <li>
                                                Observa con atención las imágenes y relaciona la palabra correspondiente a tus sensaciones al ver la imagen. 
                                    </li>
                                    <li>
                                                Posteriormente explica a tu hijo la enseñanza que te dejo el cuento.
                                    </li>
                                    
                                </ol>
              </div>
              <br> 
             
           <div class="row">
             <div class="col-sm-2 actContainer">
                <div id="drop_zone1" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" >
                     <p style="text-align:center; text-justify: inter-word; color:white">  
                        Izquierda
                    </p> 
                </div>   
             </div>

             <div class="col-sm-2 actContainer">
                <div id="drop_zone2" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > 
                    <p style="text-align:center; text-justify: inter-word; color:white"> 
                        Centro
                    </p> 
                </div>   
             </div>

             <div class="col-sm-2 actContainer">
                <div id="drop_zone3" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > 
                    <p style="text-align:center; text-justify: inter-word;color:white "> 
                        Derecha 
                    </p> 
                </div>   
             </div>

           </div>

            <div style="margin-top: 5% ">
               <div id="qualities"style="text-align:center" >
                    <b> Opciones </b>
                    <hr>
                    <div id="object1" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">MIEDO</div>
                    <div id="object2" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">FELICIDAD</div>
                    <div id="object3" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">CONFIANZA</div>
               </div> 
            </div> 


            </div> {{-- card-body no padding --}}     
            <div class="card-actionbar">
                <div class="card-actionbar-row">
                <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/QuieroSerGrande3')}}" > <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                </div>
          </div>  
        </div><!--end .card -->
            
        </form>
    </div>

@endsection

@section('addjs')

<script>

function _(id){
   return document.getElementById(id);	
}

var droppedIn = false;

function drag_start(event) {
    // _('app_status').innerHTML = "Dragging the "+event.target.getAttribute('id');
    document.getElementsByClassName("objects").innerHTML = "Dragging the "+event.target.getAttribute('id');
    event.dataTransfer.dropEffect = "move";
    event.dataTransfer.setData("text", event.target.getAttribute('id') );
}
function drag_enter(event) {
    document.getElementsByClassName("objects").innerHTML = "You are dragging over the "+event.target.getAttribute('id');
}
function drag_leave(event) {
    document.getElementsByClassName("objects").innerHTML = "You left the "+event.target.getAttribute('id');
}
function drag_drop(event) {
    event.preventDefault(); /* Prevent undesirable default behavior while dropping */
    var elem_id = event.dataTransfer.getData("text");
    event.target.appendChild( _(elem_id) );
    document.getElementsByClassName("objects").innerHTML = "Dropped "+elem_id+" into the "+event.target.getAttribute('id');
    _(elem_id).removeAttribute("draggable");
    _(elem_id).style.cursor = "default";
    droppedIn = true;
}
function drag_end(event) {
    if(droppedIn == false){
        _('app_status').innerHTML = "You let the "+event.target.getAttribute('id')+" go.";
    }
	droppedIn = false;
}
function readDropZone(){
    for(var i=0; i < _("drop_zone").children.length; i++){
        alert(_("drop_zone").children[i].id+" is in the drop zone");
    }
    /* Run Ajax request to pass any data to your server */
}

</script>
@endsection