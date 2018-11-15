<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('handleAuthentication', function (){
    return \App\Http\Controllers\Auth\RedireccionadorRolController::redirectTo();
})->middleware("auth");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'HomeController@displayUsers')->name('/users');

Route::get('/menuCuidador', 'HomeController@mostrarMenuCuidador')->name('/menuCuidador');

// Datos Cuidador

Route::Resource('cuidador', 'DatosCuidadorController');

Route::get('/datoscuidador', 'DatosCuidadorController@index')->name('/datoscuidador');

Route::get('/datosnino', 'DatosNinoController@index')->name('/datosnino');

Route::Resource('datosninos', 'DatosNinoController');

Route::get('/datosninostoresecond', 'DatosNinoController@storeSecond')->name('/datosninostoresecond');

Route::get('/datosnino2', 'DatosNinoController@datosnino2')->name('/datosnino2');

Route::get('/pretest0', 'PretestController@index')->name('/pretest0');

Route::get('/pretest1', 'PretestController@pretest1')->name('/pretest1');

Route::post('/pretest2', 'PretestController@pretest2')->name('/pretest2');

Route::get('/pretest3', 'PretestController@pretest3')->name('/pretest3');

Route::post('/pretest4', 'PretestController@pretest4')->name('/pretest4');

Route::post('/pretest5', 'PretestController@pretest5')->name('/pretest5');

// if yes return god nows what, otherwise return test
Route::get('/pretestprueba', 'PretestController@pretestPrueba')->name('/pretestprueba');
Route::get('/pretestprueba1', 'PretestController@pretestPrueba1')->name('/pretestprueba1');
// aca continua el pretest 
Route::post('/pretestprueba2', 'PretestController@pretestPrueba2')->name('/pretestprueba2');

Route::post('/pretestprueba3', 'PretestController@pretestPrueba3')->name('/pretestprueba3');
Route::post('/pretestprueba3res', 'PretestController@pretestPrueba3Res')->name('/pretestprueba3res');

Route::get('/pretestprueba4', 'PretestController@pretestPrueba4')->name('/pretestprueba4');

Route::post('/pretestprueba5', 'PretestController@pretestPrueba5')->name('/pretestprueba5');

Route::post('/pretestprueba6', 'PretestController@pretestPrueba6')->name('/pretestprueba6');

Route::post('/pretestprueba7', 'PretestController@pretestPrueba7')->name('/pretestprueba7');

Route::post('/pretestprueba8', 'PretestController@pretestPrueba8')->name('/pretestprueba8');

Route::post('/pretestprueba9', 'PretestController@pretestPrueba9')->name('/pretestprueba9');

Route::post('/pretestprueba10', 'PretestController@pretestPrueba10')->name('/pretestprueba10');

Route::post('/pretestprueba11', 'PretestController@pretestPrueba11')->name('/pretestprueba11');

Route::post('/pretestprueba12', 'PretestController@pretestPrueba12')->name('/pretestprueba12');

// en el pretest final hay que poner algun comentario 

Route::post('/pretestfinal', 'PretestController@pretestFinalizado')->name('/pretestfinal');

// pretest final redirección a escalas

Route::get('/pretestcompletado', 'PretestController@pretestCompletado')->name('/pretestcompletado');


//Rutas para el postest 
Route::get('/postest', 'PostTestController@index')->name('/postest');
Route::get('/posttest1', 'PostTestController@postTest1')->name('/posttest1');

Route::post('/posttest2', 'PostTestController@posttest2')->name('/posttest2');

Route::get('/posttest3', 'PostTestController@posttest3')->name('/posttest3');

Route::post('/posttest4', 'PostTestController@posttest4')->name('/posttest4');

Route::post('/posttest5', 'PostTestController@posttest5')->name('/posttest5');

Route::post('/posttestprueba1', 'PostTestController@posttestPrueba1')->name('/posttestprueba1');
Route::post('/posttestprueba2', 'PostTestController@posttestPrueba2')->name('/posttestprueba2');
Route::post('/posttestprueba3', 'PostTestController@posttestPrueba3')->name('/posttestprueba3');

