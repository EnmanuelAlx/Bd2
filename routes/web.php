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

Route::get('/', "HomeController@index");

Route::get('/withCategory/{categoria_id}', "HomeController@withCategory");

Route::group(['prefix' => 'Empresa'], function () {
    Route::get('/{empresa_id}', 'EmpresaController@index');
});