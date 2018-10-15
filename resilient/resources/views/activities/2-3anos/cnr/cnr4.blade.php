@extends('partials.layout')

@section('title')
CUALIDADES NIÑOS RESILIENTES
@endsection

@section('addcss')

<style>

    ul {
  list-style-type: none;
}

li {
  display: inline-block;
}

input[type="radio"][id^="cb"] {
  display: none;
}

label {
  border: 1px solid #fff;
  padding: 10px;
  display: block;
  position: relative;
  margin: 10px;
  cursor: pointer;
}

label::before {
  background-color: white;
  color: white;
  content: " ";
  display: block;
  border-radius: 50%;
  border: 1px solid grey;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 28px;
  transition-duration: 0.4s;
  transform: scale(0);
}

label img {
  height: 100px;
  width: 150px;
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
}

:checked + label {
  border-color: #ddd;
}

:checked + label::before {
  content: "✓";
  background-color: grey;
  transform: scale(1);
}

:checked + label img {
  transform: scale(0.9);
  box-shadow: 0 0 5px #333;
  z-index: -1;
}

.grow { transition: all .2s ease-in-out; }
.grow:hover { transform: scale(0.9); }


</style>

@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
    <form class="form">
        <div class="card">

            <div class="card-head style-primary">
                <header> CUALIDADES NIÑOS RESILIENTES </header>
            </div>

            <div class="card-body floating-label">

                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;">
                    <label>
                        <p style="text-align:justify; text-justify: inter-word;"> <b>
                                Ahora que realizaste el listado de las características
                                de los niños resilientes, se te invita a seleccionar 3
                                de las características que te gustaría implementar en
                                esta semana: </b> </p>
                    </label>
                </div>
                <br>
                <div>
                    <ul>
                        <li><input type="checkbox" id="cb1" />
                            <label class="grow" for="cb1"><img src="{{asset('ActividadCnr/cnr_1.png')}}" /></label>
                        </li>
                        <li><input type="checkbox" id="cb2" />
                            <label class="grow" for="cb2"><img src="{{asset('ActividadCnr/cnr_2.png')}}" /></label>
                        </li>
                        <li><input type="checkbox" id="cb3" />
                            <label class="grow" for="cb3"><img src="{{asset('ActividadCnr/cnr_3.png')}}" /></label>
                        </li>
                        <li><input type="checkbox" id="cb4" />
                            <label class="grow" for="cb4"><img src="{{asset('ActividadCnr/cnr_4.png')}}" /></label>
                        </li>
                        <li><input type="checkbox" id="cb5" />
                            <label class="grow" for="cb5"><img src="{{asset('ActividadCnr/cnr_5.png')}}" /></label>
                        </li>
                        <li><input type="checkbox" id="cb6" />
                            <label class="grow" for="cb6"><img src="{{asset('ActividadCnr/cnr_6.png')}}" /></label>
                        </li>
                        <li><input type="checkbox" id="cb7" />
                            <label class="grow" for="cb7"><img src="{{asset('ActividadCnr/cnr_7.png')}}" /></label>
                        </li>
                        <li><input type="checkbox" id="cb8" />
                            <label class="grow" for="cb8"><img src="{{asset('ActividadCnr/cnr_8.png')}}" /></label>
                        </li>
                        <li><input type="checkbox" id="cb9" />
                            <label class="grow" for="cb9"><img src="{{asset('ActividadCnr/cnr_9.png')}}" /></label>
                        </li>
                        <li><input type="checkbox" id="cb10" />
                            <label class="grow" for="cb10"><img src="{{asset('ActividadCnr/cnr_10.png')}}" /></label>
                        </li>
                    </ul>
                </div>
            </div>
            <!--end .card -->

            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/cnr_logrosObtenidos')}}"> <button type="button"
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