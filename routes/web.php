<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

//News
//Route::get('/', ['as' => 'web.index', 'uses' => 'WebController@index']);
Route::get('web', ['as' => 'web.index', 'uses' => 'WebController@index']);
Route::post('web/resolver', ['as' => 'web.resolver', 'uses' => 'WebController@resolver']);
Route::get('web/generar', ['as' => 'web.generar', 'uses' => 'WebController@generar']);
Route::get('web/solve/{id}', ['as' => 'web.solve', 'uses' => 'WebController@solve']);

//Seccion Ejercicios
Route::get('seccion/generar', ['as' => 'new.index', 'uses' => 'SeccionEjerciciosController@generar']);

Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

Route::get('data', ['as' => 'data.index', 'uses' => 'DataController@index']);
Route::get('configuracion', ['as' => 'configuracion.index', 'uses' => 'DataController@configuracion']);
