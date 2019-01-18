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
Route::get('/adicional/{adicional}', 'AdicionalController@edit')->name('editarAdicional');
Route::put('/adicional/{adicional}', 'AdicionalController@update')->name('updateAdicional');
Route::delete('adicional/{id}', 'AdicionalController@destroy')->name('borrarAdicional');
Route::get('/query', 'HomeController@search')->name('search');
Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('users/editar/{usuario}','UsuarioController@edit')->name('editUser');
    Route::put('users/editar/{usuario}', 'UsuarioController@update')->name('updateUser');
    Route::post('agregarCarrito', 'UsuarioController@agregarAOrden')->name('agregarProductoCarrito');
    Route::get('carrito', 'UsuarioController@getCarrito')->name('carrito');
    Route::get('sacarCarrito', 'UsuarioController@sacarCarrito')->name('deleteCarrito');
    Route::get('ordenFinalizada', 'UsuarioController@finalizarOrden')->name('finalizarOrden');
    Route::get('ordenes', 'UsuarioController@verOrdenes')->name('visualizarOrdenes');
    Route::get('getProductos', 'UsuarioController@getProductos')->name('getProductos');
    Route::get('marcarRecibido/{orden_id}', 'UsuarioController@marcarRecibido')->name('marcarRecibido');
});






