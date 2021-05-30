<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('alumno','AlumnoController');
Route::resource('calificacion','CalificacionController');
Route::resource('aprobados','AprobadosController');
Route::resource('reprobados','ReprobadosController');


Route::get('/home', 'HomeController@index');