Route::post('/posttestprueba3res', 'PostTestController@posttestPrueba3Res')->name('/posttestprueba3res');
Route::get('/posttestprueba4', 'PostTestController@posttestPrueba4')->name('/posttestprueba4');
Route::post('/posttestprueba5', 'PostTestController@posttestPrueba5')->name('/posttestprueba5');
Route::post('/posttestprueba6', 'PostTestController@posttestPrueba6')->name('/posttestprueba6');
Route::post('/posttestprueba7', 'PostTestController@posttestPrueba7')->name('/posttestprueba7');
Route::post('/posttestprueba8', 'PostTestController@posttestPrueba8')->name('/posttestprueba8');
Route::post('/posttestprueba9', 'PostTestController@posttestPrueba9')->name('/posttestprueba9');
Route::post('/posttestprueba10', 'PostTestController@posttestPrueba10')->name('/posttestprueba10');
Route::post('/posttestprueba11', 'PostTestController@posttestPrueba11')->name('/posttestprueba11');
Route::post('/posttestprueba12', 'PostTestController@posttestPrueba12')->name('/posttestprueba12');

//repuestas posttest 
Route::post('/respuestaposttest', 'PostTestController@respuestasPostest')->name('/respuestaposttest');

// preguntas de cierre 
Route::get('/preguntascierreposttest', 'PostTestController@preguntasCierre')->name('/preguntascierreposttest');

//Route::get('/preguntascierreposttest', 'PostTestController@preguntasCierrePrueba')->name('/preguntascierreposttest');

Route::get('/preguntascierreposttest1', 'PostTestController@preguntasCierre1')->name('/preguntascierreposttest1');
Route::post('/preguntascierreposttest2', 'PostTestController@preguntasCierre2')->name('/preguntascierreposttest2');
Route::post('/preguntascierreposttest3', 'PostTestController@preguntasCierre3')->name('/preguntascierreposttest3');
Route::post('/preguntascierreposttest4', 'PostTestController@preguntasCierre4')->name('/preguntascierreposttest4');
Route::post('/preguntascierreposttestfinal', 'PostTestController@preguntasCierreFinal')->name('/preguntascierreposttestfinal');

Route::get('/finalizar-curso','HomeController@finalizarCurso')->name('/finalizar-curso');


//logros
Route::post('/guardar-logros', 'ActivityController@guardarLogros')->name('/guardar-logros');

// Rutas actividades

Route::get('/lista-actividades/{id}',[
    'as' => 'get-activity-list',
    'uses' => 'ActivityController@goToActivities'
]);
Route::get('/get-activity-info/{id}', [
    'as' => 'get-activity.id',
    'uses' => 'ActivityController@getActivity'
]);


Route::get('/finalizar-actividad','ActivityController@finalizarActividad')->name('/finalizar-actividad');

Route::get('/actividad-intro-1', 'ActivityController@aprendamosResilienciaIntro')->name('/actividad-intro-1');
Route::post('/actividades-componentes','ActivityController@goToUrl')->name('/actividades-componentes');
Route::get('/actividades-aprendamos-resiliencia-1', 'ActivityController@index')->name('/actividades-aprendamos-resiliencia-1');
Route::get('/actividades-aprendamosresiliencia', 'ActivityController@aprendamosDeResiliencia')->name('/actividades-aprendamosresiliencia');
Route::get('/actividades-aprendamos-resiliencia-3', 'ActivityController@ellaEsEdithGrotberg')->name('/actividades-aprendamos-resiliencia-3');
Route::get('/actividades-aprendamos-resiliencia-4', 'ActivityController@queSabesResiliencia')->name('/actividades-aprendamos-resiliencia-4');
Route::get('/actividades-aprendamos-resiliencia-5', 'ActivityController@queEsResiliencia')->name('/actividades-aprendamos-resiliencia-5');
Route::get('/actividades-aprendamos-resiliencia-6', 'ActivityController@escogerDefinicionResiliencia')->name('/actividades-aprendamos-resiliencia-6');
Route::get('/actividades-aprendamos-resiliencia-7', 'ActivityController@verbalizacioneDeGrotberg')->name('/actividades-aprendamos-resiliencia-7');
Route::get('/actividades-aprendamos-resiliencia-8', 'ActivityController@resilienciaEnLaCrianza')->name('/actividades-aprendamos-resiliencia-8');
Route::get('/logros', 'ActivityController@resiliencialogros')->name('/logros');
Route::get('/actividades-aprendamos-resiliencia-9', 'ActivityController@libroLogros_apr')->name('/actividades-aprendamos-resiliencia-9');


