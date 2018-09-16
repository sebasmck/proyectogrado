@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" onsubmit="return validate()">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} justLetters" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last-name" class="col-md-4 col-form-label text-md-right">{{__('Apellidos')}}</label>

                            <div class="col-md-6">
                                <input id="last-name" type="text" class="form-control{{ $errors->has('last-name') ? ' is-invalid' : '' }} justLetters" name="last-name" value="{{ old('last-name') }}" required autofocus>
                            
                                @if ($errors->has('last-name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last-name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="documento" class="col-md-4 col-form-label text-md-right">{{__('Documento')}}</label>
                            <div class="col-md-3">
                                <select name="tipo-documento" class="form-control{{ $errors->has('tipo_documento') ? ' is-invalid' : '' }}" id="tipo-documento">
                                    <option value="1">C.C</option>
                                    <option value="2">C.E</option>
                                    <option value="3">PASAPORTE</option>
                                </select>

                            </div>
                            <div class="col-md-3">
                                <input id="documento" type="" class="form-control{{ $errors->has('documento') ? ' is-invalid' : '' }} number" name="documento" value="{{ old('documento') }}" required autofocus>
                            
                                @if ($errors->has('documento'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('documento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Comienzo del modal de terminos y condiciones-->
<!-- Este modal es activado segun la especificación del Bootstrap js $('#conditionsModal').modal('toggle')-->
  <div class="modal fade" id="conditionsModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false"
      data-show="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" 
        id="favoritesModalLabel">Términos y condiciones</h4>
      </div>
      <div class="modal-body">

      <!-- Agregar aquí los términos y condiciones ya que esta parte hace "scroll"-->
      <div id="scrolleable" style="overflow: scroll; height: 400px;">
  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
  sed do eiusmod tempor incididunt ut labore et dolore magna
  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
  ullamco laboris nisi ut aliquip ex ea commodo consequat.
  Duis aute irure dolor in reprehenderit in voluptate velit
  esse cillum dolore eu fugiat nulla pariatur. Excepteur
  sint occaecat cupidatat non proident, sunt in culpa qui
  officia deserunt mollit anim id est laborum.
</div>
 <!-- Fin Agregar aquí los términos y condiciones ya que esta parte hace "scroll"-->
        <div>
        <p><b>Acepto los términos y condiciones </b>  <input id="checkCondition" type="checkbox" /></p>
      </div>
      </div>
      <div class="modal-footer">

      <!-- Si no se acepta se redirecciona al manu principal-->
        <a href="{{route('/welcome')}}"><button type="button" 
           class="btn btn-danger" 
           >No acepto</button></a>

        <span class="pull-right">
        <!-- SI acepta sigue el flujo normal de la aplicación-->
          <button id="acept" type="button" class="btn btn-primary" data-dismiss="modal" disabled>
            Aceptar Términos y condiciones
          </button>

        </span>
      </div>
    </div>
  </div>
</div>
<!-- Fin del modal de terminos y condiciones-->

@endsection

@section('addjs')
<script>
$(document).ready(function(){

//hacer que el modal dialog se active apenas se cargue el DOM
$('#conditionsModal').modal('toggle');

    $("#checkCondition").click(function(){
        //Verificar si el checkbox esta checkeado (perdon la redundancia)
       if( $("#checkCondition").is(":checked") ){
           //si esa check la propiedad disable se settea a false o de lo contrario a true (habilita el botón)
           $("#acept").prop('disabled', false);
       }else{
           //true el boton se deshabilita
           $("#acept").prop('disabled', true);
       }
    });

//hacer scroll el términos y condiciones
$("#scrolleable").scroll();

  //Input que solo admite letras
  $(".justLetters").keypress(function(e){
  var key = e.keyCode || e.charCode || e.which;
  if((key >= 65 && key <= 90)  || (key>=97 && key <= 122) || key == 32){
      
  }else{
      e.preventDefault();
  }
   
  });

//Input que admite solo números y la barrita (-)
 $(".number").keypress(function(event){
         var key = event.KeyCode || event.charCode || event.which;
        if((key >= 48 && key <= 57) || key ==8 || key ==45) {
        
        }else{
         event.preventDefault();
        }

     });

});
</script>
@endsection