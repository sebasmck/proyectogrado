@extends('partials.layout')

@section('title')
COSAS DE GRANDE
@endsection

@section('addcss')

<style>
  ul {
  list-style-type: none;
}

li {
  display: inline-block;
}

input[type="checkbox"][id^="cb"] {
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
                <header> COSAS DE GRANDE </header>
            </div>

            <div class="card-body floating-label">
                
                <ul>
                    <li><input type="checkbox" id="cb1" />
                        <label class="grow" for="cb1"><img src="{{asset('ActividadCdg/cdg1.png')}}" /></label>
                    </li>
                    <li><input type="checkbox" id="cb2" />
                        <label class="grow" for="cb2"><img src="{{asset('ActividadCdg/cdg2.png')}}" /></label>
                    </li>
                    <li><input type="checkbox" id="cb3" />
                        <label class="grow" for="cb3"><img src="{{asset('ActividadCdg/cdg3.png')}}" /></label>
                    </li>
                    <li><input type="checkbox" id="cb4" />
                        <label class="grow" for="cb4"><img src="{{asset('ActividadCdg/cdg4.png')}}" /></label>
                    </li>
                    <li><input type="checkbox" id="cb5" />
                        <label class="grow" for="cb5"><img src="{{asset('ActividadCdg/cdg5.png')}}" /></label>
                    </li>
                    <li><input type="checkbox" id="cb6" />
                        <label class="grow" for="cb6"><img src="{{asset('ActividadCdg/cdg6.png')}}" /></label>
                    </li>
                    <li><input type="checkbox" id="cb7" />
                        <label class="grow" for="cb7"><img src="{{asset('ActividadCdg/cdg7.png')}}" /></label>
                    </li>
                    <li><input type="checkbox" id="cb8" />
                        <label class="grow" for="cb8"><img src="{{asset('ActividadCdg/cdg8.png')}}" /></label>
                    </li>
                </ul>
                
            </div>
            

            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/cdg3')}}"> <button type="button"
                            class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                </div>
            </div>

    </form>
</div>

@endsection
