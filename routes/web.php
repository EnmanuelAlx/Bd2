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
Route::get('empresa/login', "EmpresaController@showLoginForm");
Route::post('empresa/login', "EmpresaController@login")->name('loginEmpresa');

Route::group(['prefix' => 'Empresa'], function () {
    Route::get('/{empresa_id}', 'EmpresaController@index');
});

Auth::routes();






