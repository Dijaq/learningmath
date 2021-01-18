<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Multiplicacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiplicacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seccionejercicios_id');
            $table->string('valor1');
            $table->string('valor2');
            $table->string('resultado_correcto')->nullable();
            $table->string('respuesta_ingresada')->nullable();
            $table->boolean('es_correcto')->nullable();
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
        Schema::dropIfExists('multiplicacion');
    }
}
