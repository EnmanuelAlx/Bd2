<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenesProductosSucursalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_orden');
            $table->unsignedInteger('id_producto');
            $table->integer('cantidad')->unsigned()->default(1);
            $table->integer('id_adicional')->unsigned()->nullable();
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('id_orden')->references('id')->on('ordenes')->onDelete('cascade');
            $table->foreign('id_adicional')->references('id')->on('adicionales')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_producto_sucursals');
    }
}
