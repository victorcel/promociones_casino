<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreEvento','50');
            $table->string('Descripcion');
            $table->unsignedInteger('puntos');
            $table->string('imagen');
            $table->date('FechaInicio');
            $table->date('FechaFin');
            $table->enum('estado', ['Activo', 'Inactivo']);
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
        Schema::dropIfExists('eventos');
    }
}