Route::prefix('actividades')->group(function () {

    // Actividad aterrizando el concepto de resiliencia

    Route::get('/aterrizando-el-concepto-resiliencia-1', 'ActivityController@intro_acdr')->name('/aterrizando-el-concepto-resiliencia-1');
    Route::get('/aterrizando-el-concepto-resiliencia-2', 'ActivityController@cuandoPrestoAtencion_acdr')->name('/aterrizando-el-concepto-resiliencia-2');
    Route::get('/aterrizando-el-concepto-resiliencia-3', 'ActivityController@resilienciaEnLaVidaReal_acdr')->name('/aterrizando-el-concepto-resiliencia-3');
    Route::get('/aterrizando-el-concepto-resiliencia-4', 'ActivityController@monitoreoElComportamiento_acdr')->name('/aterrizando-el-concepto-resiliencia-4');
    Route::get('/aterrizando-el-concepto-resiliencia-5', 'ActivityController@logros_acdr' )->name('/aterrizando-el-concepto-resiliencia-5');


    // Actividad gafas de las emociones

    Route::get('/gafas-de-las-emociones-1', 'ActivityController@intro_gdle')->name('/gafas-de-las-emociones-1');
    Route::get('/gafas-de-las-emociones-2', 'ActivityController@videosDescriptivos_gdle')->name('/gafas-de-las-emociones-2');
    Route::get('/gafas-de-las-emociones-3', 'ActivityController@relacionVideosHijo_gdle')->name('/gafas-de-las-emociones-3');
    Route::get('/gafas-de-las-emociones-4', 'ActivityController@logros_gdle')->name('/gafas-de-las-emociones-4');


    // Actividad papito escultor

    Route::get('/papito-escultor-1', 'ActivityController@intro_pe')->name('/papito-escultor-1');
    Route::get('/papito-escultor-2', 'ActivityController@cuandoPrestoAtencion_pe')->name('/papito-escultor-2');
    Route::get('/papito-escultor-3', 'ActivityController@encuentraAlgo_pe')->name('/papito-escultor-3');
    Route::get('/papito-escultor-4', 'ActivityController@yoYMiManera_pe')->name('/papito-escultor-4');
    Route::get('/papito-escultor-5', 'ActivityController@tareas_pe')->name('/papito-escultor-5');
    Route::get('/papito-escultor-6', 'ActivityController@logros_pe')->name('/papito-escultor-6');

    // Actividad dia del elogio

    Route::get('/dia-del-elogio-1', 'ActivityController@intro_dde')->name('/dia-del-elogio-1');
    Route::get('/dia-del-elogio-2', 'ActivityController@cuandoPrestoAtencion_dde')->name('/dia-del-elogio-2');
    Route::get('/dia-del-elogio-3', 'ActivityController@paraQueDeboElogiar_dde')->name('/dia-del-elogio-3');
    Route::get('/dia-del-elogio-4', 'ActivityController@aprendeEstrategias_dde')->name('/dia-del-elogio-4');
    Route::get('/dia-del-elogio-5', 'ActivityController@recuerdaEstrategias_dde')->name('/dia-del-elogio-5');
    Route::get('/dia-del-elogio-6', 'ActivityController@practicaRefuerzo_dde')->name('/dia-del-elogio-6');
    Route::get('/dia-del-elogio-7', 'ActivityController@ojosAbiertosYTactoDispuesto_dde')->name('/dia-del-elogio-7');
    Route::get('/dia-del-elogio-8', 'ActivityController@tarea_dde')->name('/dia-del-elogio-8');
    Route::get('/dia-del-elogio-9', 'ActivityController@logros_dde')->name('/dia-del-elogio-9');

    // Actividad identificación y control emocional

    Route::get('/identificacion-control-emocional-1', 'ActivityController@intro_ice')->name('/identificacion-control-emocional-1');
    Route::get('/identificacion-control-emocional-2', 'ActivityController@desarrollo_ice')->name('/identificacion-control-emocional-2');
    Route::get('/identificacion-control-emocional-3', 'ActivityController@regulacion_emociones_ice')->name('/identificacion-control-emocional-3');
    Route::get('/identificacion-control-emocional-4', 'ActivityController@tareas_semana_ice')->name('/identificacion-control-emocional-4');
    Route::get('/identificacion-control-emocional-5', 'ActivityController@logros_ice')->name('/identificacion-control-emocional-5');
});

