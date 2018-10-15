@extends('partials.layout')

@section('title')
SEGUIR Y SEGUIR INTENTANDO
@endsection

@section('addcss')
<style>

    .activity{
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    }

    .row{
        margin-bottom: 35px;
    }

    .options{
    display: block;
    margin-left: 35%;
    margin-right: auto;
    margin-top: 25px;
    width: 50%;
    }

</style>
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
    <form class="form">
        <div class="card">

            <div class="card-head style-primary">
                <header> SEGUIR Y SEGUIR INTENTANDO </header>
            </div>

            <div class="card-body floating-label">



                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;">
                    <label>
                        <p style="text-align:justify; text-justify: inter-word;"> Resuelve las siguientes actividades y
                            responde al final de cada una, cuál de las respuestas es la correcta.
                        </p>
                    </label>
                </div>


                <div class="col-md-12">
                    <div style="margin-top:45px;" class="row">
                        <img class="activity" src="{{asset('ActividadSsi/ssi1.png')}}" alt="ssi1">
                        <div class="options">
                            <div class="col-sm-9">
                                <label class="radio-inline radio-styled">
                                    <input type="radio" name="ssi1" value=""><span>A</span>
                                </label>
                                <label class="radio-inline radio-styled">
                                    <input type="radio" name="ssi1" value=""><span>B</span>
                                </label>
                                <label class="radio-inline radio-styled">
                                    <input type="radio" name="ssi1" value=""><span>C</span>
                                </label>
                                <label class="radio-inline radio-styled">
                                    <input type="radio" name="ssi1" value=""><span>D</span>
                                </label>
                                <label class="radio-inline radio-styled">
                                    <input type="radio" name="ssi1" value=""><span>E</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <img class="activity" src="{{asset('ActividadSsi/ssi2.png')}}" alt="ssi1">
                        <div class="options">
                                <div class="col-sm-9">
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="ssi2" value="option1"><span>A</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="ssi2" value="option2"><span>B</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="ssi2" value="option3"><span>C</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="ssi2" value="option3"><span>D</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="ssi2" value="option3"><span>E</span>
                                    </label>
                                </div>
                            </div>
                    </div>
                    <hr>
                    <div class="row">
                        <img class="activity" src="{{asset('ActividadSsi/ssi3.png')}}" alt="ssi1">
                        <div class="options">
                                <div class="col-sm-9">
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="ssi3" value="option1"><span>A</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="ssi3" value="option2"><span>B</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="ssi3" value="option3"><span>C</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="ssi3" value="option3"><span>D</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="ssi3" value="option3"><span>E</span>
                                    </label>
                                </div>
                            </div>
                    </div>
                    <hr>
                    <div class="row">
                        <img class="activity" src="{{asset('ActividadSsi/ssi4.png')}}" alt="ssi1">
                        <div class="options">
                                <div class="col-sm-9">
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="ssi4" value="option1"><span>A</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="ssi4" value="option2"><span>B</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="ssi4" value="option3"><span>C</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="ssi4" value="option3"><span>D</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="ssi4" value="option3"><span>E</span>
                                    </label>
                                </div>
                            </div>
                    </div>
                    <hr>
                </div>

                <div>

                </div>
                <!--end .card-body -->


            </div>
            <!--end .card -->

            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/ssi2')}}"> <button type="button"
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