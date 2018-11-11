@extends('partials.layout')

@section('title')
    Intro Actividad Como Loros
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
                    foreach ($activities as $activity){

                        echo ('<a href="get-activity-info/'.$activity->Id_Actividad.'" class="list-group-item list-group-item-action align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                  <h5 class="mb-1">'.$activity->Nombre_Actividad.'</h5>
                                  <small>semana '.$activity->semana.'</small>
                                </div>
                            <p class="mb-1">'.$activity->Descripcion_Actividad.'</p>
                            </a>');
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
@endsection