//Route::get('/actividades2', 'ActivityController@yourCharacter')->name('/actividades2');

//Route::get('/actividad1', 'ActivityController@actividad1')->name('actividad1');

Route::get('/cuidador-infantes', 'HomeController@traerInfantes')->name('/cuidador-infantes');

Route::get('/cuidador-dashboard/{id}', 'HomeController@dashboardInfante')->name('/cuidador-dashboard');

// Escalas de resiliencia EP2 

Route::get('/escalap2/{id}',[
    'as' => 'escalap2.id',
    'uses' => 'CustomControllers\EscalaEP2Controller@escalaEp2ByNino'
]);
Route::post('/escalap2-datos-anexos', 'CustomControllers\EscalaEP2Controller@actualizarDatosAnexosEscalaEP2')->name('/escalap2-datos-anexos');
Route::post('/guardar-escalap2-cuestionario', 'CustomControllers\EscalaEP2Controller@guardarEscala')->name('/guardar-escalap2-cuestionario');
Route::get('/resultados-escalap2/{id}','CustomControllers\EscalaEP2Controller@goResultadosEscala')->name('/resultados-escalap2');
Route::get('finalizar-escalap2','CustomControllers\EscalaEP2Controller@finalizarEscala')->name('/finalizar-escalap2');

//Cuestionario Escala WY

Route::get('/datos-escala', 'EscalaWYController@index')->name('/datos-escala');

//Route::get('/escalaWY-cuestionario', 'EscalaWYController@index')->name('/escalaWY-cuestionario');

Route::post('/escalaWY-cuestionario-calculate', 'EscalaWYController@calculateEscalaWY')->name('/escalaWY-cuestionario-calculate');

Route::get('/finalizar-escalawy', 'EscalaWYController@finalizarEscala')->name('/finalizar-escalawy');


//Ruta a home
Route::get('/welcome','Auth\RegisterController@goToMain')->name('/welcome');

// prueba a intro actividad practica el sentido del humor
Route::get('/IntroActividadPractica', 'ActivityController@practicaSentidoDescripcion')->name('/IntroActividadPractica');
// rutas para actividad PRACTICA EL SENTIDO DEL HUMOR 
Route::get('/PracticaSentido', 'ActivityController@paraActividadPracticaHumor')->name('/PracticaSentido');
Route::get('/PracticaSentido2', 'ActivityController@paraActividadPracticaHumor2')->name('/PracticaSentido2');
Route::get('/PracticaSentido3', 'ActivityController@paraActividadPracticaHumor3')->name('/PracticaSentido3');
Route::get('/PracticaSentido4', 'ActivityController@paraActividadPracticaHumor4')->name('/PracticaSentido4');
Route::get('/PracticaSentido5', 'ActivityController@paraActividadPracticaHumor5')->name('/PracticaSentido5');
Route::post('/logrosObtenidosPracticaSentido', 'ActivityController@paraActividadPracticaLogos')->name('/logrosObtenidosPracticaSentido');
Route::Post('/PracticaSentido6', 'ActivityController@paraActividadPracticaCulminada')->name('/PracticaSentido6');
// Rutas para actividad Creando Confianza
Route::get('/IntroCreandoConfianza', 'ActivityController@creandoConfianzaDesc')->name('/IntroCreandoConfianza');
Route::get('/CreandoConfianza1', 'ActivityController@creandoConfianza1')->name('/CreandoConfianza1');
Route::get('/CreandoConfianza2', 'ActivityController@creandoConfianza2')->name('/CreandoConfianza2');
Route::get('/CreandoConfianza3', 'ActivityController@creandoConfianza3')->name('/CreandoConfianza3');
// Funcionalidades
Route::post('/CreandoConfianzaLogros', 'ActivityController@creandoConfianzaLogros')->name('/CreandoConfianzaLogros');
Route::post('/CreandoConfianzaCulminacion', 'ActivityController@creandoConfianzaCulminacion')->name('/CreandoConfianzaCulminacion');


