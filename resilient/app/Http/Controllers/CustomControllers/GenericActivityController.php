<?php

namespace App\Http\Controllers\CustomControllers;

use App\Actividad;
use Illuminate\Http\Request;

class GenericActivityController extends Controller
{
    public function index($id){
        $actividad = Actividad::with('preguntaActividades.opcionPreguntaActividad')->where('Id_Actividad', $id)->first();
        return view($actividad->View_Actividad, ['Actividad' => $actividad]);
    }

    public function nextStage($id){
        $stage = EscenarioActividad::where();
    }
}

