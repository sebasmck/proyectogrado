@extends('partials.layout')

@section('title')
Home
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 40px;" >
                Reporte de Usuarios
            </div>

            <div style="margin-top: 100px;" class="card">
                <div  class="card-body">
                    <div class="col-md-3 col-xs-6">
                        <div class="card card1">
                        <a href="/home"><div class="card-body small-padding style-primary-dark text-center">Perfil</div></a>
                        </div>
                        <br><br>
                        <div class="card card2">
                            <a href="{{route('/users')}}"><div class="card-body small-padding style-primary text-center">Usuarios</div></a>
                        </div>
                        <br><br>
                        <div class="card card3">
                           <a href="/UserReporte"> <div class="card-body small-padding style-primary-light text-center">Reportes</div></a>
                        </div>
                        <br><br>
                        <div class="card card4">
                           <a href=""> <div class="card-body small-padding style-primary-bright text-center">Estadisticas</div> </a>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card content-card">
                            <div class="card-body" style=" height: 400px;">

                             <button type="button" class="btn btn-primary">Exportar a pdf reporte usuarios</button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('addjs')
<script scr="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

		<script>
			$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>

<script>

    $(document).ready( function () {
        $('#example').DataTable();
    } );

    var tl = new TimelineLite();

    var title = $('.title'),
     card1 = $('.card1'),
     card2 = $('.card2'),
     card3 = $('.card3'),
     card4 = $('.card4'),
     content = $('.content-card');


    tl.to(title, 1.5, {y:90});
    tl.from(card1, .3, {left:100, opacity:0});
    tl.from(card2, .3, {left:100, opacity:0});
    tl.from(card3, .3, {left:100, opacity:0});
    tl.from(card4, .3, {left:100, opacity:0});
    tl.from(content, .3, {left:100, opacity:0});

</script>

@endsection