// rutas para actividad HASTA EL FINAL
Route::get('/HastaFinal', 'ActivityController@paraActividadHastaElFinal')->name('/HastaFinal');
Route::get('/HastaFinal2', 'ActivityController@paraActividadHastaElFinal2')->name('/HastaFinal2');
Route::get('/HastaFinal3', 'ActivityController@paraActividadHastaElFinal3')->name('/HastaFinal3');
Route::get('/HastaFinal4', 'ActivityController@paraActividadHastaElFinal4')->name('/HastaFinal4');
Route::post('/HastaFinalCulminacion', 'ActivityController@paraActividadHastaElFinalCulminacion')->name('/HastaFinalCulminacion');
Route::get('/download/{file}', 'ActivityController@downloadImage')->name('/download');

// Rutas para actividad FORMANDO NIÑOS RESILIENTES
Route::get('/IntroFormandoNResilientes', 'ActivityController@formandoNinosResDesc')->name('/IntroFormandoNResilientes');
Route::get('/FormandoNR1', 'ActivityController@formandoNinosRes1')->name('/FormandoNR1');
Route::get('/FormandoNR2', 'ActivityController@formandoNinosRes2')->name('/FormandoNR2');
Route::get('/FormandoNR3', 'ActivityController@formandoNinosRes3')->name('/FormandoNR3');
Route::get('/FormandoNR4', 'ActivityController@formandoNinosRes4')->name('/FormandoNR4');
Route::get('/FormandoNR5', 'ActivityController@formandoNinosRes5')->name('/FormandoNR5');
Route::get('/FormandoNR6', 'ActivityController@formandoNinosRes6')->name('/FormandoNR6');
Route::get('/FormandoNR7', 'ActivityController@formandoNinosResLogros')->name('/FormandoNR7');
Route::Post('/FormandoNR8', 'ActivityController@formandoNinosResFinal')->name('/FormandoNR8');
// Descarga y subir archivos via ftp 
Route::get('/testFtp' , 'ActivityController@ftpTest')->name('/testFtp');

//Subir imagenes y retornar vista
Route::post('/ftpUpImagesActivityLoQueMasTGuste' , 'ActivityController@ftpUpImagesActivityLoQueMasTGuste')->name('/ftpUpImagesActivityLoQueMasTGuste');

// Ruta actividad elije lo que mas te guste
Route::get('/MasTeGuste' , 'ActivityController@loQueMasTeGuste')->name('/MasTeGuste');
Route::get('/MasTeGuste2' , 'ActivityController@loQueMasTeGuste2')->name('/MasTeGuste2');
Route::get('/MasTeGuste3' , 'ActivityController@loQueMasTeGuste3')->name('/MasTeGuste3');
Route::post('/MasTeGuste4' , 'ActivityController@loQueMasTeGusteCulminacion')->name('/MasTeGuste4');

Route::get('/cnr_intro', 'ActivityController@cnr_intro')->name('/cnr_intro');
Route::get('/cnr1', 'ActivityController@cnr1')->name('/cnr1');
Route::get('/cnr2', 'ActivityController@cnr2')->name('/cnr2');
Route::get('/cnr3', 'ActivityController@cnr3')->name('/cnr3');
Route::get('/cnr4', 'ActivityController@cnr4')->name('/cnr4');
Route::get('/cnr_logrosObtenidos', 'ActivityController@cnr_logrosObtenidos')->name('/cnr_logrosObtenidos');
Route::get('/cnr_culminado', "ActivityController@CulminadoActividadCnr")->name('/cnr_culminado');

// Rutas para Actividad UN TESORO ESCONDIDO. "SOY CAPAZ DE… Y ME AMO COMO SOY”
Route::get('/IntroTesoroEscondido', 'ActivityController@tesoroEscondidoDesc')->name('/IntroTesoroEscondido');
Route::get('/TesoroEscondido1', 'ActivityController@tesoroEscondido1')->name('/TesoroEscondido1');
Route::get('/TesoroEscondido2', 'ActivityController@tesoroEscondido2')->name('/TesoroEscondido2');
Route::get('/TesoroEscondido3', 'ActivityController@tesoroEscondidoLogros')->name('/TesoroEscondido3');
Route::get('/TesoroEscondido4', 'ActivityController@tesoroEscondidoCulminacion')->name('/TesoroEscondido4');

