@extends('partials.layout')

@section('title')
Caritas Felices 
@endsection

<style>
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
        background-image: url({{asset('ActividadCaritasFelices/Imagen1.png')}});
        background-repeat: no-repeat;
        background-size: 200px 150px;
    }
    #drop_zone2
    {
        background-image: url({{asset('ActividadCaritasFelices/Imagen2.png')}});
        background-repeat: no-repeat;
        background-size: 200px 150px;
    }
    #drop_zone3
    {
        background-image: url({{asset('ActividadCaritasFelices/Imagen3.png')}});
        background-repeat: no-repeat;
        background-size: 200px 150px;
    }
    #drop_zone4
    {
        background-image: url({{asset('ActividadCaritasFelices/Imagen4.png')}});
        background-repeat: no-repeat;
        background-size: 200px 150px;
    }
    #drop_zone5
    {
        background-image: url({{asset('ActividadCaritasFelices/Imagen5.png')}});
        background-repeat: no-repeat;
        background-size: 200px 150px;
    }
    #drop_zone6
    {
        background-image: url({{asset('ActividadCaritasFelices/Imagen6.png')}});
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
                    <header>Caritas Felices - Encuentra la pareja correcta </header>
                </div>

                <div class="card-body floating-label"> 
                   <p style="text-align:left; text-justify: inter-word;">
                     <b>Instrucción: </b> Toma cada recuadro y ponlo bajo la cara que consideres corresponda. 
                  </p>
               </div>
              
           <div class="row">
             <div class="col-sm-2 actContainer">
                <div id="drop_zone1" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" >
                     <p style="text-align:center; text-justify: inter-word;">  
                    </p> 
                </div>   
             </div>

             <div class="col-sm-2 actContainer">
                <div id="drop_zone2" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > 
                    <p style="text-align:center; text-justify: inter-word;"> 
                    </p> 
                </div>   
             </div>

             <div class="col-sm-2 actContainer">
                <div id="drop_zone3" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > 
                    <p style="text-align:center; text-justify: inter-word;">  
                    </p> 
                </div>   
             </div>

           </div>

             <div class="row">
             <div class="col-sm-2 actContainer">
                <div id="drop_zone4" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" >
                     <p style="text-align:center; text-justify: inter-word;">  
                    </p> 
                </div>   
             </div>

            <div class="col-sm-2 actContainer">
                <div id="drop_zone5" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > 
                    <p style="text-align:center; text-justify: inter-word;"> 
                    </p> 
                 </div>   
            </div>

            <div class="col-sm-2 actContainer">
                <div id="drop_zone6" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > 
                    <p style="text-align:center; text-justify: inter-word;"> 
                       
                    </p> 
                 </div>   
            </div>



           </div>
 
            <div style="margin-top: 5% ">
               <div id="qualities">
                    <b> Emociones </b>
                    <hr>
                    <div id="object1" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Felicidad</div>
                    <div id="object2" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Tristeza</div>
                    <div id="object3" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Miedo</div>
                    <div id="object4" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Asco</div>
                    <div id="object5" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Sorpresa</div>
                    <div id="object6" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Ira</div>
               </div> 
            </div> 


            </div> {{-- card-body no padding --}}     
            <div class="card-actionbar">
                <div class="card-actionbar-row">
                <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/CaritasFelices3')}}" > <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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