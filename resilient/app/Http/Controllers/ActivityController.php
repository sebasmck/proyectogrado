<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\ActividadAsignada;
use App\AcudienteInfante;
use App\Cuidador;
use App\GrupoPoblacional;
use App\RespuestaAbiertaActividad;
use App\LogrosActividad;
use App\RespuestaMultipleActividad;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\Cache as Cache;
use phpDocumentor\Reflection\Types\Self_;
use Intervention\Image\Facades\Image;


class ActivityController extends Controller
{
    const URL_APRENDAMOS_DE_RESILIENCIA_ = "activities.2-11-meses.aprendamos_resiliencia.aprendamos_resiliencia";
    const URL_ACTIVIDAD_1_PRENDIENDO_MOTORES = "activities.2-11-meses.aprendamos_resiliencia.prendiendo_motores";

    const URL_ACTIVITIES_2_11_MESES = "activities.2-11-meses.";
    const URL_ACTIVITIES_3_11_MESES = "activities.3-11-meses.";
    const URL_ACTIVITIES_4_11_MESES = "activities.4-11-meses.";
    const URL_ACTIVITIES_7_11_MESES = "activities.7-11-meses.";
    const URL_ACTIVITIES_1_2_ANOS = "activities.1-2-anos.";

    const URL_ACTIVITIE_ACDR = self::URL_ACTIVITIES_2_11_MESES."aterrizando_el_concepto_resiliencia.";
    const URL_ACTIVITIE_GDLE = self::URL_ACTIVITIES_2_11_MESES."gafas_de_las_emociones.";
    const URL_ACTIVITIE_PE = self::URL_ACTIVITIES_3_11_MESES."papito_escultor.";
    const URL_ACTIVITIE_DDE = self::URL_ACTIVITIES_3_11_MESES."dia_del_elogio.";
    const URL_ACTIVITIE_ICE = self::URL_ACTIVITIES_4_11_MESES."identificacion_control_emocional.";

    const URL_ACTIVITIE_UM = self::URL_ACTIVITIES_3_11_MESES."una_manita.";
    const URL_ACTIVITIE_CTMA = self::URL_ACTIVITIES_3_11_MESES."con_toda_mi_atencion.";
    const URL_ACTIVITIE_DQPA = self::URL_ACTIVITIES_4_11_MESES."de_quien_puedo_aprender.";

    const URL_ACTIVITIE_SJ = self::URL_ACTIVITIES_7_11_MESES."SiempreJuntos.";
    const URL_ACTIVITIE_ESEN = self::URL_ACTIVITIES_7_11_MESES."eso_si_eso_no.";
    const URL_ACTIVITIE_JALE = self::URL_ACTIVITIES_7_11_MESES."jugamos_a_las_emociones.";

    const URL_ACTIVITIE_MDF = self::URL_ACTIVITIES_1_2_ANOS."my_dibujo_favorito.";

    public function finalizarActividad(){

        // objeto de navegación guardado en el storage de la aplicación
        $infoNavegacion = Cache::store('database')->get(auth()->id());


        if(!isset($infoNavegacion['id_infante'])){
            return view('cuidador.menuCuidador');
        }

        $infante = $infoNavegacion['id_infante'];
        $actividad = $infoNavegacion['id_actividad'];

        $relacionAcudienteInfante = AcudienteInfante::where('Id_Infante',$infante)
            ->where('Id_Acudiente',auth()->user()->cuidador->Id_Acudiente)
            ->with(['actividadesAsignadas' => function($query) use ($actividad){
                $query->where('Id_Actividad',$actividad)->first();
            }])->first();

        $actividadAsignada = $relacionAcudienteInfante->actividadesAsignadas[0];
        $actividadAsignada->FechaFinalizada_Actividad_Terminada = new \DateTime("now");
        $actividadAsignada->save();

        unset($infoNavegacion['id_actividad']);
        Cache::store('database')->forever(auth()->id(),$infoNavegacion);

        $actividadesPendientes = ActividadAsignada::where('id_RelacionAcudienteInfante',$relacionAcudienteInfante->id)->whereNull('FechaFinalizada_Actividad_Terminada')->get();


        if(sizeof($actividadesPendientes) > 0) {
            return $this->goToActivities($infante);
        }else{
            if(auth()->user()->cuidador->finalizo_curso == 1){
                return $this->goToActivities($infante);
            }else{

                $usuario = User::find(auth()->id());
                $usuario->id_estado = 8;
                $usuario->save();

                return redirect()->route('/postest');
            }
        }

    }

    public function other(){
        // comprobación finalización de una actividad sin el infante seleccionado

    }


    // Activity: Cualidades Niños Resilientes

    public function goToActivities($id){

        $relacionAcudienteInfante = AcudienteInfante::where('Id_Acudiente', auth()->user()->cuidador->Id_Acudiente)
            ->where('Id_Infante',$id)
            ->first();
        $fechaInicioCurso = $relacionAcudienteInfante->Fecha_Inicial;
        $fechaFinalCurso = $relacionAcudienteInfante->Fecha_Final;
        $fechaActual = new \DateTime('now');
        $dateInicioCurso = new \DateTime();
        $dateInicioCurso->setTimestamp($fechaInicioCurso);
        $dateFinalCurso = new \DateTime();
        $dateFinalCurso->setTimestamp($fechaFinalCurso);
        $diferencia = $dateInicioCurso->diff($fechaActual);
        $semanaActual = intval($diferencia->days/7);
        $grupoPoblacional = GrupoPoblacional::where('EdadMinima_Grupo_Poblacional','=',$relacionAcudienteInfante->infante->Edad_Infante)
                                            ->where('EdadMaxima_Grupo_Poblacional','>',$relacionAcudienteInfante->infante->Edad_Infante)->first();

        $actividadesAsignadas = DB::select('call get_activity(?,?)', [$relacionAcudienteInfante->id,$grupoPoblacional->Id_Grupo_Poblacional])  ;
        //$actividadesAsignadas = ActividadAsignada::where('id_RelacionAcudienteInfante', $relacionAcudienteInfante->id)->with(['actividad'=> function($query)
       // {$query->orderBy('semana')->get();}])->get();
        $actividadPendiente=null;
        //$actividades = Array();
        if($dateFinalCurso >= $fechaActual)
        {
            $parar = false;
            $idActividadPendiente = null;
            for($i = 0; $i < sizeof($actividadesAsignadas) && $parar == false ; $i++){
                $actividadAsignadadActual = $actividadesAsignadas[$i];
                if(!$actividadAsignadadActual->FechaFinalizada_Actividad_Terminada){
                    $parar = true;
                    $idActividadPendiente = $actividadAsignadadActual->IdActividadAsignada;
                }
            }
            if($idActividadPendiente){
                $actividadPendiente = ActividadAsignada::find($idActividadPendiente);
            }

        }

        return view('activities.moduloActividades', ['activities' => $actividadesAsignadas, 'actividadPendiente' => $actividadPendiente?$actividadPendiente->actividad:$actividadPendiente, 'semanaActual' => $semanaActual]);


    }
    
