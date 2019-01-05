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

Route::get('/', "HomeController@index")->name('/');

Route::get('/withCategory/{categoria_id}', "HomeController@withCategory");


Route::group(['prefix' => 'empresa'], function () {
    Route::get('/login', "EmpresaController@showLoginForm");
    Route::post('/login', "EmpresaController@login")->name('loginEmpresa');
    Route::get('/perfil', 'EmpresaController@perfil')->name('administrarEmpresa');
    Route::get('/{empresa_id}', 'EmpresaController@index')->name('productosEmpresa');
    Route::post('/register', 'EmpresaController@register')->name('registerEmpresa');
});
Route::get('empresa/editar/{empresa}', 'EmpresaController@edit')->name('editEmpresa');
Route::put('empresa/edit/{empresa}', 'EmpresaController@update')->name('updateEmpresa');

Route::resource('productos', 'ProductoController')->middleware('auth:empresa');
Route::post('/adicional/addnew', 'AdicionalController@store')->name('agregarAdicional');
Route::get('/eliminarAdicional', 'ProductoController@eliminarAdicional')->name('deleteAdicional');
Route::post('/addAdicionales', 'ProductoController@agregarAdicionales')->name('addAdicional');
Auth::routes();






