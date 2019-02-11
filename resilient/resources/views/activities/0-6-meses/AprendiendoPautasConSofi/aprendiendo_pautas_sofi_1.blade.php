@extends('partials.layout')

@section('title')
Aprendiendo de pautas con Sofi
@endsection

@section('content')

<!-- Si necesitan animaciones shake (como se mueven los emoticones) ahi les dejo los links de
la documentación -->
<!-- https://github.com/elrumordelaluz/csshake-->
<!-- http://elrumordelaluz.github.io/csshake/-->
<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-slow.css')}}" />

<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-hard.css')}}" />

<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-crazy.css')}}" />

<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/shake-little.css')}}" />

<!-- Otra libreria. animaciones para la tabla y animar los
números de la tabla use esta libreria. Ahí dejo el los links de la documentación-->
<!-- https://daneden.github.io/animate.css/ -->
<!-- -https://github.com/daneden/animate.css -->
<link type="text/css" rel="stylesheet" href="{{asset('css/css-animations/animate.css')}}" />

<script src="https://cdn.jsdelivr.net/npm/interactjs@1.3.4/dist/interact.min.js"></script>
<script>

// enable draggables to be dropped into this
interact('#outer-dropzone').dropzone({
  // only accept elements matching this CSS selector
  accept: '#image2',
  // Require a 75% element overlap for a drop to be possible
  overlap: 0.75,

  // listen for drop related events:

 // ondropactivate: function (event) {
    // add active dropzone feedback
  //  event.target.classList.add('drop-active');
 // },
  ondragenter: function (event) {
    var draggableElement = event.relatedTarget,
        dropzoneElement = event.target;

    // feedback the possibility of a drop
  //  dropzoneElement.classList.add('drop-target');
    draggableElement.classList.add('can-drop');
    //draggableElement.textContent = 'Dragged in';
  },
  ondragleave: function (event) {
    // remove the drop feedback style
  //  event.target.classList.remove('drop-target');
    event.relatedTarget.classList.remove('can-drop');
    //event.relatedTarget.textContent = 'Dragged out';
  },
  ondrop: function (event) {
    //event.relatedTarget.textContent = 'Dropped';
  },
  ondropdeactivate: function (event) {
    // remove active dropzone feedback
    event.target.classList.remove('drop-active');
 //   event.target.classList.remove('drop-target');
  }
});


// enable draggables to be dropped into this
interact('#outer-dropzone2').dropzone({
  // only accept elements matching this CSS selector
  accept: '#image1',
  // Require a 75% element overlap for a drop to be possible
  overlap: 0.75,

  // listen for drop related events:

 // ondropactivate: function (event) {
    // add active dropzone feedback
  //  event.target.classList.add('drop-active');
 // },
  ondragenter: function (event) {
    var draggableElement = event.relatedTarget,
        dropzoneElement = event.target;

    // feedback the possibility of a drop
 //   dropzoneElement.classList.add('drop-target');
    draggableElement.classList.add('can-drop');
    //draggableElement.textContent = 'Dragged in';
  },
  ondragleave: function (event) {
    // remove the drop feedback style
   // event.target.classList.remove('drop-target');
    event.relatedTarget.classList.remove('can-drop');
    //event.relatedTarget.textContent = 'Dragged out';
  },
  ondrop: function (event) {
    //event.relatedTarget.textContent = 'Dropped';
  },
  ondropdeactivate: function (event) {
    // remove active dropzone feedback
    event.target.classList.remove('drop-active');
  //  event.target.classList.remove('drop-target');
  }
});


// enable draggables to be dropped into this
interact('#outer-dropzone3').dropzone({
  // only accept elements matching this CSS selector
  accept: '#image3',
  // Require a 75% element overlap for a drop to be possible
  overlap: 0.75,

  // listen for drop related events:

 // ondropactivate: function (event) {
    // add active dropzone feedback
  //  event.target.classList.add('drop-active');
 // },
  ondragenter: function (event) {
    var draggableElement = event.relatedTarget,
        dropzoneElement = event.target;

    // feedback the possibility of a drop
 //   dropzoneElement.classList.add('drop-target');
    draggableElement.classList.add('can-drop');
    //draggableElement.textContent = 'Dragged in';
  },
  ondragleave: function (event) {
    // remove the drop feedback style
   // event.target.classList.remove('drop-target');
    event.relatedTarget.classList.remove('can-drop');
    //event.relatedTarget.textContent = 'Dragged out';
  },
  ondrop: function (event) {
    //event.relatedTarget.textContent = 'Dropped';
  },
  ondropdeactivate: function (event) {
    // remove active dropzone feedback
    event.target.classList.remove('drop-active');
  //  event.target.classList.remove('drop-target');
  }
});

interact('.drag-drop')
  .draggable({
    inertia: true,
    restrict: {
      restriction: "parent",
      endOnly: true,
      elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
    },
    autoScroll: true,
    // dragMoveListener from the dragging demo above
    onmove: dragMoveListener,
  });





