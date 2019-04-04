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
    return view('inicio');
});
Route::get('/informacion', 'PagainasController@info');
Route::get('/desarrolladores', 'PagainasController@equipo')->name('equipo');
Route::get('/contacto', 'PagainasController@contacto')->name('contacto');
Route::get('/bienvenida/{nombre}/{apellido?}', 'PagainasController@bienvenida');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('material', 'MaterialController')
//   ->parameters(['material' => 'material']);

Route::resource('dependencias', 'DependenciaController');

Route::post('documentos/elimina-funcionario/{documento}', 'DocumentoController@eliminaFuncionario')
    ->name('documentos.eliminaFuncionario');
Route::resource('documentos', 'DocumentoController');
