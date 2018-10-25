@extends('partials.layout')

@section('title')
Post Test Final
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
        height: 600px;
        overflow: scroll;
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


    </style>
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                    <header>Post Test - Preguntas De Cierre</header>
                </div>

                <div class="card-body floating-label"> 
                <p style="text-align:left; text-justify: inter-word;">
                     Vamos a ver qué tanto aprendiste durante este tiempo con nosotros. A continuación, encontrarás las actividades 
                     sueltas y tendrás que arrastrarlas hasta la casilla que le corresponda.
                </p>
               </div>
              
           <div class="row">
            <div class="col-sm-2 actContainer">
                <div id="drop_zone1" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > <p style="text-align:center; text-justify: inter-word;"> <b> Vinculo afectivo</b> </p> </div>   
            </div>
            <div class="col-sm-2 actContainer">
                <div id="drop_zone2" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > <p style="text-align:center; text-justify: inter-word;"> <b> Reconocimiento de mis cuidadores </b> </p> </div>   
            </div>
            <div class="col-sm-2 actContainer">
                <div id="drop_zone3" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > <p style="text-align:center; text-justify: inter-word;"> <b> Autonomía </b> </p> </div>   
            </div>
            <div class="col-sm-2 actContainer">
                <div id="drop_zone4" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > <p style="text-align:center; text-justify: inter-word;"> <b> Confianza </b> </p> </div>   
            </div>
            <div class="col-sm-2 actContainer">
                <div id="drop_zone5" class="drop_zone" ondragenter="drag_enter(event)" ondrop="drag_drop(event)" ondragover="return false" ondragleave="drag_leave(event)" > <p style="text-align:center; text-justify: inter-word;"> <b> Independencia </b> </p> </div>   
            </div>
           </div>
 
            <div style="margin-top: 5% ">
               <div id="qualities">
                    <b> Actividades </b>
                    <hr>
                    <div id="object1" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Aprendamos de resiliencia</div>
                    <div id="object2" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Cualidades niños resilientes</div>
                    <div id="object3" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Aterrizando el concepto de resiliencia</div>
                    <div id="object4" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">El mimo</div>
                    <div id="object5" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Las gafas de las emociones</div>
                    <div id="object6" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Un tesoro escondido, “Soy capaz de… y me amo como soy”</div>
                    <div id="object7" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Día del elogio</div>
                    <div id="object8" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Papito escultor</div>
                    <div id="object9" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Niños resilientes</div>
                    <div id="object10" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Caritas felices</div>


                    <div id="object11" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Creando confianza</div>
                    <div id="object12" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Digno de cariño</div>
                    <div id="object13" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Formando niños resilientes </div>
                    <div id="object14" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Árbol genealógico ¿Quién está contigo?</div>
                    <div id="object15" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">De quien puedo aprender</div>


                    <div id="object16" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Hasta el final</div>
                    <div id="object17" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Las emociones de nuestros padres/cuidadores</div>
                    <div id="object18" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Cosas de grande</div>
                    <div id="object19" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Un tesoro escondido, “Soy capaz de… y me amo como soy”</div>
                    <div id="object20" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Identificación y control emocional</div>
                    
                    <div id="object21" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Practica el sentido del humor</div>
                    <div id="object22" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Elige lo que más te guste</div>
                    <div id="object23" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Seguir y seguir intentando </div>
                    <div id="object24" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Cosas de grande</div>
                    <div id="object25" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Día del elogio</div>
                    <div id="object26" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Papito escultor</div>
                    <div id="object27" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Como loros</div>
                    <div id="object28" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Las reglas del juego</div>
                    <div id="object29" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Caritas felices</div>
                    <div id="object30" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Árbol genealógico ¿Quién está contigo?</div>
                    <div id="object31" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Que quieres ser cuando seas grande</div>
                    
                    <div id="object32" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Grande y fuerte</div>
                    <div id="object33" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Cositas por vivir</div>
                    <div id="object34" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Sombrero de las decisiones</div>
                    <div id="object35" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">Con toda mi atención</div>
                    <div id="object36" class="objects" draggable="true" ondragstart="drag_start(event)" ondragend="drag_end(event)">¡Corre… peligro!</div>


               </div> 
                
            </div> 


            </div> {{-- card-body no padding --}}     
            <div class="card-actionbar">
                <div class="card-actionbar-row">
                <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/preguntascierreposttest1')}}" > <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
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