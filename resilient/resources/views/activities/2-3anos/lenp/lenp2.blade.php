@extends('partials.layout')

@section('title')
CUALIDADES NIÑOS RESILIENTES
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
    <form class="form">
        <div class="card">

            <div class="card-head style-primary">
                <header> CUALIDADES NIÑOS RESILIENTES </header>
            </div>

            <div class="card-body floating-label">

                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:#008efd;">
                    <p style="text-align:center; text-justify: inter-word;"><b>Desarrollo Actividad</b></p>
                    <img class="pull-right" src="{{asset('img/avatar.png')}}" alt="avatar">
                </div>

                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;">
                    <label>
                        <p style="text-align:justify; text-justify: inter-word;"> <b> Ven a ver el siguiente video </b> </p>
                    </label>
                </div>


                <div class="col-md-8">
                
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/h_8oX8739Ys" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>

                <div>

                    <div>

                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;">
                            <!--Acordion 1 empieza -->
                            {{-- <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="heading1">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                                <b> Nota Importante Actividad</b>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <label>
                                                <p style="text-align:justify; text-justify: inter-word; color:black;">
                                                    A continuación, encontraras 3 situaciones en donde utilizará cada
                                                    uno de los materiales solicitados.
                                                    Con ellos te pediremos que generes situaciones específicas en donde
                                                    podremos enseñarle a tu niño o niña
                                                    cómo reírse de las desventuras.
                                                </p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!--Acordion 1 Finaliza -->

                        </div>

                    </div> {{-- card-body no padding --}}
                </div>
                <!--end .card-body -->


            </div>
            <!--end .card -->

            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/lenp3')}}"> <button type="button"
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