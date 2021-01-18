<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeccionEjercicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccion_ejercicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('identificador');
            $table->string('cantidad_general');
            $table->string('cantidad_resuelta')->nullable();
            $table->string('tiempo_general');
            $table->string('tiempo_resuelto')->nullable();
            $table->string('estado');
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
        Schema::dropIfExists('seccion_ejercicios');
    }
}
