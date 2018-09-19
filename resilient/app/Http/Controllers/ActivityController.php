<?php

namespace App\Http\Controllers;

use App\Actividad;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function index($id){
        $actividad = Actividad::with('preguntaActividades.opcionPreguntaActividad')->where('Id_Actividad',$id)->first();
        return  view($actividad->View_Actividad,['Actividad' => $actividad]);
    }

    public function saveActivity()
    {

    }
}
