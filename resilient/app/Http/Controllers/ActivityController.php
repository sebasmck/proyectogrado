<?php

namespace App\Http\Controllers;

use App\Actividad;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function actividad(Request $request,$id){
        $actividad  = Actividad::where('Id_Actividad',$id)->get();
        return  $actividad;
    }
}
