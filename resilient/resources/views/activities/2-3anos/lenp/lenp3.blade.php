@extends('partials.layout')

@section('title')
CUALIDADES NIÑOS RESILIENTES
@endsection

@section('addcss')

<style>
    .objects {
        display:inline-table;
        background-color: rgb(255, 255, 255);
        border: rgb(133, 223, 106) 1px solid;
        width: 150px; 
        height: 30px;
        margin: 10px;
        padding: 8px;
        font-size: 12px;
        text-align: center;
        box-shadow: 2px 2px 2px #999;
        cursor: move;
    }
    #drop_zone {
        background-color: #EEE; 
        border: #999 1px solid;
        width: 280px; 
        height: 250px;
        padding: 8px;
        font-size: 18px;
    }

    .row, b{
        margin-bottom: 30px;
    }

    #qualities{
        margin-right: 25px;
    }
    .actContainer{
        display: inline-block;
        margin-bottom: 20px;
    }

    </style>


@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
    <form class="form">
        <div class="card">

            <div class="card-head style-primary">
                <header> LAS EMOCIONES DE NUESTROS PADRES /CUIDADORES
 </header>
            </div>

            <div class="card-body floating-label">

            <div class="row">
                <div class="col-md-12">
                    A continuación, encontrarás la lista de cualidades 
                    resilientes que encontraste en el video. Aunque en 
                    el video se presentan en un orden y se sabe que cada 
                    una asume un papel fundamental se quiere que tú 
                    realices tu propia lista de cualidades resilientes 
                    en niños.

                </div>
            </div>

            <div class="col-md-6">
            <b>Emociones</b>
                <hr>
                <div class="actContainer">
                    <img src="{{asset('ActividadLenp/lenp1.png')}}" style="width:100px; height:auto;" alt="lenp1">
                    <div id="drop_zone" class="pull-right" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" ></div>
                </div>
                <div class="actContainer">
                    <img src="{{asset('ActividadLenp/lenp2.png')}}" style="width:100px; height:auto;" alt="lenp1">
                    <div id="drop_zone" class="pull-right" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" ></div>
                </div>
                <div class="actContainer">
                        <img src="{{asset('ActividadLenp/lenp3.png')}}" style="width:100px; height:auto;" alt="lenp1">
                        <div id="drop_zone" class="pull-right" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" ></div>
                </div>
                <div class="actContainer">
                        <img src="{{asset('ActividadLenp/lenp4.png')}}" style="width:100px; height:auto;" alt="lenp1">
                        <div id="drop_zone" class="pull-right" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" ></div>
                </div>
                
            </div>
               
            <div class="col-md-6">

               <div id="qualities">
                    <b>Palabras / Frases</b>
                    <hr>
    
                    <div id="object1" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Temblar</div>
                    <div id="object2" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Reir</div>
                    <div id="object3" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Todo gris</div>
                    <div id="object4" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Estallar</div>
                    <div id="object5" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Mucha motivación</div>
                    <div id="object6" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Poco Animo</div>
                    <div id="object7" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Gritar</div>
                    <div id="object8" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Vacío en el estomago</div>
                    <div id="object9" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Llorar</div>
                    <div id="object10" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Apretar puños</div>
                    <div id="object11" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Saltar</div>
                    <div id="object12" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Muy atento a lo que pasa</div>
                    <div id="object13" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Sentir mucho calor en la cara</div>
                    <div id="object14" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Sin motivacion</div>
                    <div id="object15" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Bailar</div>
                    <div id="object16" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Catastrófico</div>
               </div> 
                
            </div>

                <!-- <hr>
                <button onclick="readDropZone()">Get Object Data</button> -->

            </div>


            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/lenp4')}}"> <button type="button"
                            class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                </div>
            </div>

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