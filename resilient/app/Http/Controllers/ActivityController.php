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

    public function paraActividadPracticaHumor()
    {
        return view('activities.2-11-meses.Actividad_PracticandoHumor.PracticaElSentidoDelHumor1');
    }
    public function paraActividadPracticaHumor2()
    {
        return view('activities.2-11-meses.Actividad_PracticandoHumor.PracticaElSentidoDelHumor2');
    }
    public function paraActividadPracticaHumor3()
    {
        return view('activities.2-11-meses.Actividad_PracticandoHumor.PracticaElSentidoDelHumor3');
    }
    public function paraActividadPracticaHumor4()
    {
        return view('activities.2-11-meses.Actividad_PracticandoHumor.PracticaElSentidoDelHumor4');
    }
    public function paraActividadPracticaHumor5()
    {
        return view('activities.2-11-meses.Actividad_PracticandoHumor.PracticaElSentidoDelHumor5');
    }

    public function paraActividadHastaElFinal(){
        return view('activities.2anos_2anos11meses.hasta_el_final.hasta_final_intro');
    }
      
    public function paraActividadHastaElFinal2(){
        return view('activities.2anos_2anos11meses.hasta_el_final.hasta_final_actividad');
    }

    public function paraActividadHastaElFinal3(){
        return view('activities.2anos_2anos11meses.hasta_el_final.hasta_final_actividad_2');
    }

    public function downloadImage($file){
        $pathtoFile = public_path().'//img/'.$file;
        return response()->download($pathtoFile);
    }
}
