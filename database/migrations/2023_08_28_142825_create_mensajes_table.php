<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('incidencia_id');
            $table->text('contenido');

            $table->timestamps();

            // Relación con la tabla de usuarios en otra base de datos (rrhh)
            // $table->foreign('user_id')->on('rrhh.acceso.usuarios')->references('idusuario');

            // // Relación con la tabla de incidencias en la base de datos actual
            // $table->foreign('incidencia_id')->references('id')->on('incidencias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensajes');
    }
};
