@extends('partials.layout')

@section('title')
    Escala
@endsection

@section('content')
<div class="col-lg-offset-2 col-md-8">
    <div class="card">
        <div class="card-head style-primary">
            <header>Resultado escala de parentalidad</header>
        </div>

        <div class="card-body">
            <div class="container-fluid">
                @foreach($zonas as $zona)
                    <div class="row">
                        <div class="col-3 col-md-3 col-sm-3">
                            <h5>{{$zona->nombre_zonaep2}}</h5>
                        </div>
                        <div class="col-2 col-md-2 col-sm-2">
                            <span class="badge badge-secondary" style="background-color: {{$zona->color_zonaep2}}">&nbsp;</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <canvas class="card-img-top" id="myChart"></canvas>
            <hr />
            <div class="accordion" id="accordionExample">
                @for($i = 0 ; $i < sizeof($detalleCalificacion); $i++)
                    <div class="card">
                        <div class="card-header" id="heading{{$i}}">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="false" aria-controls="collapse{{$i}}">
                                      DESCRIPCIÓN  {{$detalleCalificacion[$i]->rubrica->competencia->nombre_competenciaep2}}
                                </button>
                            </h5>
                        </div>
                        <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordionExample">
                            <div class="card-body">
                                <?php print $detalleCalificacion[$i]->rubrica->mensajeCuidador_calificacionep2 ?>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div>
                <button type="button" class="btn btn-primary"><a href="{{ route('/finalizar-escalap2') }}">Finalizar</a></button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('addjs')
    <?php
            $competenciasText = "";
            foreach ($competencias as $competencia){
                $competenciasText = $competenciasText . '"'. $competencia->nombre_competenciaep2 . '",';
            }
            $data = "";
            $colores = "";
            foreach ($detalleCalificacion as $detalle){
                $data = $data.$detalle->puntaje_detallecalificacionep2.',';
                $colores = $colores. '"'.$detalle->rubrica->zona->color_zonaep2. '",';
            }

        echo '
            <script type="text/javascript">
                var canvas = document.getElementById("myChart").getContext("2d");

                    var chart = new Chart(canvas, {
                    // The type of chart we want to create
                    type: "bar",

                    // The data for our dataset
                    data: {
                        labels: ['.$competenciasText.'],
                        datasets: [{
                            label: "Escala parentalidad",
                            backgroundColor: ['.$colores.'],
                            data: ['.$data.'],
                        }]
                    },

            // Configuration options go here
            options: {
                  legend: { display: false },
                  title: {
                    display: true,
                    text: "Resultados escala de parentalidad positiva"
                  }
    }
            });
    </script>
        ';


    ?>


@endsection