<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('productos/{id_empresa}', function($id_empresa){
    $productos = App\Producto::where('id_empresa', '=', $id_empresa);
    return datatables()->eloquent($productos)->toJson();
});

Route::get('adicionales', function () {
    return App\Adicional::all()->toJson();
});