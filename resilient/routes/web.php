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

Route::get('/datoscuidador', 'DatosCuidadorController@index')->name('/datoscuidador');

Route::get('/datosnino', 'DatosNinoController@index')->name('/datosnino');

Route::get('/pretest', 'PretestController@index')->name('/pretest');

Route::get('/pretest1', 'PretestController@pretest1')->name('/pretest1');

Route::get('/pretest2', 'PretestController@pretest2')->name('/pretest2');

Route::get('/pretest3', 'PretestController@pretest3')->name('/pretest3');

// if yes return god nows what, otherwise return test
Route::get('/pretestprueba', 'PretestController@pretestPrueba')->name('/pretestprueba');

Route::get('/pretestprueba1', 'PretestController@pretestPrueba1')->name('/pretestprueba1');

Route::get('/pretestprueba2', 'PretestController@pretestPrueba2')->name('/pretestprueba2');

Route::get('/pretestprueba3', 'PretestController@pretestPrueba3')->name('/pretestprueba3');

Route::get('/pretestprueba4', 'PretestController@pretestPrueba4')->name('/pretestprueba4');

Route::get('/pretestprueba5', 'PretestController@pretestPrueba5')->name('/pretestprueba5');

Route::get('/pretestprueba6', 'PretestController@pretestPrueba6')->name('/pretestprueba6');

Route::get('/pretestprueba7', 'PretestController@pretestPrueba7')->name('/pretestprueba7');

Route::get('/pretestprueba8', 'PretestController@pretestPrueba8')->name('/pretestprueba8');

Route::get('/pretestprueba9', 'PretestController@pretestPrueba9')->name('/pretestprueba9');

Route::get('/pretestprueba10', 'PretestController@pretestPrueba10')->name('/pretestprueba10');

Route::get('/pretestprueba11', 'PretestController@pretestPrueba11')->name('/pretestprueba11');




// Route::Resource('usuarios', 'UsersController');

