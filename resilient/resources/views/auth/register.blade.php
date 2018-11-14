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
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} justLetters" name="name" value="{{ old('name') }}" required autofocus maxlength="20">

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
                                <input id="last-name" type="text" class="form-control{{ $errors->has('last-name') ? ' is-invalid' : '' }} justLetters" name="last-name" value="{{ old('last-name') }}" required autofocus maxlength="20">
                            
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
                                <input id="documento" type="" class="form-control{{ $errors->has('documento') ? ' is-invalid' : '' }} number" name="documento" value="{{ old('documento') }}" required autofocus maxlength="10">
                            
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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required maxlength="35">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                                oninvalid="this.setCustomValidity('la contraseña debe contener una mayuscula, numeros y debe tener 8 caracteres ')">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Repita la contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="enviar">
                                    {{ __('Registrarse') }}
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

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" 
        id="favoritesModalLabel">Términos y condiciones</h4>
      </div>
      <div class="modal-body">

      <!-- Agregar aquí los términos y condiciones ya que esta parte hace "scroll"-->
      <div id="scrolleable" style="overflow: scroll; height: 400px;text-align:center;">
      <b>CONSENTIMIENTO INFORMADO<br/>

PARA PARTICIPAR VOLUNTARIAMENTE EN EL PROGRAMA<br/>
Pautas de crianza resilientes en infantes y preescolares: Una propuesta educativa para padres
 <br/><br/>
 
FACULTAD DE PSICOLOGÍA – UNIVERSIDAD EL BOSQUE<br/>
NIVELES DE FORMACIÓN:  PREGRADO Y MAESTRÍA
<br/><br/>
NOMBRE DE LAS ESTUDIANTES INVESTIGADORAS:</b>
<br/><br/>
Olga Paola Castañeda Peña – Psicóloga en Formación<br/>
Angie Paola Florez Sanchez - Psicóloga en Formación<br/>
Karine Cristina Rostock Da Silva - Psicóloga en Formación<br/>
Ps. Laura Milena Durán Socha – Estudiante de Maestría en Psicología<br/>
Ps. Rudy Marcela Sánchez Guarnizo - Estudiante de Maestría en Psicología<br/>
Ps. María Fernanda Maldonado Hidalgo - Estudiante de Maestría en Psicología<br/>
<br/><br/>
 
<b>NOMBRE DE LA DIRECTORA INVESTIGADORA:</b><br/>
Ps.Mg. Luz Helena Buitrago León.<br/><br/>
 
Objetivo General del estudio<br/>
El presente programa hace parte de la investigación que tiene como objetivo el diseño y aplicación de una
propuesta educativa para cuidadores de infantes y preescolares la cual, es útil para permitir educar y/o fortalecer a
los cuidadores en el aprendizaje de las características de una crianza resiliente.
<br/>
Riesgos:<br/>
Las participaciones en este programa estarán expuestos a un riesgo mínimo, ya que la probabilidad y la
magnitud del daño o malestar previsto en la investigación no son superiores a los que se encuentran en la vida diaria
o en el curso de un examen o prueba física o psicológica.
<br/>
Beneficios:<br/>
El principal beneficio beneficio que en general se obtiene con el desarrollo de este programa es el de
obtener un conocimiento que pueda ser aplicable en su vida diaria y en su rol como padre, madre o cuidador en
general, al mismo tiempo que contribuir a la sociedad en conocimientos aplicables.
<br/>
Confidencialidad:<br/>
Los resultados que este programa suministra serán tratados con total anonimato, no serán divulgados y serán
de uso exclusivo de los investigadores. Los nombres se mantendrán también en absoluta reserva, no serán
publicados en ningún documento.
<br/>
Participación voluntaria:<br/>
La colaboración en este programa es voluntaria y no conllevará a ningún beneficio ni perjuicio de tipo social,
económico, político, académico, etc., de igual forma conozco que puedo retirarme en el momento que lo desee.
<br/>
Almacenamiento de los datos para la confidencialidad del programa:<br/>
En el cuestionario los nombres se mantendrán en absoluta reserva. La información será analizada
exclusivamente por las investigadoras a cargo del estudio. Así como la posibilidad que tienen de ser informado
sobre los resultados generales de la investigación y el uso que se tendrán.
<br/>
 Acepto que conozco este programa, su propósito y procedimientos en relación. Adicionalmente he sido
informado acerca de la totalidad de riesgos y beneficios de este programa, comprendo que mis datos
personales serán confidenciales y solo serán usados para fines de esta investigación y que los datos
obtenidos  solo pueden ser publicados o difundidos con fines científicos, por lo tanto, declaro que deseo
participar voluntariamente. Del mismo modo, otorgo mi permiso para que el uso de datos obtenidos a
partir de la auto aplicación de la Escala de Parentalidad Positiva E2p y de la Escala de Resiliencia de
Wagnild y Young sean utilizados exclusivamente con fines académicos de esta investigación.
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

jQuery.fn.preventDoubleSubmission = function() {
        $(this).on('submit',function(e){
            var $form = $(this);

            if ($form.data('submitted') === true) {
                // Previously submitted - don't submit again
                e.preventDefault();
            } else {
                // Mark it so that the next submit can be ignored
                $form.data('submitted', true);
            }
        });

        // Keep chainability
        return this;
    };

    $('form').preventDoubleSubmission();

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
  
if(e.charCode == 37 || e.charCode == 39){
    e.preventDefault();
    return;
}

  if((key >= 65 && key <= 90)  || (key >=97 && key <= 122) || key == 32 || key == 37 || key == 39 || key == 127 || key ==8){
      
  }else{
      e.preventDefault();
  }
   
  });

//Input que admite solo números y la barrita (-)
 $(".number").keypress(function(event){
         var key = event.KeyCode || event.charCode || event.which;
 
 if(event.charCode == 37 || event.charCode == 39){
    event.preventDefault();
    return;
}

        if((key >= 48 && key <= 57) || key ==8 || key ==45 || key == 37 || key == 39) {
        
        }else{
         event.preventDefault();
        }
     });

});
</script>
@endsection