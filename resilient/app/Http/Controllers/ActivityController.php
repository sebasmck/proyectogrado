<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\RespuestaAbiertaActividad;
use App\LogrosActividad;
use App\RespuestaMultipleActividad;  

use Illuminate\Http\Request;


class ActivityController extends Controller
{
    const URL_APRENDAMOS_DE_RESILIENCIA_ = "activities.2-11-meses.aprendamos_resiliencia.aprendamos_resiliencia";
    const URL_ACTIVIDAD_1_PRENDIENDO_MOTORES = "activities.2-11-meses.aprendamos_resiliencia.prendiendo_motores";


    // Activity: Cualidades Niños Resilientes


    public function cnr_intro(){
        return view('activities.2-3anos.intro_cnr');
    }

    public function cnr1(){
        return view('activities.2-3anos.cnr1');
    }

    public function cnr2(){
        return view('activities.2-3anos.cnr2');
    }

    public function cnr3(){
        return view('activities.2-3anos.cnr3');
    }


    public function index($id)
    public function aprendamosResilienciaIntro()
    {
        return view("activities.2-11-meses.aprendamos_resiliencia.intro_aprendamos_resiliencia");
    }

    public function actividad(Request $request,$id){
        $actividad  = Actividad::where('Id_Actividad',$id)->get();
        return  $actividad;
    }

    public function saveActivity()
    {

    }

    public function goToUrl($id,Request $request){

        return view(self::URL_ACTIVIDAD_1_PRENDIENDO_MOTORES);
    }

    // Actividad 1

    public function index(){
        $actividad = Actividad::with('preguntaActividades.opcionPreguntaActividad')->where('Id_Actividad', 1)->first();
        return view("activities.2-11-meses.aprendamos_resiliencia.aprendamos_resiliencia", ['Actividad' => $actividad]);
    }

    public function aprendamosDeResiliencia(){
        return view("activities.2-11-meses.aprendamos_resiliencia.prendiendo_motores");
    }

    public function ellaEsEdithGrotberg(){
        return view("activities.2-11-meses.aprendamos_resiliencia.ella_es_edith_grotberg");
    }

    public function  queSabesResiliencia(){
        return view("activities.2-11-meses.aprendamos_resiliencia.que_sabes_resiliencia");
    }

    public function queEsResiliencia(){
        return view("activities.2-11-meses.aprendamos_resiliencia.que_es_resiliencia");
    }

    public function escogerDefinicionResiliencia(){
        return view("activities.2-11-meses.aprendamos_resiliencia.definicion_resiliencia");
    }

    public function  verbalizacioneDeGrotberg(){
        return view("activities.2-11-meses.aprendamos_resiliencia.verbalizaciones_grotberg");
    }

    public  function resilienciaEnLaCrianza(){
        return view("activities.2-11-meses.aprendamos_resiliencia.resiliencia_en_la_crianza");
    }

    public function resiliencialogros(){
        return view("activities.2-11-meses.aprendamos_resiliencia.logrosObtenidos");
    }

    public function guardarLogros($id, Request $request)
    {
        $LogrosActividad = new LogrosActividad ();
        $NumActividad = $id; //Numero en base de datos tabla Actividad
        $RelacionInfante = null ; // Por el momento enviar vacio
        $LogrosActividad ->Aprendido = $request->input('si/No1');
        $LogrosActividad ->NoAprendido = $request->input('si/No2');
        $LogrosActividad ->AplicadoCrianza = $request->input('si/No3');
        $LogrosActividad ->NoAplicadoCrianza = $request->input('si/No4');
        $LogrosActividad ->id_AcudienteInfante = $RelacionInfante;
        $LogrosActividad ->id_Actividad = $NumActividad;
        $LogrosActividad ->save();
        $this->index();
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

    public function creandoConfianzaLogros(Request $request)
    {
        $respuestaMultiple = new RespuestaMultipleActividad();
        $pregunta = 4; 
        $RelacionInfante = null ; // Por el momento enviar vacio  
        $respuestaMultiple ->Seleccionada = $request->input('optionsRadios');
        $respuestaMultiple->Id_Pregunta = $pregunta;
        $respuestaMultiple->id_RelacionAcudienteInfante = $RelacionInfante; 
        $respuestaMultiple->save();
        return view('activities.2-11-meses.Creando_Confianza.LogrosObtenidos');
    }
    public function creandoConfianzaCulminacion(Request $request)
    {

        $LogrosActividad = new LogrosActividad (); 
        $NumActividad = 4; //Numero en base de datos tabla Actividad  
        $RelacionInfante = null ; // Por el momento enviar vacio  
        $LogrosActividad ->Aprendido = $request->input('si/No1');
        $LogrosActividad ->NoAprendido = $request->input('si/No2');
        $LogrosActividad ->AplicadoCrianza = $request->input('si/No3');
        $LogrosActividad ->NoAplicadoCrianza = $request->input('si/No4');
        $LogrosActividad ->id_AcudienteInfante = $RelacionInfante;
        $LogrosActividad ->id_Actividad = $NumActividad; 
        $LogrosActividad ->save();
        return view('activities.2-11-meses.Creando_Confianza.CreandoConfianzaFinal');
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
    
     //Actividad Formando niños resilientes 
     public function formandoNinosResDesc()
     {
         return view('activities.2-11-meses.FormandoNinosR.intro_actividadFormandoNR');
     }
     public function formandoNinosRes1()
     {
         return view('activities.2-11-meses.FormandoNinosR.FormandoNR1');
     }

     public function formandoNinosRes2()
     {
         return view('activities.2-11-meses.FormandoNinosR.FormandoNR2');
     }

     public function formandoNinosRes3()
     {
         return view('activities.2-11-meses.FormandoNinosR.FormandoNR3');
     }
     public function formandoNinosRes4()
     {
         return view('activities.2-11-meses.FormandoNinosR.FormandoNR4');
     }
     public function formandoNinosRes5()
     {
         return view('activities.2-11-meses.FormandoNinosR.FormandoNR5');
     }

     public function formandoNinosRes6()
     {
         return view('activities.2-11-meses.FormandoNinosR.FormandoNR6');
     }
     public function formandoNinosResLogros()
     {
         return view('activities.2-11-meses.FormandoNinosR.logrosObtenidos');
     }

     public function formandoNinosResFinal(Request $request)
     {
        $LogrosActividad = new LogrosActividad (); 
        $NumActividad = 5; //Numero en base de datos tabla Actividad  
        $RelacionInfante = null ; // Por el momento enviar vacio  
        $LogrosActividad ->Aprendido = $request->input('si/No1');
        $LogrosActividad ->NoAprendido = $request->input('si/No2');
        $LogrosActividad ->AplicadoCrianza = $request->input('si/No3');
        $LogrosActividad ->NoAplicadoCrianza = $request->input('si/No4');
        $LogrosActividad ->id_AcudienteInfante = $RelacionInfante;
        $LogrosActividad ->id_Actividad = $NumActividad; 
        $LogrosActividad ->save();
         return view('activities.2-11-meses.FormandoNinosR.FormandoNRFinal');
     }

     // Actividad UN TESORO ESCONDIDO. "SOY CAPAZ DE… Y ME AMO COMO SOY”
     public function tesoroEscondidoDesc()
     {
         return view('activities.2-11-meses.FormandoNinosR.intro_actividadFormandoNR');
     }



}
