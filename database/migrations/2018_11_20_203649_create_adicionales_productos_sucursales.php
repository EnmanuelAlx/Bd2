<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdicionalesProductosSucursales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adicionales_productos_sucursales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_producto_sucursal');
            $table->unsignedInteger('id_adicional');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_producto_sucursal')->references('id')->on('productos_sucursales')->onDelete('cascade');
            $table->foreign('id_adicional')->references('id')->on('adicionales')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adicionales_productos_sucursales');
    }
}
