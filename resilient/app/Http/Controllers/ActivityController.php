<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Cuidador;
use App\RespuestaAbiertaActividad;
use App\LogrosActividad;
use App\RespuestaMultipleActividad;  

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ActivityController extends Controller
{
    const URL_APRENDAMOS_DE_RESILIENCIA_ = "activities.2-11-meses.aprendamos_resiliencia.aprendamos_resiliencia";
    const URL_ACTIVIDAD_1_PRENDIENDO_MOTORES = "activities.2-11-meses.aprendamos_resiliencia.prendiendo_motores";


        public function aprendamosResilienciaIntro()
    {
        return view("activities.2-11-meses.aprendamos_resiliencia.intro_aprendamos_resiliencia");
    }

   
    // public function index($id)
    // {
    //     $actividad = Actividad::with('preguntaActividades.opcionPreguntaActividad')->where('Id_Actividad', $id)->first();
    //     return view($actividad->View_Actividad, ['Actividad' => $actividad]);
    // }

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
         return view('activities.2-11-meses.TesoroEscondido.intro_actividadTesoroEscondido');
     }

     public function tesoroEscondido1()
     {
         return view('activities.2-11-meses.TesoroEscondido.TesoroEscondido1');
     }

     public function tesoroEscondido2()
     {
         return view('activities.2-11-meses.TesoroEscondido.TesoroEscondido2');
     }

     public function tesoroEscondidoLogros()
     {
         return view('activities.2-11-meses.TesoroEscondido.logrosObtenidos');
     }

     public function tesoroEscondidoCulminacion()
     {
         return view('activities.2-11-meses.TesoroEscondido.CulminadoTesoroEscondido');
     }

     // Rutas para Actividad COMO LOROS
     public function comoLorosDesc()
     {
         return view('activities.3-11-meses.ComoLoros.intro_ComoLoros');
     }
     public function comoLoros1()
     {
         return view('activities.3-11-meses.ComoLoros.ComoLoros1');
     }
     public function comoLoros2()
     {
         return view('activities.3-11-meses.ComoLoros.ComoLoros2');
     }
     public function comoLoros3()
     {
         return view('activities.3-11-meses.ComoLoros.ComoLoros3');
     }
     public function comoLoros4()
     {
         return view('activities.3-11-meses.ComoLoros.ComoLoros4');
     }
     public function comoLorosLogros()
     {
         return view('activities.3-11-meses.ComoLoros.LogrosObtenidos');
     }
     public function comoLorosCulminacion()
     {
         return view('activities.3-11-meses.ComoLoros.CulminadoComoLoros');
     }
     
     

    // Rutas para Actividad NIÑOS RESILIENTES

     public function ninosResilientesDesc()
     {
         return view('activities.3-11-meses.NinosResilientes.intro_NinosResilientes');
     }

     public function ninosResilientes1()
     {
         return view('activities.3-11-meses.NinosResilientes.NinosResilientes1');
     }

     public function ninosResilientes2()
     {
         return view('activities.3-11-meses.NinosResilientes.NinosResilientes2');
     }

     public function ninosResilientes3()
     {
         return view('activities.3-11-meses.NinosResilientes.NinosResilientes3');
     }
     public function ninosResilientes4()
     {
         return view('activities.3-11-meses.NinosResilientes.NinosResilientes4');
     }
     public function ninosResilientesLogros()
     {
        return view('activities.3-11-meses.NinosResilientes.LogrosObtenidos');
     }
     public function ninosResilientesCulminacion()
     {
        return view('activities.3-11-meses.NinosResilientes.CulminadoNinosR');
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

    public function ftpUpFilesActivityNinosResilientes(Request $request){
        $id_usuario = auth()->id();
        $acudiente = Cuidador::where('id_usuario', $id_usuario)->value('Id_Acudiente');
        $pathFiles = 'Files/ActivityNinosResilientes/'.$acudiente;
        var_dump($acudiente);
        $file = $request->file('fileToUpload'.$i);
        Storage::disk('ftp')->put($pathFiles , $file);
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


// Actividad cualidades ninos resilientes

    public function cnr_intro(){
        return view('activities.2-3anos.cnr.intro_cnr');
    }

    public function cnr1(){
        return view('activities.2-3anos.cnr.cnr1');
    }

    public function cnr2(){
        return view('activities.2-3anos.cnr.cnr2');
    }

    public function cnr3(){
        return view('activities.2-3anos.cnr.cnr3');
    }

    public function cnr4(){
        return view('activities.2-3anos.cnr.cnr4');
    }

    public function cnr_logrosObtenidos(){
        return view('activities.2-3anos.cnr.cnr_logrosObtenidos');
    }

    public function CulminadoActividadCnr(){
        return view('activities.2-3anos.cnr.CulminadoActividadCnr');
    }


    // Actividad Las emociones de mis padres

    public function lenp_intro(){
        return view('activities.2-3anos.lenp.intro_lenp');
    }

    public function lenp1(){
        return view('activities.2-3anos.lenp.lenp1');
    }

    public function lenp2(){
        return view('activities.2-3anos.lenp.lenp2');
    }

    public function lenp3(){
        return view('activities.2-3anos.lenp.lenp3');
    }

    public function lenp4(){
        return view('activities.2-3anos.lenp.lenp4');
    }

    public function lenp5(){
        return view('activities.2-3anos.lenp.lenp5');
    }

    public function lenp_logrosObtenidos(){
        return view('activities.2-3anos.lenp.lenp_logrosObtenidos');
    }

    public function CulminadoActividadLenp(){
        return view('activities.2-3anos.lenp.CulminadoActividadLenp');
    }


    


}
