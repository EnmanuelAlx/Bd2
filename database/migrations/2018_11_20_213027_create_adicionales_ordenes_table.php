<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdicionalesOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adicionales_ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_adicional');
            $table->unsignedInteger('id_orden');
            $table->foreign('id_adicional')->references('id')->on('adicionales')->onDelete('cascade');
            $table->foreign('id_orden')->references('id')->on('ordenes')->onDelete('cascade');
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
        Schema::dropIfExists('adicional_ordens');
    }
}
