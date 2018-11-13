@extends('partials.layout')

@section('title')
    Actividades
@endsection

@section('addcss')
    <style>

    </style>
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
            <div class="card-head style-primary small-padding">
               <h2> Actividades a realizar</h2>
            </div>
            <div class="card-body">
                <div class="list-group">
                <?php
                        $semanas= array();

                        if($activities != null){
                            foreach ($activities as $activity){

                                if(!in_array($activity->semana,$semanas) )
                                {
                                    array_push($semanas,$activity->semana);
                                    echo ('<div class="list-group-item list-group-item-action align-items-start style-primary-dark">
                                            <div class="d-flex w-100 justify-content-between">
                                              <h3 class="mb-1"> Semana No '.$activity->semana.'</h3>
                                            </div>
                                    </div>');
                                }

                                if($actividadPendiente->Id_Actividad == $activity->Id_Actividad){
                                    echo ('<a href="'.env('APP_URL').'/get-activity-info/'.$activity->Id_Actividad.'" class="list-group-item list-group-item-action align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                  <h4 class="mb-1"><b>'.$activity->Nombre_Actividad.'</b></h4>
                                </div>
                                <p class="mb-1">'.$activity->Descripcion_Actividad.'</p>
                                </a>');
                                }
                                else
                                {
                                echo (
                            '<div class="list-group-item list-group-item-action align-items-start disabled">
                                <div class="d-flex w-100 justify-content-between">
                                  <h4 class="mb-1"><b>'.$activity->Nombre_Actividad.'</b></h4>
                                </div>
                                 <p class="mb-1">'.$activity->Descripcion_Actividad.'</p>
                              </div>');
                                }
                            }
                        }else{
                            echo '<div>Ya has terminado todas las actividades propuestas para este infante</div>';
                        }

                      

                ?>
                </div>
            </div>
        </div>
    </div>
@endsection

