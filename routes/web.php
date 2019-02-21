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

Route::get('/info', function() {
    //return "Información del Sistema";
    return view('paginas.informacion');
});

Route::get('/contacto', function() {
    return view('paginas.contacto');
});

Route::get('/bienvenida/{nombre}/{apellido?}', function($nombre, $apellido = null) {

    return view('paginas.bienvenida', compact('nombre', 'apellido'))
      ->with([
        'nombre_completo' => $nombre . ' ' . $apellido
      ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
