<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdicionalesProductosSurcursalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adicionales_productos_surcursales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idProducto');
            $table->unsignedInteger('idAdicional');
            $table->unsignedInteger('idSucursal');
            $table->timestamps();
            $table->foreign('idProducto')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('idAdicional')->references('id')->on('adicionales')->onDelete('cascade');
            $table->foreign('idSucursal')->references('id')->on('sucursales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adicional_producto_surcursals');
    }
}
