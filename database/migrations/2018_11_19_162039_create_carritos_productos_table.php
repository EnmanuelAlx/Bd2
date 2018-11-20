<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarritosProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carritos_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_carrito');
            $table->unsignedInteger('id_producto');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_carrito')->references('id')->on('carritos')->onDelete('cascade');
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrito_productos');
    }
}
