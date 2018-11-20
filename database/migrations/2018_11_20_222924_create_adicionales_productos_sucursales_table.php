<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdicionalesProductosSucursalesTable extends Migration
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
            $table->unsignedInteger('id_adicional');
            $table->unsignedInteger('id_producto_sucursal');
            $table->integer('cantidad_adicional');
            $table->softDeletes();
            $table->foreign('id_adicional')->references('id')->on('adicionales')->onDelete('cascade');
            $table->foreign('id_producto_sucursal')->references('id')->on('adicionales_ordenes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adicional_producto_sucursals');
    }
}
