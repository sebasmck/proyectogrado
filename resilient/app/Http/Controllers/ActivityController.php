<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Cuidador;
use App\RespuestaAbiertaActividad;
use App\LogrosActividad;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ActivityController extends Controller
{
    public function actividad(Request $request,$id){
        $actividad  = Actividad::where('Id_Actividad',$id)->get();
        return  $actividad;
    }

    //Actividad Practica Sentido Del Humor
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
   // despues de enviar la respuesta, falta agregarle el usuario por medio de la relacion del infante con la actividad 
    public function paraActividadPracticaLogos(Request $request)
    {
        $respuestaPregunta = new RespuestaAbiertaActividad ();  
        //insertar respuesta
        $respuestaPregunta->Id_Pregunta = 1; 
        $respuestaPregunta->Respuesta = $request->input('textarea2');
        $respuestaPregunta->id_RelacionAcudienteInfante = null; 
        $respuestaPregunta->save();
        return view('activities.2-11-meses.Actividad_PracticandoHumor.logrosObtenidos');
    }
    public function paraActividadPracticaCulminada(Request $request)
    {
        $LogrosActividad = new LogrosActividad (); 
        $NumActividad = 2; //Numero en base de datos tabla Actividad  
        $RelacionInfante = null ; // Por el momento enviar vacio  
        $LogrosActividad ->Aprendido = $request->input('si/No1');
        $LogrosActividad ->NoAprendido = $request->input('si/No2');
        $LogrosActividad ->AplicadoCrianza = $request->input('si/No3');
        $LogrosActividad ->NoAplicadoCrianza = $request->input('si/No4');
        $LogrosActividad ->id_AcudienteInfante = $RelacionInfante;
        $LogrosActividad ->id_Actividad = $NumActividad; 
        $LogrosActividad ->save();
        return view('activities.2-11-meses.Actividad_PracticandoHumor.CulminadoActividadPractica');
    }
    public function practicaSentidoDescripcion()
    {
        return view('activities.2-11-meses.Actividad_PracticandoHumor.intro_actividadPractica');
    }

    //Actividad Creando Confianza 
    public function creandoConfianzaDesc()
    {
        return view('activities.2-11-meses.Creando_Confianza.intro_CreandoConfianza');
    }

    public function creandoConfianza1()
    {
        return view('activities.2-11-meses.Creando_Confianza.CreandoConfianza1');
    }

    public function creandoConfianza2()
    {
        return view('activities.2-11-meses.Creando_Confianza.CreandoConfianza2');
    }
    public function creandoConfianza3()
    {
        return view('activities.2-11-meses.Creando_Confianza.CreandoConfianza3');
    }

    //Actividad hasta el final
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
    
    //Actividad elije lo que mas te guste
    public function loQueMasTeGuste(){
        return view('activities.2-11-meses.Mas_Te_Guste.intro_actividad_mas_te_guste');
    }

    public function loQueMasTeGuste2(){
        return view('activities.2-11-meses.Mas_Te_Guste.actividad_mas_te_guste');
    }

    public function loQueMasTeGuste3(){
        return view('activities.2-11-meses.Mas_Te_Guste.actividad_mas_te_guste_2');
    }

    //Subir y bajar archivos via FTP
    public function ftpTest(){
        $pathFiles = 'module_table_bottom.png';
        
        $file = Storage::disk('ftp')->download($pathFiles);
        return $file;
    }

    public function ftpUpImagesActivityLoQueMasTGuste(Request $request){
        $id_usuario = auth()->id();
        $acudiente = Cuidador::where('id_usuario', $id_usuario)->value('Id_Acudiente');

        $pathFiles = 'Images/ActivityMasTGuste/'.$acudiente;
        var_dump($acudiente);

        for($i=1;$i<10;$i++){
        
            $file = $request->file('fileToUpload'.$i);
            Storage::disk('ftp')->put($pathFiles , $file);
        }

        return $request;
    }
     
    //Actividad elije lo que mas te guste
    public function paraDignoDecarino(){
        return view('activities.2-11-meses.Digno_De_Carino.intro_digno_de_carino');
    }

    public function paraDignoDecarino2(){
        return view('activities.2-11-meses.Digno_De_Carino.digno_de_carino');
    }

    public function paraDignoDecarino3(){
        return view('activities.2-11-meses.Digno_De_Carino.digno_de_carino_3');
    }

    //Actividad el Mimo
    public function paraElmimo(){
        return view('activities.2-11-meses.El_mimo.intro_el_mimo');
    }
}