// target elements with the "draggable" class
interact('.drag-drop')
  .draggable({
    // enable inertial throwing
    inertia: true,
    // keep the element within the area of it's parent
    restrict: {
      restriction: "parent",
      endOnly: true,
      elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
    },
    // enable autoScroll
    autoScroll: true,

    // call this function on every dragmove event
    onmove: dragMoveListener,
    // call this function on every dragend event
    onend: function (event) {
      var textEl = event.target.querySelector('p');

      textEl && (textEl.textContent =
        'moved a distance of '
        + (Math.sqrt(Math.pow(event.pageX - event.x0, 2) +
                     Math.pow(event.pageY - event.y0, 2) | 0))
            .toFixed(2) + 'px');
    }
  });

  function dragMoveListener (event) {
    var target = event.target,
        // keep the dragged position in the data-x/data-y attributes
        x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
        y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

    // translate the element
    target.style.webkitTransform =
    target.style.transform =
      'translate(' + x + 'px, ' + y + 'px)';

    // update the posiion attributes
    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);
  }

  // this is used later in the resizing and gesture demos
  window.dragMoveListener = dragMoveListener;
</script>
</head>


<body>

<style>
#outer-dropzone {
  height: 200px;
  width: 300px;
  touch-action: none;
}

#outer-dropzone2 {
  height: 200px;
  width: 300px;
  touch-action: none;
}

#outer-dropzone3 {
  height: 200px;
  width: 300px;
  touch-action: none;
}

#outer-dropzone4 {
  height: 200px;
  width: 300px;
  touch-action: none;
}

#outer-dropzone5 {
  height: 200px;
  width: 300px;
  touch-action: none;
}

.dropzone {
  display: inline-block;
  background-color: #ccc;
  border: dashed 4px transparent;
  border-radius: 4px;
  margin: 10px auto 30px;
  padding: 10px;
  width: 80%;
  transition: background-color 0.3s;
}

.drop-active {
  border-color: #aaa;
}

.drop-target {
  background-color: #29e;
  border-color: #fff;
  border-style: solid;
}

.drag-drop {
  display: inline-block;
  min-width: 40px;
  padding: 2em 0.5em;

  color: #fff;
  background-color: #E50A0A;
  border: solid 2px #fff;

  -webkit-transform: translate(0px, 0px);
          transform: translate(0px, 0px);

  transition: background-color 0.3s;
}

.drag-drop.can-drop {
  color: #000;
  background-color: #4e4;
}
</style>

<form action="{{route('/RespirarActuar2') }}" method="get" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="col-lg-offset-2 col-md-8">

<div class="card">
<div class="card-head style-primary">
                    <header>Aprendiendo sobre pautas de crianza con Sofi</header>
                </div>
 <div class="card-body floating-label">
                <br />

                
                <!-- INICIO ROW-->              
<div class="row">
    <div class="row">
    <div class="col-sm-12">
    <div class="animated fadeInDown">
        
    <label><h4><b>Instrucción:</b> A continuación deberás relacionar las  definiciones de la parte superior con los conceptos que 
    están ubicados en la parte inferior</h4></label>

</div>
</div>    </div>
<br/>
</div>
<!-- FIN ROW-->

                <!-- INICIO ROW-->              
<div class="row">
    <div class="row">
    <div class="col-sm-12">
    <div id="image1" class="drag-drop"> <label>Las acciones y comportamientos <br>de los padres dirigidas<br> a guiar las conductas de los niños/as </label> </div>
      <div id="image2" class="drag-drop"><label>La normatividad que siguen los<br> padres o cuidadores frente al comportamiento<br> de los niños/as </label></div>
      <div id="image3" class="drag-drop"><label>Son el conocimiento de como criar un niño/a </label> </div>

<br>
<div id="outer-dropzone" class="dropzone">  <label>Pautas de Crianza </label> </div> 
<div id="outer-dropzone2" class="dropzone"> <label>Prácticas acerca de la crianza                            </label> </div>
<div id="outer-dropzone3" class="dropzone"> <label>Creencias acerca de la crianza </label> </div>

</div>
</div>
<br/>
</div>
<!-- FIN ROW-->

            
<div class="card-actionbar">
                <div class="card-actionbar-row" id="butt">
                <a style="btn btn-flat btn-primary ink-reaction"> <button type="submit" class="btn btn-default ink-reaction btn-primary-dark" id="next" disabled>Siguiente</button></a>
                    </div>
            </div>
</div>


</div>

</form>
@endsection

@section('addjs')

<script src="https://unpkg.com/interactjs@1.3.4/dist/interact.min.js"></script>
<script>
interact('.item').draggable({
  onmove(event) {
    console.log(event.pageX,
                event.pageY)
  }
})
</script>

<script>
$(document).ready(function(){

  $("#lastLoad").delay(1000).fadeIn(2000);
  

});
 
</script>

@endsection