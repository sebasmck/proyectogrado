@extends('partials.layout')

@section('title')
Actividad juguemos a conocer nuestras emociones
@endsection
@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form"  id="formulario" method="GET" action="{{route('/JuguemosEmociones2')}}">
            {{ csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                   <header>  Instrucción - Actividad 2 </header>
                </div>

                <div class="card-body floating-label"> 
                <div style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                        <p style="text-align:justify; text-justify: inter-word;">
                                Tomarás las tres tarjetas y a cada una les escribirlas una de las tres emociones básicas.
                                 Después le dirás a tu bebé que tome una y deberás con un muñeco representar la emoción, 
                                 como si fueran títeres (Ejemplo: si tu hijo le enoja que le quiten un muñeco, pues puedes 
                                 representar esa situación con los muñecos. Así con cada emoción). 
                        </p>
                      </div>  
                      <div>
                            <p style="text-align:left; text-justify: inter-word; color: green">
                                <a id="image1" href="/download/TARJETAS.pdf">
                                    haga click aquí para descargar archivo </a>
                               </p>
                          <div> 
             </div> {{-- card-body no padding --}}
        </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" > <button id="siguiente"type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
@section('addjs')

@endsection