// Rutas para Actividad COMO LOROS
Route::get('/IntroComoLoros', 'ActivityController@comoLorosDesc')->name('/IntroComoLoros');
Route::get('/ComoLoros1', 'ActivityController@comoLoros1')->name('/ComoLoros1');
Route::get('/ComoLoros2', 'ActivityController@comoLoros2')->name('/ComoLoros2');
Route::get('/ComoLoros3', 'ActivityController@comoLoros3')->name('/ComoLoros3');
Route::get('/ComoLoros4', 'ActivityController@comoLoros4')->name('/ComoLoros4');
Route::get('/ComoLoros4', 'ActivityController@comoLoros4')->name('/ComoLoros4');
Route::get('/ComoLoros5', 'ActivityController@comoLorosLogros')->name('/ComoLoros5');
Route::get('/ComoLoros6', 'ActivityController@comoLorosCulminacion')->name('/ComoLoros6');


// Rutas para Actividad NIÑOS RESILIENTES
Route::get('/IntroNinosResilientes', 'ActivityController@ninosResilientesDesc')->name('/IntroNinosResilientes');
Route::get('/NinosResilientes1', 'ActivityController@ninosResilientes1')->name('/NinosResilientes1');
Route::get('/NinosResilientes2', 'ActivityController@ninosResilientes2')->name('/NinosResilientes2');
Route::get('/NinosResilientes3', 'ActivityController@ninosResilientes3')->name('/NinosResilientes3');
Route::get('/NinosResilientes4', 'ActivityController@ninosResilientes4')->name('/NinosResilientes4');
Route::post('/NinosResilientes5', 'ActivityController@ninosResilientesLogros')->name('/NinosResilientes5');
Route::get('/NinosResilientes6', 'ActivityController@ninosResilientesCulminacion')->name('/NinosResilientes6');


// Ruta actividad digno de carino 
Route::get('/DignoCarinoIntro' , 'ActivityController@paraDignoDecarino')->name('/DignoCarinoIntro');
Route::get('/DignoCarino' , 'ActivityController@paraDignoDecarino2')->name('/DignoCarino');
Route::get('/DignoCarino2' , 'ActivityController@paraDignoDecarino3')->name('/DignoCarino2');
Route::post('/DignoCarino3' , 'ActivityController@paraDignoDecarino4')->name('/DignoCarino3');
Route::post('/DignoCarino4' , 'ActivityController@dignoCarinoCulminacion')->name('/DignoCarino4');

//Ruta actividad el Mimo
Route::get('/ElmimoIntro' , 'ActivityController@paraElmimo')->name('/ElmimoIntro');
Route::get('/Elmimo' , 'ActivityController@paraElmimo2')->name('/Elmimo');
Route::get('/Elmimo2' , 'ActivityController@paraElmimo3')->name('/Elmimo2');
Route::get('/Elmimo3' , 'ActivityController@paraElmimo4')->name('/Elmimo3');
Route::post('/Elmimo4' , 'ActivityController@elMimoCulminacion')->name('/Elmimo4');

//Ruta actividad grande y fuerte
Route::get('/GrandeYFIntro' , 'ActivityController@paraFuerteYGrande')->name('/GrandeYFIntro');
Route::get('/GrandeYF' , 'ActivityController@paraFuerteYGrande2')->name('/GrandeYF');
Route::get('/GrandeYF2' , 'ActivityController@paraFuerteYGrande3')->name('/GrandeYF2');
Route::get('/GrandeYF3' , 'ActivityController@paraFuerteYGrande4')->name('/GrandeYF3');
Route::get('/GrandeYF4' , 'ActivityController@paraFuerteYGrande5')->name('/GrandeYF4');
Route::post('/GrandeYF5' , 'ActivityController@grandeYFuerteCulminacion')->name('/GrandeYF5');

