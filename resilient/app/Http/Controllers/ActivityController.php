<?php

namespace App\Http\Controllers;

use App\Actividad;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    // public function index()
    //{
    // 	return view('admin.Actividades');
    //}

    //public function yourCharacter()
    //{
    //	return view('admin.Actividades2');
    //}

    //public function actividad1(){
    //    return view ('activities.2anos_2anos11meses.intro_activity1');
    //}

    public function index($id){
        $actividad  = Actividad::with('preguntas')->where('Id_Actividad',$id);
        return  $actividad;
    }
}
