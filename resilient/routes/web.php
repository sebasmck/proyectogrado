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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'HomeController@displayUsers')->name('/users');

Route::get('/menuCuidador', 'HomeController@mostrarMenuCuidador')->name('/menuCuidador');

// Datos Cuidador

Route::Resource('cuidador', 'DatosCuidadorController');

Route::get('/datosnino', 'DatosNinoController@index')->name('/datosnino');

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

Route::get('/pretestprueba4', 'PretestController@pretestPrueba4')->name('/pretestprueba4');

Route::post('/pretestprueba5', 'PretestController@pretestPrueba5')->name('/pretestprueba5');

Route::post('/pretestprueba6', 'PretestController@pretestPrueba6')->name('/pretestprueba6');

Route::post('/pretestprueba7', 'PretestController@pretestPrueba7')->name('/pretestprueba7');

Route::post('/pretestprueba8', 'PretestController@pretestPrueba8')->name('/pretestprueba8');

Route::post('/pretestprueba9', 'PretestController@pretestPrueba9')->name('/pretestprueba9');

Route::post('/pretestprueba10', 'PretestController@pretestPrueba10')->name('/pretestprueba10');

Route::post('/pretestprueba11', 'PretestController@pretestPrueba11')->name('/pretestprueba11');

Route::post('/pretestprueba12', 'PretestController@pretestPrueba12')->name('/pretestprueba12');

//Rutas para el postest 
Route::get('/posttest', 'PostTestController@index')->name('/posttest');
Route::get('/posttest1', 'PostTestController@postTest1')->name('/posttest1');
Route::get('/posttest2', 'PostTestController@posttest2')->name('/posttest2');
Route::get('/posttest3', 'PostTestController@posttest3')->name('/posttest3');
Route::get('/posttest4', 'PostTestController@posttest4')->name('/posttest4');
Route::get('/posttest5', 'PostTestController@posttest5')->name('/posttest5');

Route::get('/posttestprueba1', 'PostTestController@posttestPrueba1')->name('/posttestprueba1');

Route::get('/posttestprueba2', 'PostTestController@posttestPrueba2')->name('/posttestprueba2');

Route::get('/posttestprueba3', 'PostTestController@posttestPrueba3')->name('/posttestprueba3');

Route::get('/posttestprueba4', 'PostTestController@posttestPrueba4')->name('/posttestprueba4');

Route::get('/posttestprueba5', 'PostTestController@posttestPrueba5')->name('/posttestprueba5');

Route::get('/posttestprueba6', 'PostTestController@posttestPrueba6')->name('/posttestprueba6');

Route::get('/posttestprueba7', 'PostTestController@posttestPrueba7')->name('/posttestprueba7');

Route::get('/posttestprueba8', 'PostTestController@posttestPrueba8')->name('/posttestprueba8');

Route::get('/posttestprueba9', 'PostTestController@posttestPrueba9')->name('/posttestprueba9');

Route::get('/posttestprueba10', 'PostTestController@posttestPrueba10')->name('/posttestprueba10');

Route::get('/posttestprueba11', 'PostTestController@posttestPrueba11')->name('/posttestprueba11');

Route::get('/posttestprueba12', 'PostTestController@posttestPrueba12')->name('/posttestprueba12');
// Rutas actividades 

Route::get('/actividades', 'ActivityController@index')->name('/actividades');

Route::get('/actividades2', 'ActivityController@yourCharacter')->name('/actividades2');

Route::get('/actividad1', 'ActivityController@actividad1')->name('actividad1');

Route::get('/cuidador-infantes', 'HomeController@traerInfantes')->name('/cuidador-infantes');

Route::get('/cuidador-dashboard/{id}', 'HomeController@dashboardInfante')->name('/cuidador-dashboard');

// Escalas de resiliencia EP2 

Route::get('/escalap2', 'CustomControllers\EscalaEP2Controller@index')->name('/escalap2');

Route::post('/escalap2-datos-anexos', 'CustomControllers\EscalaEP2Controller@actualizarDatosAnexosEscalaEP2')->name('/escalap2-datos-anexos');

Route::post('/guardar-escalap2-cuestionario', 'CustomControllers\EscalaEP2Controller@guardarEscala')->name('/guardar-escalap2-cuestionario');


//Cuestionario Escala WY

Route::get('/datos-escala', 'EscalaWYController@index')->name('/datos-escala');

Route::post('/escalaWY-cuestionario', 'EscalaWYController@updateCuidador')->name('/escalaWY-cuestionario');





