@extends('partials.layout')

@section('title')
Datos Niño
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" method="get" action="{{ route('/datosninostoresecond') }}">
            <div class="card">
                <div class="card-head style-primary">
                    <header>Ingresa los datos del niño</header>
                </div>
                <div class="card-body floating-label">
                
                {{-- GESTION CALIDAD (ANSWER IS NO) --}}
                    <div class="row">

                            <div class="card-body no-padding">
      
                                    {{--  <form name="comportamientos" id="comportamientos">  --}}
                    
                                      <ul class="list">
                                        <li class="tile">
                                          <a class="tile-content ink-reaction">
                                            {!! Form::select('respuestaantelamadre', [
                                             'si' => 'si',
                                             'no' => 'no',
                                             'n/a' => 'n/a',
                                             ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                    
                                            <div class="tile-text">
                                              <small>
                                               <b>1.</b> Mostró respuesta ante la madre
                                             </small>
                                           </div>
                    
                                         </a>
                                       </li>
                                       <li class="divider-full-bleed"></li>

                                       <li class="tile">
                                            <a class="tile-content ink-reaction">
                                              {!! Form::select('respuestaantelamadre', [
                                               'si' => 'si',
                                               'no' => 'no',
                                               'n/a' => 'n/a',
                                               ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                      
                                              <div class="tile-text">
                                                <small>
                                                 <b>2.</b> Rodó sobre sí mismo
                                               </small>
                                             </div>
                      
                                           </a>
                                         </li>
                                         <li class="divider-full-bleed"></li>

                                         <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>3.</b> Se sentó solo
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>4.</b> Gateó
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>5.</b> Caminó solo
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>6.</b> Se vistió solo
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>7.</b> Fue solo al baño
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>8.</b> Dejó de orinarse en la cama por las noches
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>9.</b> Balbuceó
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>10.</b> Dijo su primera palabra
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>11.</b> Dijo varias palabras juntas
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>12.</b> El niño lactó
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>13.</b> El niño utilizó biberón
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>14.</b> El niño uso chupo
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>

                                        <li class="tile">
                                                <a class="tile-content ink-reaction">
                                                  {!! Form::select('respuestaantelamadre', [
                                                   'si' => 'si',
                                                   'no' => 'no',
                                                   'n/a' => 'n/a',
                                                   ], null, [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                          
                                                  <div class="tile-text">
                                                    <small>
                                                     <b>15.</b> Se alimentó solo
                                                   </small>
                                                 </div>
                          
                                               </a>
                                             </li>
                                        <li class="divider-full-bleed"></li>
                                      </ul>
                    
                                      


                    </div>
                
                    
      
                        
      
      {{--  </form>  --}}
      
      {{-- alerts --}}
        <div class="alert alert-danger print-error-msg-gestioncalidadno" style="display:none">
          <ul></ul>
        </div>
      
        <div class="alert alert-success print-success-msg-gestioncalidadno" style="display:none">
          <ul></ul>
        </div>
      
      
      </div> {{-- card-body no padding --}}

                    


                    
                </div><!--end .card-body -->
                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Continuar</button>
                    </div>
                </div>
            </div><!--end .card -->
            
        </form>
    </div>

@endsection