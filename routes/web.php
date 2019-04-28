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

Route::resource('dependencias', 'DependenciaController')->middleware('auth');

Route::post('documentos/elimina-funcionario/{documento}', 'DocumentoController@eliminaFuncionario')
    ->name('documentos.eliminaFuncionario')
    ->middleware('can:editar-documento,documento'); //Aplica Gate editar-documento (También se pueden aplicar Policies)
    
Route::resource('documentos', 'DocumentoController');

//Rutas para envío de correo electrónico de seguimiento
Route::get('seguimiento/lista-usuarios', 'MailSeguimientoController@listaUsuarios');
Route::get('seguimiento/envia-correo/{user}', 'MailSeguimientoController@enviaCorreo');