//Ruta actividad respirar pensar, actuar
Route::get('/RespirarActuarIntro' , 'ActivityController@paraPensarActuar')->name('/RespirarActuarIntro');
Route::get('/RespirarActuar' , 'ActivityController@paraPensarActuar1')->name('/RespirarActuar');
Route::get('/RespirarActuar1' , 'ActivityController@paraPensarActuar2')->name('/RespirarActuar1');
Route::get('/RespirarActuar2' , 'ActivityController@paraPensarActuar3')->name('/RespirarActuar2');
Route::post('/RespirarActuarCulminacion' , 'ActivityController@paraPensarActuarCulminacion')->name('/RespirarActuarCulminacion');
//Route::get('/RespirarActuarLogrosObtenidos' , 'ActivityController@paraFuerteYGrande4')->name('/RespirarActuarLogrosObtenidos);

// Ruta actividad las emociones de mis padres

Route::get('/lenp_intro', 'ActivityController@lenp_intro')->name('/lenp_intro');
Route::get('/lenp1', 'ActivityController@lenp1')->name('/lenp1');
Route::get('/lenp2', 'ActivityController@lenp2')->name('/lenp2');
Route::get('/lenp3', 'ActivityController@lenp3')->name('/lenp3');
Route::get('/lenp4', 'ActivityController@lenp4')->name('/lenp4');
Route::get('/lenp5', 'ActivityController@lenp5')->name('/lenp5');
Route::get('/lenp_logrosObtenidos', 'ActivityController@lenp_logrosObtenidos')->name('/lenp_logrosObtenidos');
Route::get('/lenp_culminado', "ActivityController@CulminadoActividadLenp")->name('/lenp_culminado');


// Ruta actividad Seguir y seguir intentando

Route::get('/ssi_intro', 'ActivityController@ssi_intro')->name('/ssi_intro');
Route::get('/ssi1', 'ActivityController@ssi1')->name('/ssi1');
Route::get('/ssi2', 'ActivityController@ssi2')->name('/ssi2');
Route::get('/ssi3', 'ActivityController@ssi3')->name('/ssi3');
Route::get('/ssi4', 'ActivityController@ssi4')->name('/ssi4');
Route::get('/ssi_logrosObtenidos', 'ActivityController@ssi_logrosObtenidos')->name('/ssi_logrosObtenidos');
Route::get('/ssi_culminado', "ActivityController@CulminadoActividadSsi")->name('/ssi_culminado');


// Ruta actividad cosas de grande

Route::get('/cdg_intro', 'ActivityController@cdg_intro')->name('/cdg_intro');
Route::get('/cdg1', 'ActivityController@cdg1')->name('/cdg1');
Route::get('/cdg2', 'ActivityController@cdg2')->name('/cdg2');
Route::get('/cdg3', 'ActivityController@cdg3')->name('/cdg3');
Route::get('/cdg4', 'ActivityController@cdg4')->name('/cdg4');
Route::get('/cdg_logrosObtenidos', 'ActivityController@cdg_logrosObtenidos')->name('/cdg_logrosObtenidos');
Route::get('/cdg_culminado', "ActivityController@CulminadoActividadCdg")->name('/cdg_culminado');

// Ruta actividad las reglas de juego

Route::get('/lrj_intro', 'ActivityController@lrj_intro')->name('/lrj_intro');
Route::get('/lrj1', 'ActivityController@lrj1')->name('/lrj1');
Route::get('/lrj2', 'ActivityController@lrj2')->name('/lrj2');
Route::get('/lrj_logrosObtenidos', 'ActivityController@lrj_logrosObtenidos')->name('/lrj_logrosObtenidos');
Route::get('/lrj_culminado', "ActivityController@CulminadoActividadLrj")->name('/lrj_culminado');

// Ruta actividad arbol genialogico

Route::get('/ag_intro', 'ActivityController@ag_intro')->name('/ag_intro');
Route::get('/ag1', 'ActivityController@ag1')->name('/ag1');
Route::get('/ag2', 'ActivityController@ag2')->name('/ag2');
Route::get('/ag_logrosObtenidos', 'ActivityController@ag_logrosObtenidos')->name('/ag_logrosObtenidos');
Route::get('/ag_culminado', "ActivityController@CulminadoActividadAg")->name('/ag_culminado');

//Ruta módulo investigador
Route::get('/menuInvestigador', 'MenuInvestigadorController@index')->name('/menuInvestigador');

