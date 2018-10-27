@extends('partials.layout')

@section('title')
Infantes

@endsection

@section('content')

<div class="container-fluid">
    <div class="text-right">
        <button type="button" class="btn btn-primary">
            <a href="{{ route('/datosnino') }}">
                Agregar infante
            </a>
        </button>
    </div>
    <div class="row align-items-center justify-content-center" style="margin-left: 12px;">
        <?php
        $infantes = [];
        if(isset($cuidador)){
        foreach ($cuidador->acudienteInfante as $relacionAcudienteInfante ){
            array_push($infantes, $relacionAcudienteInfante->infante);
        }

            for ($i = 0 ; $i < sizeof($infantes); $i++)
                {
                    $infanteActual = $infantes[$i];
                    $imagenPerfil = $infanteActual->Id_Sexo == 1? asset("MenuCuidadores/nino.jpeg"): asset("MenuCuidadores/nina.jpeg");
                    echo '<div class="col-md-3 col-sm-6">';
                      echo '<a href="'.route("/cuidador-dashboard", $infanteActual->Id_Infante).'">';
                           echo '<div class="card">';
                                echo ('<div style="width: 100%;height: 300px"><img class="card-img-top" src="'.$imagenPerfil.'" alt="Imagen niño" style="width:100%; height:300px;"></div>
                                    <div class="card-body">
                                        <b>Nombre: </b>'.$infanteActual->Nombre_Infante." ".$infanteActual->Apellido_Infante.' <br />
                                        <b>Edad: </b>'.$infanteActual->Edad_Infante.' años
                                    </div>
                                </div>');
                           echo ('</a>
                        </div>');
                }
        }
        ?>
    </div>
</div>


@endsection