    public function aprendamosResilienciaIntro()
    {
        return view("activities.2-11-meses.aprendamos_resiliencia.intro_aprendamos_resiliencia");
    }

    public function actividad(Request $request,$id){
        $actividad  = Actividad::where('Id_Actividad',$id)->get();
        return  $actividad;
    }

    public function getActivity($id){
        $infoNavegacion = Cache::store('database')->get(auth()->id());
        $infoNavegacion['id_actividad'] = $id;
        Cache::store('database')->forever(auth()->id(),$infoNavegacion);

        $actividad  = Actividad::where('Id_Actividad',$id)->first();
        return view($actividad->View_Actividad);
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

    public function libroLogros_apr(){
        return view("activities.2-11-meses.aprendamos_resiliencia.libro_logros");
    }

    // Actividad Aterrizando el concepto de resiliencia

    public function intro_acdr(){
        return view(self::URL_ACTIVITIE_ACDR."intro");
    }

    public function cuandoPrestoAtencion_acdr(){
        return view(self::URL_ACTIVITIE_ACDR."cuando_presto_atencion_entiendo_yo");
    }

    public function resilienciaEnLaVidaReal_acdr(){
        return view(self::URL_ACTIVITIE_ACDR."resiliencia_en_la_vida_real");
    }

    public function monitoreoElComportamiento_acdr(){
        return view(self::URL_ACTIVITIE_ACDR."monitoreo_el_comportamiento");
    }

    public function logros_acdr(){
        return view(self::URL_ACTIVITIE_ACDR."logrosObtenidos");
    }

    public function culminado_acdr()
    {
        return view(self::URL_ACTIVITIE_ACDR."Culminadoconceptoresiliencia");
    }

    // Actividad gafas de las emociones

    public function intro_gdle(){
        return view(self::URL_ACTIVITIE_GDLE."intro");
    }

    public function videosDescriptivos_gdle(){
        return view(self::URL_ACTIVITIE_GDLE."videos_descriptivos");
    }

    public function relacionVideosHijo_gdle(){
        return view(self::URL_ACTIVITIE_GDLE."relacion_videos_hijo");
    }

    public function logros_gdle(){
        return view(self::URL_ACTIVITIE_GDLE."logrosObtenidos");
    }

    public function culminado_gdle(){
        return view(self::URL_ACTIVITIE_GDLE."Culminadogafas");
    }

    // Actividad dia del elogio

    public function intro_dde(){
        return view(self::URL_ACTIVITIE_DDE."intro");
    }

    public function cuandoPrestoAtencion_dde(){
        return view(self::URL_ACTIVITIE_DDE."cuando_presto_atencion_entiendo_yo");
    }

    public function paraQueDeboElogiar_dde(){
        return view( self::URL_ACTIVITIE_DDE."para_que_debo_elogiar");
    }

    public function aprendeEstrategias_dde(){
        return view(self::URL_ACTIVITIE_DDE."aprende_estrategias");
    }

   // public function recuerdasEstrategias_dde(){
   //     return view(self::URL_ACTIVITIE_DDE."recuerda_estrategias");
  //  }

 //   public function practicaRefuerzo_dde(){
 //       return view(self::URL_ACTIVITIE_DDE."practicaRefuerzo");
 //   }

    public function ojosAbiertosYTactoDispuesto_dde(){
        return view(self::URL_ACTIVITIE_DDE."ojos_abiertos");
    }

    public function tarea_dde(){
        return view(self::URL_ACTIVITIE_DDE."tarea");
    }

    public function logros_dde(){
        return view(self::URL_ACTIVITIE_DDE."logrosObtenidos");
    }
    
    public function culminado_dde(){
        return view(self::URL_ACTIVITIE_DDE."Culminadoelogio");
    }



    // Actividad papito escultor

    public function intro_pe(){
        return view( self::URL_ACTIVITIE_PE."intro" );
    }

    public function cuandoPrestoAtencion_pe(){
        return view(self::URL_ACTIVITIE_PE."cuando_presto_atencion");
    }

    public function encuentraAlgo_pe(){
        return view(self::URL_ACTIVITIE_PE."encuentra_algo");
    }

    public function yoYMiManera_pe(){
        return view(self::URL_ACTIVITIE_PE."yo_y_mi_manera_de_ser");
    }

    public function tareas_pe(){
        return view(self::URL_ACTIVITIE_PE."tareas");
    }

    public function logros_pe(){
        return view(self::URL_ACTIVITIE_PE."logrosObtenidos");
    }

    public function culminado_pe()
    {
        return view(self::URL_ACTIVITIE_PE."Culminadopapito");
    }


    // Actividad identificación y control emocional

    public function intro_ice(){
        return view( self::URL_ACTIVITIE_ICE."intro" );
    }

    public function desarrollo_ice(){
        return view(self::URL_ACTIVITIE_ICE."desarrollo");
    }

    public function regulacion_emociones_ice(){
        return view(self::URL_ACTIVITIE_ICE."regulacionEmocional");
    }

    public function tareas_semana_ice(){
        return view(self::URL_ACTIVITIE_ICE."tareasSemana");
    }

    public function logros_ice(){
        return view(self::URL_ACTIVITIE_ICE."logrosObtenidos");
    }

    public function libroLogros_ice(){
        return view(self::URL_ACTIVITIE_ICE."libro_logros");
    }

    // guardar logros

    public function guardarLogros( Request $request)
    {
        $LogrosActividad = new LogrosActividad();
        $NumActividad = $request->input("id"); //Numero en base de datos tabla Actividad
        $RelacionInfante = null ; // Por el momento enviar vacio
        $LogrosActividad ->Aprendido = $request->input('si/No1');
        $LogrosActividad ->NoAprendido = $request->input('si/No2');
        $LogrosActividad ->AplicadoCrianza = $request->input('si/No3');
        $LogrosActividad ->NoAplicadoCrianza = $request->input('si/No4');
        $LogrosActividad ->id_AcudienteInfante = $RelacionInfante;
        $LogrosActividad ->id_Actividad = $NumActividad;
        $LogrosActividad ->save();
        return "ok";
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
        $respuestaPregunta->id_AcudienteInfante = null; 
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
        $respuestaMultiple->id_AcudienteInfante = $RelacionInfante; 
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
    public function paraActividadHastaElFinal4(){
        return view('activities.2anos_2anos11meses.hasta_el_final.logros_obtenidos');
    }
    public function paraActividadHastaElFinalCulminacion(Request $request)
    {
        $LogrosActividad = new LogrosActividad (); 
        $NumActividad = 3; //Numero en base de datos tabla Actividad  
        $RelacionInfante = null ; // Por el momento enviar vacio  
        $LogrosActividad ->Aprendido = $request->input('si/No1');
        $LogrosActividad ->NoAprendido = $request->input('si/No2');
        $LogrosActividad ->AplicadoCrianza = $request->input('si/No3');
        $LogrosActividad ->NoAplicadoCrianza = $request->input('si/No4');
        $LogrosActividad ->id_AcudienteInfante = $RelacionInfante;
        $LogrosActividad ->id_Actividad = $NumActividad; 
        $LogrosActividad ->save();
        return view('activities.2anos_2anos11meses.hasta_el_final.hasta_final_culminacion');
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
     public function ninosResilientesLogros(Request $request)
     {
        $id_usuario = auth()->id();
        $acudiente = Cuidador::where('id_usuario', $id_usuario)->value('Id_Acudiente');
        $pathFiles = 'Files/ActivityNinosResilientes/'.$acudiente;
        //var_dump($acudiente);
        $file = $request->file('archivo');
        Storage::disk('ftp')->put($pathFiles , $file);
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
        //var_dump($acudiente);

        for($i=1;$i<10;$i++){
        
            $file = $request->file('fileToUpload'.$i);
            Storage::disk('ftp')->put($pathFiles , $file);
        }

        return view('activities.2-11-meses.Mas_Te_Guste.logros_obtenidos');
    }

    public function ftpUpFilesActivityNinosResilientes(Request $request)
    {
        $id_usuario = auth()->id();
        $acudiente = Cuidador::where('id_usuario', $id_usuario)->value('Id_Acudiente');
        $pathFiles = 'Files/ActivityNinosResilientes/'.$acudiente;
        //var_dump($acudiente);

        $file = $request->file('fileToUpload');
        Storage::disk('ftp')->put($pathFiles , $file);
        return $request;
    }

    public function loQueMasTeGusteCulminacion(Request $request) {
        $LogrosActividad = new LogrosActividad (); 
        $NumActividad = 7; //Numero en base de datos tabla Actividad  
        $RelacionInfante = null ; // Por el momento enviar vacio  
        $LogrosActividad ->Aprendido = $request->input('si/No1');
        $LogrosActividad ->NoAprendido = $request->input('si/No2');
        $LogrosActividad ->AplicadoCrianza = $request->input('si/No3');
        $LogrosActividad ->NoAplicadoCrianza = $request->input('si/No4');
        $LogrosActividad ->id_AcudienteInfante = $RelacionInfante;
        $LogrosActividad ->id_Actividad = $NumActividad; 
        $LogrosActividad ->save();
         return view('activities.2-11-meses.Mas_Te_Guste.actividad_mas_te_guste_culminacion');
     }
     
    //Actividad digno de carino
    public function paraDignoDecarino(){
        return view('activities.2-11-meses.Digno_De_Carino.intro_digno_de_carino');
    }

    public function paraDignoDecarino2(){
        return view('activities.2-11-meses.Digno_De_Carino.digno_de_carino');
    }

    public function paraDignoDecarino3(){
        return view('activities.2-11-meses.Digno_De_Carino.digno_de_carino_3');
    }

    public function paraDignoDecarino4(Request $request){
        $id_usuario = auth()->id();
        $acudiente = Cuidador::where('id_usuario', $id_usuario)->value('Id_Acudiente');

        $pathFiles = 'Images1/ActivityDignoCarino/'.$acudiente;
        //var_dump($acudiente);

            $file = $request->file('fileToUpload9');
            Storage::disk('ftp')->put($pathFiles , $file);
        
        return view('activities.2-11-meses.Digno_De_Carino.logrosObtenidos');
    }

    public function dignoCarinoCulminacion(Request $request) {
        $LogrosActividad = new LogrosActividad (); 
        $NumActividad = 11; //Numero en base de datos tabla Actividad  
        $RelacionInfante = null ; // Por el momento enviar vacio  
        $LogrosActividad ->Aprendido = $request->input('si/No1');
        $LogrosActividad ->NoAprendido = $request->input('si/No2');
        $LogrosActividad ->AplicadoCrianza = $request->input('si/No3');
        $LogrosActividad ->NoAplicadoCrianza = $request->input('si/No4');
        $LogrosActividad ->id_AcudienteInfante = $RelacionInfante;
        $LogrosActividad ->id_Actividad = $NumActividad; 
        $LogrosActividad ->save();
         return view('activities.2-11-meses.Digno_De_Carino.digno_de_carino_culminacion');
     }
   
    //Actividad el Mimo
    public function paraElmimo(){
        return view('activities.2-11-meses.El_mimo.intro_el_mimo');
    }
 
    public function paraElmimo2(){
        return view('activities.2-11-meses.El_mimo.el_mimo');
    }

    public function paraElmimo3(){
        return view('activities.2-11-meses.El_mimo.el_mimo_2');
    }

    public function paraElmimo4(){
        return view('activities.2-11-meses.El_mimo.logrosObtenidos');
    }

    public function elMimoCulminacion(Request $request) {
        $LogrosActividad = new LogrosActividad (); 
        $NumActividad = 12; //Numero en base de datos tabla Actividad  
        $RelacionInfante = null ; // Por el momento enviar vacio  
        $LogrosActividad ->Aprendido = $request->input('si/No1');
        $LogrosActividad ->NoAprendido = $request->input('si/No2');
        $LogrosActividad ->AplicadoCrianza = $request->input('si/No3');
        $LogrosActividad ->NoAplicadoCrianza = $request->input('si/No4');
        $LogrosActividad ->id_AcudienteInfante = $RelacionInfante;
        $LogrosActividad ->id_Actividad = $NumActividad; 
        $LogrosActividad ->save();
         return view('activities.2-11-meses.El_mimo.el_mimo_culminacion');
     }


    //Actividad fuerte y grande
    public function paraFuerteYGrande(){
        return view('activities.2-11-meses.Grande_fuerte.intro_grande_fuerte');
    }
    public function paraFuerteYGrande2(){
        return view('activities.2-11-meses.Grande_fuerte.grande_fuerte');
    }
    public function paraFuerteYGrande3(){
        return view('activities.2-11-meses.Grande_fuerte.grande_fuerte_2');
    }
    public function paraFuerteYGrande4(){
        return view('activities.2-11-meses.Grande_fuerte.grande_fuerte_3');
    }
    public function paraFuerteYGrande5(){
        return view('activities.2-11-meses.Grande_fuerte.logrosObtenidos');
    }

    public function grandeYFuerteCulminacion(Request $request) {
        $LogrosActividad = new LogrosActividad (); 
        $NumActividad = 21; //Numero en base de datos tabla Actividad  
        $RelacionInfante = null ; // Por el momento enviar vacio  
        $LogrosActividad ->Aprendido = $request->input('si/No1');
        $LogrosActividad ->NoAprendido = $request->input('si/No2');
        $LogrosActividad ->AplicadoCrianza = $request->input('si/No3');
        $LogrosActividad ->NoAplicadoCrianza = $request->input('si/No4');
        $LogrosActividad ->id_AcudienteInfante = $RelacionInfante;
        $LogrosActividad ->id_Actividad = $NumActividad; 
        $LogrosActividad ->save();
         return view('activities.2-11-meses.Grande_fuerte.grande_fuerte_culminacion');
     }

    //Actividad respirar pensar actuar
    public function paraPensarActuar(){
        return view('activities.2-11-meses.Respirar_pensar_actuar.intro_respirar_actuar');
    }

    public function paraPensarActuar1(){
        return view('activities.2-11-meses.Respirar_pensar_actuar.respirar_actuar');
    }

    public function paraPensarActuar2(){
        return view('activities.2-11-meses.Respirar_pensar_actuar.respirar_actuar_2');
    }

    public function paraPensarActuar3(){
        return view('activities.2-11-meses.Respirar_pensar_actuar.logrosObtenidos');
    }

    public function paraPensarActuarCulminacion(Request $request) {
        $LogrosActividad = new LogrosActividad (); 
        $NumActividad = 16; //Numero en base de datos tabla Actividad  
        $RelacionInfante = null ; // Por el momento enviar vacio  
        $LogrosActividad ->Aprendido = $request->input('si/No1');
        $LogrosActividad ->NoAprendido = $request->input('si/No2');
        $LogrosActividad ->AplicadoCrianza = $request->input('si/No3');
        $LogrosActividad ->NoAplicadoCrianza = $request->input('si/No4');
        $LogrosActividad ->id_AcudienteInfante = $RelacionInfante;
        $LogrosActividad ->id_Actividad = $NumActividad; 
        $LogrosActividad ->save();
         return view('activities.2-11-meses.Respirar_pensar_actuar.respirar_actuar_culminacion');
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

    // Actividad SSI

    public function ssi_intro(){
        return view('activities.2-3anos.ssi.intro_ssi');
    }

    public function ssi1(){
        return view('activities.2-3anos.ssi.ssi1');
    }

    public function ssi2(){
        return view('activities.2-3anos.ssi.ssi2');
    }

    public function ssi3(){
        return view('activities.2-3anos.ssi.ssi3');
    }

    public function ssi4(){
        return view('activities.2-3anos.ssi.ssi4');
    }

    public function ssi_logrosObtenidos(){
        return view('activities.2-3anos.ssi.ssi_logrosObtenidos');
    }

    public function CulminadoActividadSsi(){
        return view('activities.2-3anos.ssi.CulminadoActividadSsi');
    }


    // Actividad cdg

    public function cdg_intro(){
        return view('activities.2-3anos.cdg.intro_cdg');
    }

    public function cdg1(){
        return view('activities.2-3anos.cdg.cdg1');
    }

    public function cdg2(){
        return view('activities.2-3anos.cdg.cdg2');
    }

    public function cdg3(){
        return view('activities.2-3anos.cdg.cdg3');
    }

    public function cdg4(){
        return view('activities.2-3anos.cdg.cdg4');
    }

    public function cdg_logrosObtenidos(){
        return view('activities.2-3anos.cdg.cdg_logrosObtenidos');
    }

    public function CulminadoActividadCdg(){
        return view('activities.2-3anos.cdg.CulminadoActividadCdg');
    }

    // Actividad lrj
    

    public function lrj_intro(){
        return view('activities.2-3anos.lrj.intro_lrj');
    }

    public function lrj1(){
        return view('activities.2-3anos.lrj.lrj1');
    }

    public function lrj2(){
        return view('activities.2-3anos.lrj.lrj2');
    }

    public function lrj3(){
        return view('activities.2-3anos.lrj.lrj3');
    }

    public function lrj4(){
        return view('activities.2-3anos.lrj.lrj4');
    }

    public function lrj_logrosObtenidos(){
        return view('activities.2-3anos.lrj.lrj_logrosObtenidos');
    }

    public function CulminadoActividadLrj(){
        return view('activities.2-3anos.lrj.CulminadoActividadLrj');
    }

    // Actividad Ag

    public function ag_intro(){
        return view('activities.2-3anos.ag.intro_ag');
    }

    public function ag1(){
        return view('activities.2-3anos.ag.ag1');
    }

    public function ag2(){
        return view('activities.2-3anos.ag.ag2');
    }

    public function ag3(){
        return view('activities.2-3anos.ag.ag3');
    }

    public function ag4(){
        return view('activities.2-3anos.lrj.ag4');
    }

    public function ag_logrosObtenidos(){
        return view('activities.2-3anos.ag.ag_logrosObtenidos');
    }

    public function CulminadoActividadAg(){
        return view('activities.2-3anos.ag.CulminadoActividadAg');
    }
    
    
    // Actividad Caritas Felices 

    public function introCaritasFelices()
    {
        return view('activities.3-11-meses.CaritasFelices.intro_CaritasFelices');
    }

    public function CaritasFelices1()
    {
        return view('activities.3-11-meses.CaritasFelices.CaritasFelices1');
    }
    public function CaritasFelices2()
    {
        return view('activities.3-11-meses.CaritasFelices.CaritasFelices2');
    }
    public function CaritasFelices3()
    {
        return view('activities.3-11-meses.CaritasFelices.CaritasFelices3');
    }

    public function CaritasFelices4()
    {   
        return view('activities.3-11-meses.CaritasFelices.CaritasFelices4');
    }

    public function CaritasFelices5()
    {
        return view('activities.3-11-meses.CaritasFelices.CaritasFelices5');
    }

    public function CaritasFelices6()
    {
        return view('activities.3-11-meses.CaritasFelices.CaritasFelices6');
    }
    public function CaritasFelices7()
    {
        return view('activities.3-11-meses.CaritasFelices.logrosObtenidos');
    }

    public function culminadoCaritasFelices()
    {
        return view('activities.3-11-meses.CaritasFelices.CulminadoCaritasFelices');
    }

    // Actividad UM

    public function intro_um(){
        return view(self::URL_ACTIVITIE_UM."intro");
    }

    public function cuandoPrestoAtencion_um(){
        return view(self::URL_ACTIVITIE_UM."cuando_presto_atencion");

    }

    public function losOjosDePapa_um(){
        return view(self::URL_ACTIVITIE_UM."ojos_de_papa");

    }

    public function descubreLasPalabras_um(){
        return view(self::URL_ACTIVITIE_UM."descubre_palabras");

    }

    public function piensaEnRedes_um(){
        return view(self::URL_ACTIVITIE_UM."piensa_en_redes");

    }

    public function yoSoyElMediador_um(){
        return view(self::URL_ACTIVITIE_UM."yo_soy_mediador");
    }

    public function tarea_um(){
        return view(self::URL_ACTIVITIE_UM."tareas");

    }

    public function logrosObtenidos_um(){
        return view(self::URL_ACTIVITIE_UM."logrosObtenidos");
    }

    public function culminar_um(){
        return view(self::URL_ACTIVITIE_UM."culminando_una_manita");
    }

    // Actividad QUE QUIERES SER CUANDO SEAS GRANDE
      
    public function introqqscsg()
    {
        return view('activities.4-11-meses.que_qs_cs_grande.intro_SerGrande');
    }

    public function qqscsg1()
    {
        return view('activities.4-11-meses.que_qs_cs_grande.SerGrande1');
    }
    public function qqscsg2()
    {
        return view('activities.4-11-meses.que_qs_cs_grande.SerGrande2');
    }
    public function qqscsg3()
    {
        return view('activities.4-11-meses.que_qs_cs_grande.SerGrande3');
    }
    public function qqscsgLogros()
    {
        return view('activities.4-11-meses.que_qs_cs_grande.logrosObtenidos');
    }
    public function culminadoqqscsg()
    {
        return view('activities.4-11-meses.que_qs_cs_grande.CulminadoSerGrande');
    }

    // actividad de 0 a 6 meses UNA VEZ MÁS EN MIS BRAZOS 
    public function introUnaVezMasBrazos()
    {
        return view('activities.0-6-meses.UnaVezMasBrazos.intro_UnaVezMasBrazos');
    }
    public function UnaVezMasBrazos1()
    {
        return view('activities.0-6-meses.UnaVezMasBrazos.UnaVezMasBrazos1');
    }
    public function UnaVezMasBrazos2()
    {
        return view('activities.0-6-meses.UnaVezMasBrazos.UnaVezMasBrazos2');
    }
    public function culminadoUnaVezMasBrazos()
    {
        return view('activities.0-6-meses.UnaVezMasBrazos.CulminadoUnaVezMasBrazos');
    }
// actividad de 0 a 6 meses A LA HORA DE AMAMANTAR
public function introALaHoraDeAmamantar()
    {
        return view('activities.0-6-meses.AlaHoraDeAmamantar.intro_HoraAmamantar');
    }
    public function ALaHoraDeAmamantar1()
    {
        return view('activities.0-6-meses.AlaHoraDeAmamantar.HoraDeAmamantar1');
    }
    public function ALaHoraDeAmamantar2()
    {
        return view('activities.0-6-meses.AlaHoraDeAmamantar.HoraDeAmamantar2');
    }
    public function ALaHoraDeAmamantar3()
    {
        return view('activities.0-6-meses.AlaHoraDeAmamantar.HoraDeAmamantar3');
    }
    public function ALaHoraDeAmamantar4()
    {
        return view('activities.0-6-meses.AlaHoraDeAmamantar.HoraDeAmamantar4');
    }
    public function ALaHoraDeAmamantar5()
    {
        return view('activities.0-6-meses.AlaHoraDeAmamantar.HoraDeAmamantar5');
    }
    public function culminadoALaHoraDeAmamantar()
    {
        return view('activities.0-6-meses.AlaHoraDeAmamantar.CulminadoHoraDeAmamantar');
    }    

    // actividad de 0 a 6 meses Descubriendo las emociones 
    public function introDescubriendoEmociones()
    {
        return view('activities.0-6-meses.DescubriendoEmociones.intro_DescubriendoEmocion');
    }
    public function descubriendoEmociones1()
    {
        return view('activities.0-6-meses.DescubriendoEmociones.DescubriendoEmocion1');
    }
    public function descubriendoEmociones2()
    {
        return view('activities.0-6-meses.DescubriendoEmociones.DescubriendoEmocion2');
    }
    public function descubriendoEmociones3()
    {
        return view('activities.0-6-meses.DescubriendoEmociones.DescubriendoEmocion3');
    }
    public function descubriendoEmociones4()
    {
        return view('activities.0-6-meses.DescubriendoEmociones.DescubriendoEmocion4');
    }
    public function descubriendoEmociones5()
    {
        return view('activities.0-6-meses.DescubriendoEmociones.DescubriendoEmocion5');
    }
    public function descubriendoEmociones6()
    {
        return view('activities.0-6-meses.DescubriendoEmociones.DescubriendoEmocion6');
    }
    
    public function descubriendoEmociones7()
    {
        return view('activities.0-6-meses.DescubriendoEmociones.DescubriendoEmocion7');
    }

    public function descubriendoEmociones8()
    {
        return view('activities.0-6-meses.DescubriendoEmociones.DescubriendoEmocion8');
    }

    public function descubriendoEmociones9()
    {
        return view('activities.0-6-meses.DescubriendoEmociones.DescubriendoEmocion9');
    }

    public function descubriendoEmociones10()
    {
        return view('activities.0-6-meses.DescubriendoEmociones.DescubriendoEmocion10');
    }
    public function descubriendoEmociones11()
    {
        return view('activities.0-6-meses.DescubriendoEmociones.DescubriendoEmocion11');
    }
    public function culminadoDescubriendoEmociones()
    {
        return view('activities.0-6-meses.DescubriendoEmociones.CulminadoDescubriendoEmocion');
    }    
    
    // Actividad de 0 a 6 meses  juguemos a conocer nuestras emociones
    public function introJuguemosEmociones()
    {
        return view('activities.0-6-meses.JugamosConocerEmociones.intro_JugamosEmociones');
    }
    public function JuguemosEmociones()
    {
        return view('activities.0-6-meses.JugamosConocerEmociones.JugamosEmociones');
    }
    public function JuguemosEmociones1(Request $request)
    {
        $id_usuario = auth()->id();
        $acudiente = Cuidador::where('id_usuario', $id_usuario)->value('Id_Acudiente');
        $pathFiles = 'Files/ActivityJuguemosConNuestrasEmociones/'.$acudiente;
        //var_dump($acudiente);
        $file = $request->file('archivo');
        Storage::disk('ftp')->put($pathFiles , $file);
        return view('activities.0-6-meses.JugamosConocerEmociones.JugamosEmociones1');
    }
    public function JuguemosEmociones2()
    {
        return view('activities.0-6-meses.JugamosConocerEmociones.JugamosEmociones2');
    }
    public function JuguemosEmociones3(Request $request)
    {
        $id_usuario = auth()->id();
        $acudiente = Cuidador::where('id_usuario', $id_usuario)->value('Id_Acudiente');
        $pathFiles = 'actividades/ActivityJuguemosConNuestrasEmocionesActividad3/'.$acudiente;

        for($i=1;$i<4;$i++)
        {
            $file = $request->file('fileToUpload'.$i);
            Storage::disk('ftp')->put($pathFiles , $file);
        }
        return view('activities.0-6-meses.JugamosConocerEmociones.JugamosEmociones3');
    }

    public function culminadoJuguemosEmociones()
    {
        return view('activities.0-6-meses.JugamosConocerEmociones.CulminadoJugamosEmociones');
    }    

// Actividad de 0 a 6 meses  momento feliz
public function introMomentoFeliz()
{
    return view('activities.0-6-meses.MomentoFeliz.intro_MomentoFeliz');
} 
public function MomentoFeliz1()
{
    return view('activities.0-6-meses.MomentoFeliz.MomentoFeliz1');
} 
public function culminadoMomentoFeliz()
{
    return view('activities.0-6-meses.MomentoFeliz.CulminadoMomentoFeliz');
} 

// Actividad de 0 a 6 meses  contigo siempre
public function introContigoSiempre()
{
    return view('activities.0-6-meses.ContigoSiempre.intro_ContigoSiempre');
} 
public function ContigoSiempre1()
{
    return view('activities.0-6-meses.ContigoSiempre.ContigoSiempre1');
} 
public function ContigoSiempre2()
{
    return view('activities.0-6-meses.ContigoSiempre.ContigoSiempre2');
} 
public function ContigoSiempre3()
{
    return view('activities.0-6-meses.ContigoSiempre.ContigoSiempre3');
} 
public function culminadoContigoSiempre()
{
    return view('activities.0-6-meses.ContigoSiempre.CulminadoContigoSiempre');
} 

// Actividad de 1 a 2 años Siempre Contigo 
public function introSiempreContigo()
{
    return view('activities.1-2anos.SiempreContigo.intro_SiempreContigo');
} 
public function siempreContigo1()
{
    return view('activities.1-2anos.SiempreContigo.SiempreContigo1');
} 
public function siempreContigo2()
{
    return view('activities.1-2anos.SiempreContigo.SiempreContigo2');
} 
public function siempreContigo3()
{
    return view('activities.1-2anos.SiempreContigo.SiempreContigo3');
} 
public function culminadoSiempreContigo()
{
    return view('activities.1-2anos.SiempreContigo.CulminadoSiempreContigo');
} 

    //  Actividad con toda mi atención

    public function intro_ctma(){
        return view(self::URL_ACTIVITIE_CTMA."intro");
    }

    public function cuandoPrestoAtencion_ctma(){
        return view(self::URL_ACTIVITIE_CTMA."cuando_presto_atencion");
    }

    public function asiSeVive_ctma(){
        return view(self::URL_ACTIVITIE_CTMA."asi_se_vive");
    }

    public function escalonesColor_ctma(){
        return view(self::URL_ACTIVITIE_CTMA."escalones_de_color");
    }

    public function yoPapa_ctma(){
        return view(self::URL_ACTIVITIE_CTMA."yopapa");
    }

    public function soyTuGuia_ctma(){
        return view(self::URL_ACTIVITIE_CTMA."soy_tu_guia");
    }

    public function logrosObtenidos_ctma(){
        return view(self::URL_ACTIVITIE_CTMA."logrosObtenidos");
    }

    public function culminar_ctma(){
        return view(self::URL_ACTIVITIE_CTMA."culminando_ctma");
    }

    // Actividad  de quien puedo aprender

    public function intro_dqpa(){
        return view(self::URL_ACTIVITIE_DQPA."intro");
    }

    public function laMetafora_dqpa(){
        return view(self::URL_ACTIVITIE_DQPA."la_metafora");
    }

    public function actividadPalabras_dqpa(){
        return view(self::URL_ACTIVITIE_DQPA."actividad_palabras");
    }

    public function tareas_dqpa(){
        return view(self::URL_ACTIVITIE_DQPA."tareas");
    }

    public function logrosObtenidos_dqpa(){
        return view(self::URL_ACTIVITIE_DQPA."logrosObtenidos");
    }

    public function culminar_dqpa(){
        return view(self::URL_ACTIVITIE_DQPA."culminando_de_quien_puedo_aprender");
    }

    // Actividad de siempre juntos

    public function  intro_sj(){
        return view(self::URL_ACTIVITIE_SJ."intro_SiempreJuntos");
    }

    public function musica_sj(){
        return view(self::URL_ACTIVITIE_SJ."SiempreJuntos1");
    }

    public function cuentos_sj(){
        return view(self::URL_ACTIVITIE_SJ."SiempreJuntos2");
    }

    public function recomendacion_sj(){
        return view(self::URL_ACTIVITIE_SJ."SiempreJuntos3");
    }

    public function logros_sj(){
        return view(self::URL_ACTIVITIE_SJ."CulminadoSiempreJuntos");
    }

    // Actividad eso si eso no

    public function intro_esen(){
        return view(self::URL_ACTIVITIE_ESEN."intro");
    }

    public function imagenes_esen(){
        return view(self::URL_ACTIVITIE_ESEN."dialogs");
    }

    public function experiencia_esen(){
        return view(self::URL_ACTIVITIE_ESEN."experiencia");
    }

    public function logros_esen(){
        return view(self::URL_ACTIVITIE_ESEN."logros_obtenidos");
    }

    public function culminar_esen(){
        return view(self::URL_ACTIVITIE_ESEN."culminacion");
    }


    // Actividad jugamos a las emociones

    public function intro_jale(){
        return view(self::URL_ACTIVITIE_JALE."intro");
    }

    public function actividad1_jale(){
        return view(self::URL_ACTIVITIE_JALE."actividad");
    }

    public function actividad2_jale(){
        return view(self::URL_ACTIVITIE_JALE."actividad2");
    }

    public function actividad3_jale(){
        return view(self::URL_ACTIVITIE_JALE."actividad3");
    }

    public function actividad4_jale(){
        return view(self::URL_ACTIVITIE_JALE."actividad4");
    }

    public function actividad5_jale(){
        return view(self::URL_ACTIVITIE_JALE."actividad5");
    }

    public function logros_jale(){
        return view(self::URL_ACTIVITIE_JALE."logrosObtenidos");
    }

    public function archivos_jale_1(){
        $pathFiles = 'Files/ActividadJugamosALasEmociones/caritas.odt';

        $file = Storage::disk('ftp')->download($pathFiles);
        return $file;
    }

    public function archivos_jale_2(){
        $pathFiles = 'Files/ActividadJugamosALasEmociones/formato.odt';

        $file = Storage::disk('ftp')->download($pathFiles);
        return $file;
    }

    public function archivos_jale_3(){
        $pathFiles = 'Files/ActividadJugamosALasEmociones/carasRecortes.odt';

        $file = Storage::disk('ftp')->download($pathFiles);
        return $file;
    }

    public function archivos_jale_4(Request $request){

        // objeto de navegación guardado en el storage de la aplicación
        $infoNavegacion = Cache::store('database')->get(auth()->id());


        if(!isset($infoNavegacion['id_infante'])){
            return view('cuidador.menuCuidador');
        }

        $infante = $infoNavegacion['id_infante'];

        $relacionAcudienteInfante = AcudienteInfante::where('Id_Infante',$infante)
            ->where('Id_Acudiente',auth()->user()->cuidador->Id_Acudiente)
            ->first();

        $file = $request->file("userImage");
        $pathFiles = 'Files/ActividadJugamosALasEmociones/actividad5/'.$relacionAcudienteInfante->id."/".$file->getBasename();

        return "ok";
    }


    
    //Actividad cositas por vivir
    public function introCositasPorVivir()
    {
        return view('activities.3-11-meses.cositas_por_vivir.cositas_por_vivir_intro');
    }

    public function cositasPorVivir2()
    {
        return view('activities.3-11-meses.cositas_por_vivir.cositas_por_vivir_1');
    }

    public function cositasPorVivir3()
    {
        return view('activities.3-11-meses.cositas_por_vivir.cositas_por_vivir_2');
    }

    public function cositasPorVivir4()
    {
        return view('activities.3-11-meses.cositas_por_vivir.cositas_por_vivir_3');
    }

    public function cositasPorVivir5()
    {
        return view('activities.3-11-meses.cositas_por_vivir.cositas_por_vivir_4');
    }

    public function cositasPorVivir6()
    {
        return view('activities.3-11-meses.cositas_por_vivir.cositas_por_vivir_5');
    }
    
    public function cositasPorVivir7()
    {
        return view('activities.3-11-meses.cositas_por_vivir.cositas_por_vivir_6');
    }

    public function cositasPorVivirLogros()
    {
        return view('activities.3-11-meses.cositas_por_vivir.logrosObtenidos');
    }

    public function cositasPorVivirCulminacion()
    {
        return view('activities.3-11-meses.cositas_por_vivir.cositas_por_vivir_culminacion');
    }

    //Actividad Aprendiendo con sofi
    public function introAprendiendoConSofi()
    {
        return view('activities.0-6-meses.AprendiendoPautasConSofi.intro_aprendiendo_pautas_sofi');
    }

    public function aprendiendoConSofi1()
    {
        return view('activities.0-6-meses.AprendiendoPautasConSofi.aprendiento_pautas_sofi');
    }

    public function aprendiendoConSofi2()
    {
        return view('activities.0-6-meses.AprendiendoPautasConSofi.aprendiendo_pautas_sofi_1');
    }

    public function aprendiendoConSofi3()
    {
        return view('activities.0-6-meses.AprendiendoPautasConSofi.aprendiendo_pautas_sofi_2');
    }
        public function aprendiendoConSofi4()
    {
        return view('activities.0-6-meses.AprendiendoPautasConSofi.aprendiendo_pautas_sofi_3');
    }

    //Actividad Piel A Piel
    public function pielAPielIntro()
    {
        return view('activities.0-6-meses.PielAPiel.piel_piel_intro');
    }
    public function pielAPiel1()
    {
        return view('activities.0-6-meses.PielAPiel.piel_piel_1');
    }
    public function pielAPiel2()
    {
        return view('activities.0-6-meses.PielAPiel.piel_piel_2');
    }
    public function pielAPiel3()
    {
        return view('activities.0-6-meses.PielAPiel.piel_piel_3');
    }

    public function pielAPiel4()
    {
        return view('activities.0-6-meses.PielAPiel.piel_piel_4');
    }

    //Actividad Dejando Huella
    public function dejandoHIntro()
    {
        return view('activities.7-11-meses.Dejando_Huella.dejando_huella_intro');
    }

    public function dejandoH()
    {
        return view('activities.7-11-meses.Dejando_Huella.dejando_huella');
    }

    //Actividad aprendiendo a decir adios
    public function adiosIntro()
    {
        return view('activities.7-11-meses.Aprendiendo_decir_adios.aprendiendo_decir_adios_intro');
    }

    public function adios1()
    {
        return view('activities.7-11-meses.Aprendiendo_decir_adios.aprendiendo_decir_adios_1');
    }

    //Actividad reconiciendo a mi persona
    public function reconociendoMiPersonaIntro()
    {
        return view('activities.7-11-meses.Reconocinedo_mi_persona.reconociendo_mi_persona_intro');
    }

    public function reconociendoMiPersona1()
    {
        return view('activities.7-11-meses.Reconocinedo_mi_persona.reconociendo_mi_persona_1');
    }

    public function reconociendoMiPersona2()
    {
        return view('activities.7-11-meses.Reconocinedo_mi_persona.reconociendo_mi_persona_2');
    }

    //Actividad fortalenciendo la comunicación con mi hijo
    public function fortaleciendoComunicacionHijoIntro()
    {
        return view('activities.1-2-anos.Fortaleciendo_comunicacion_hijo.fortaleciendo_comunicacion_hijo_intro');
    }

    public function fortaleciendoComunicacionHijo1()
    {
        return view('activities.1-2-anos.Fortaleciendo_comunicacion_hijo.fortaleciendo_comunicacion_hijo_1');
    }


    // Mi dibujo favorito

    public function intro_mdf(){
        return view(self::URL_ACTIVITIE_MDF."intro");
    }

    public function actividad_mdf(){
        return view(self::URL_ACTIVITIE_MDF."actividad");
    }

    public function logros_mdf(){
        return view(self::URL_ACTIVITIE_MDF."logrosObtenidos");
    }



     public function guardarRespuestaAbiertaActividad(Request $request)
     {

         $infoNavegacion = Cache::store('database')->get(auth()->id());
         $infante = $infoNavegacion['id_infante'];

        $relacionAcudienteInfante = AcudienteInfante::where('Id_Infante',$infante)
        ->where('Id_Acudiente',auth()->user()->cuidador->Id_Acudiente)
        ->first();

        $preguntaActividad = $request->input('idPregunta');

        $respuestaPregunta = new RespuestaAbiertaActividad();
        $respuestaPregunta->Id_Pregunta = $preguntaActividad ;
        $respuestaPregunta->Respuesta = $request->input('respuesta');
        $respuestaPregunta->id_AcudienteInfante = $relacionAcudienteInfante->id;
        $respuestaPregunta->save();

        return $respuestaPregunta;
     }

     public function guardarRespuestaCerradaActividad(Request $request )
     {

         $infoNavegacion = Cache::store('database')->get(auth()->id());
         $infante = $infoNavegacion['id_infante'];

        $relacionAcudienteInfante = AcudienteInfante::where('Id_Infante',$infante)
        ->where('Id_Acudiente',auth()->user()->cuidador->Id_Acudiente)
        ->first();

        $respuestaMultiple = new RespuestaMultipleActividad();
        $pregunta = $request->input('idPregunta'); 

        $respuestaMultiple ->Seleccionada = $request->input('seleccionada');
        $respuestaMultiple->Id_Pregunta = $pregunta;
        $respuestaMultiple->id_AcudienteInfante = $relacionAcudienteInfante->id;
        $respuestaMultiple->save();
     }



}
