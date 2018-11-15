@extends('partials.layout')
@section('title')
Culminación
@endsection

@section('addcss')

<style>

@import url('https://fonts.googleapis.com/css?family=Indie+Flower');
@import url('https://fonts.googleapis.com/css?family=Amatic+SC');

/* body {
	font-family: 'Indie Flower', cursive !important;
  background: #FDE3A7; /*CAPE HONEY*/
	margin: 0px;
	padding: 0px;
} */

::selection {
	background: transparent;
}

h4 {
	font-size: 26px;
	line-height: 1px;
	font-family: 'Amatic SC', cursive !important;
}

.color1{color:#1BBC9B}/*MOUNTAIN MEADOW*/
.color2{color:#C0392B/*TALL POPPY*/}


.card {
	color: #013243; /*SHERPA BLUE*/
	position: absolute;
	top: 50%;
	left: 50%;
	width: 300px;
	height: 400px;
	background: #e0e1dc;
	transform-style: preserve-3d;
	transform: translate(-50%,-50%) perspective(2000px);
	box-shadow: inset 300px 0 50px rgba(0,0,0,.5), 20px 0 60px rgba(0,0,0,.5);
	transition: 1s;
}

.card:hover {
	transform: translate(-50%,-50%) perspective(2000px) rotate(15deg) scale(1.2);
	box-shadow: inset 20px 0 50px rgba(0,0,0,.5), 0 10px 100px rgba(0,0,0,.5);
}

.card:before {
	content:'';
	position: absolute;
	top: -5px;
	left: 0;
	width: 100%;
	height: 5px;
	background: #BAC1BA;
	transform-origin: bottom;
	transform: skewX(-45deg);
}

.card:after {
	content: '';
	position: absolute;
	top: 0;
	right: -5px;
	width: 5px;
	height: 100%;
	background: #92A29C;
	transform-origin: left;
	transform: skewY(-45deg);
}

.card .imgBox {
	width: 100%;
	height: 100%;
	position: relative;
	transform-origin: left;
	transition: .7s;
}

.card .bark {
	position: absolute;
	background: #e0e1dc;
	width: 100%;
	height: 100%;
	opacity: 0;
	transition: .7s;
}

.card .imgBox img {
	min-width: 250px;
	max-height: 400px;
}

.card:hover .imgBox {
	transform: rotateY(-135deg);
}

.card:hover .bark {
  font-family: 'Indie Flower', cursive !important;
	opacity: 1;
	transition: .6s;
  box-shadow: 300px 200px 100px rgba(0, 0, 0, .4) inset;
}

.card .details {
  font-family: 'Indie Flower', cursive !important;
	position: absolute;
	top: 0;
	left: 0;
	box-sizing: border-box;
	padding: 0 0 0 10px;
	z-index: -1;
	margin-top: 70px;
}

.card .details p {
  font-family: 'Indie Flower', cursive !important;
	font-size: 15px;
	line-height: 5px;
	transform: rotate(-10deg);
	padding: 0 0 0 20px;
}

.card .details h4 {
  font-family: 'Indie Flower', cursive !important;
	text-align: center;
}

.text-right {
	text-align: right;
}

</style>

@endsection

@section('content')


<div class="card">
		<div class="imgBox">
			<div class="bark"></div>
			<img src="{{asset('img/congrats.png')}}">
		</div>
		<div class="details">
			<!-- <h4 class="color1">You're not a Fossil! (YET)</h2> -->
      <h4 class="color2 margin">Felicitaciones!!</h3>
        <br><br>

      <p>Lo lograste!</p>
      <br>
      <br>
			<p>Da clic en el boton siguiente</p>
			<p>Para Finalizar</p>
      <br>
      <br>
      <p><div class="card-actionbar">
          <div class="card-actionbar-row">
          	<a style="btn btn-flat btn-primary ink-reaction" href="/finalizar-actividad"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
          </div>
    </div></p>
		</div>
  </div>
  
  

@endsection
@section('addjs')

<script scr="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#example').DataTable();
  });
</script>
<script>
  $(document).ready(function () {
    $('#example').DataTable();
  });    
</script>


@endsection