@extends('partials.layout')

@section('title')
ARBOL GENIALOGICO
@endsection

@section('addcss')
<style>
    html {
  height: 100%;
}

.wrapper {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper .file-upload {
  height: 200px;
  width: 200px;
  border-radius: 100px;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  border: 4px solid #FFFFFF;
  overflow: hidden;
  background-image: linear-gradient(to bottom, #2590EB 50%, #FFFFFF 50%);
  background-size: 100% 200%;
  transition: all 1s;
  color: #FFFFFF;
  font-size: 100px;
}
.wrapper .file-upload input[type='file'] {
  height: 200px;
  width: 200px;
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  cursor: pointer;
}
.wrapper .file-upload:hover {
  background-position: 0 -100%;
  color: #2590EB;
}


</style>
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
    <form class="form">
        <div class="card">

            <div class="card-head style-primary">
                <header> ÁRBOL GENEALÓGICO  </header>
            </div>

            <div class="card-body floating-label">

                <div class="row">
                    <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:#008efd;">
                        <p style="text-align:center; text-justify: inter-word;"><b>Tarea para la semana.</b></p>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;">
                        <label>
                            <p style="text-align:justify; text-justify: inter-word;"> <b> Identificar con el niño las
                                    personas importantes en su vida teniendo en cuenta, relación de confianza, de
                                    aceptación, de escucha ¿qué tan escuchado te sientes? Realizar el ejercicio del
                                    árbol genealógico con imágenes de personas de su entorno, utiliza material
                                    reciclable o el que tu desees. Eso sí, recuerda que el producto final debe ser muy
                                    original y al final deberas subir un archivo en el programa, para continuar con la
                                    siguiente actividad.

                                </b> </p>
                        </label>
                        <br>
                        <div>
                                <div class="wrapper">
                                        <div class="file-upload">
                                          <input type="file" />
                                          <i class="fa fa-arrow-up"></i>
                                        </div>
                                      </div>
                        </div>
                        <br>
                        <p>
                            ¡Ánimo! ya verás cómo disfrutas junto con tu hijo, recuerda que el juego es la mejor forma
                            de comunicación y esto fortalece el vínculo afectivo.

                        </p>
                    </div>
                </div>
                <div>

                    

                </div>
                <!--end .card-body -->
            </div>
            <!--end .card -->

            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/ag_logrosObtenidos')}}"> <button
                            type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                </div>
            </div>

    </form>
</div>

@endsection
<!-- @section('addjs')
<script>

    
</script>
@endsection -->