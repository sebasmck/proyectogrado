@extends('partials.layout')

@section('title')
ARBOL GENIALOGICO
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
    <form class="form">
        <div class="card">

            <div class="card-head style-primary">
                <header> ÁRBOL GENEALÓGICO </header>
            </div>

            <div class="card-body floating-label">

                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:#008efd;">
                    <p style="text-align:center; text-justify: inter-word;"><b>Desarrollo de la actividad</b></p>
                    <center> <img src="{{asset('ActividadAg/pic.png')}}" alt="avatar"> </center>
                </div>
                <br>
                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;">
                    <label>
                        <p style="text-align:justify; text-justify: inter-word;">
                            El padre de familia reconocerá las diferentes partes del árbol y allí ubicara las personas,
                            integrantes de la familia que hacen parte fundamental del desarrollo de su hijo y que
                            además fomentan capacidad resiliente en el niño.
                        </p>
                    </label>
                </div>


                <div>
                </div>
                <!--end .card-body -->
            </div>
            <!--end .card -->
            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/ag2')}}"> <button type="button"
                            class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                </div>
            </div>

    </form>
</div>

@endsection
{{-- @section('addjs')
<script>
    var tl = new TimelineLite();
    avatar = $('.avatar');
        //  content = $('.content-card');
        // tl.to(title, 1.5, {y:10});
        // tl.from(card1, .3, {left:100, opacity:0});  
</script>
@endsection --}}