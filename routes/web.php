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

Route::get('/', 'IndexController@index' );
Route::get('eng', 'IndexController@eng' );
Route::get('mov', 'IndexController@mov' );
Route::get('moveng', 'IndexController@movEng' );
Route::post('message', 'IndexController@message');

Route::get('curriculum', 'IndexController@findCurriculum' );

Auth::routes();

Route::get('/home', 'HomeController@index');

//Registrar clientes
Route::post('registerCustom', 'Auth\RegisterController@customResgister');
Route::resource('admin/clientes', 'ClientesController');
Route::get('/admin/deleteCliente', 'ClientesController@drop');
Route::get('/admin/contraseñas', 'ClientesController@contraseñas');
Route::get('/admin/restablecerContraseñas', 'ClientesController@restablecerContraseñas');

//Route::get('/admin/contraseñas', function() {
//    return ' holi'
//});

//Route::post('/admin/contraseñas', 'ClientesController@contraseñas');
//Route::get('admin/clientSearch', 'ClientesController@search');

//Control de registro de ventas
Route::resource('/admin/registros', 'RegistrosController');
Route::get('admin/registroDelete', 'RegistrosController@drop');

//Reportes de administrador
Route::get('admin/reportes' , 'AdminReportesController@index');
Route::get('admin/reportes/mesActual', 'AdminReportesController@actualMes');
Route::post('admin/reportes/parametro', 'AdminReportesController@parametro');


//Clientes
Route::get('cliente/registros', 'ClientReportesController@registroIndex');
Route::get('cliente/reportes', 'ClientReportesController@reportesIndex');
Route::get('cliente/reportes/mesActual','ClientReportesController@mes');
Route::get('cliente/reportes/parametro','ClientReportesController@parametro');