@extends('partials.layout')

@section('title')
COSAS DE GRANDE
@endsection

@section('addcss')

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
    #drop_zone {
        background-color: #EEE; 
        border: #999 1px solid;
        width: 280px; 
        height: 700px;
        padding: 8px;
        font-size: 18px;
    }

    .row, b{
        margin-bottom: 30px;
    }

    #qualities{
        margin-right: 25px;
    }
    </style>

@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
    <form class="form">
        <div class="card">

            <div class="card-head style-primary">
                <header> COSAS DE GRANDE </header>
            </div>

            <div class="card-body floating-label">
                <b>ANTES </b> <br>
                <ol>
                    <li>Invita a tu hijo a realizar la actividad</li>
                    <li>Explícale los elementos que se involucran en cada una de ellas</li>
                    <li>Explícale su utilidad o el por qué se debe realizar</li>
                </ol> <br>
                <b>DURANTE</b>
                <ol>
                    <li>Empieza tu realizando la actividad</li>
                    <li>Explícale paso por paso como esta se debe realizar y que cuidados se deben tener</li>
                    <li>Recuerda tener paciencia, el objetivo es fomentar una actividad como experiencia de
                         aprendizaje, no crear un mal rato en el niño</li>
                </ol> <br>
                <b>DESPUES</b>
                <ol>
                    <li> Felicítalo por el esfuerzo que implementos para realizar la actividad</li>
                    <li> Felicítalo por el esfuerzo que implementos para realizar la actividad</li>
                    <li>Si no pudo culminar la actividad, no lo regañes, dile que seguirán 
                        practicando y que poco a poco irá aprendiendo de igual forma, que lo 
                        vas a seguir invitar otras actividades como estas</li>
                </ol> 

                
                
            </div>
            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/cdg_logrosObtenidos')}}"> <button type="button"
                            class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                </div>
            </div>

    </form>
</div>

@endsection

@section('addjs')

<script>

    function _(id) {
        return document.getElementById(id);
    }

    var droppedIn = false;

    function drag_start(event) {
        // _('app_status').innerHTML = "Dragging the "+event.target.getAttribute('id');
        document.getElementsByClassName("objects").innerHTML = "Dragging the " + event.target.getAttribute('id');
        event.dataTransfer.dropEffect = "move";
        event.dataTransfer.setData("text", event.target.getAttribute('id'));
    }
    function drag_enter(event) {
        document.getElementsByClassName("objects").innerHTML = "You are dragging over the " + event.target.getAttribute('id');
    }
    function drag_leave(event) {
        document.getElementsByClassName("objects").innerHTML = "You left the " + event.target.getAttribute('id');
    }
    function drag_drop(event) {
        event.preventDefault(); /* Prevent undesirable default behavior while dropping */
        var elem_id = event.dataTransfer.getData("text");
        event.target.appendChild(_(elem_id));
        document.getElementsByClassName("objects").innerHTML = "Dropped " + elem_id + " into the " + event.target.getAttribute('id');
        _(elem_id).removeAttribute("draggable");
        _(elem_id).style.cursor = "default";
        droppedIn = true;
    }
    function drag_end(event) {
        if (droppedIn == false) {
            _('app_status').innerHTML = "You let the " + event.target.getAttribute('id') + " go.";
        }
        droppedIn = false;
    }
    function readDropZone() {
        for (var i = 0; i < _("drop_zone").children.length; i++) {
            alert(_("drop_zone").children[i].id + " is in the drop zone");
        }
        /* Run Ajax request to pass any data to your server */
    }

</script>
@endsection