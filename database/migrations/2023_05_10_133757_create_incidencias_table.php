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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id()->comment('ID de la incidencia');

            $table->string('titulo')->comment('Título de la incidencia');
            $table->string('slug')->comment('Slug de la incidencia');
            $table->longText('descripcion')->comment('Descripción de la incidencia');

            $table->foreignId('categoria_id')->comment('ID que hace referencia a la tabla categorias')->references('id')->on('categorias')->onDelete('cascade')->nullable();
            
            $table->foreignId('subcategoria_id')->comment('ID que hace referencia a la tabla subcategorias')->references('id')->on('subcategorias')->onDelete('cascade');
            
            $table->foreignId('emergencia_id')->comment('ID que hace referencia a la tabla emergencias')->references('id')->on('emergencias')->onDelete('cascade');

            $table->foreignId('statu_id')->comment('ID que hace referencia a la tabla status')->default(1)->references('id')->on('status')->onDelete('cascade');

            // usuario que crea la incidencia
            $table->bigInteger('user_id')->nullable()->comment('ID del usuario que crea la incidencia');
            
            //unidad estructura a la que perteneve el usuario que crea la incidencia
            $table->foreignId('unidadestructura_id')->nullable()->comment('ID de unidad estructura del usuario que crea la incidencia')/* ->references('idusuario')->on('users') */;
            
            //gerencia de la unidad estructura a la que perteneve el usuario que crea la incidencia
            $table->foreignId('gerencia_id')->nullable()->comment('ID de la gerencia de la unidad estructura del usuario que crea la incidencia')/* ->references('idusuario')->on('users') */;
            
            //usuario que se le ha asignado la incidencia
            $table->foreignId('asignado_id')->nullable()->comment('ID del usuario que se la ha asignado la incidencia')/* ->references('idusuario')->on('users') */;

            //usuario que asigna la incidencia
            $table->foreignId('asigna_id')->nullable()->comment('ID del usuario que asignó la incidencia')/*->references('id')->on('users')*/;

            $table->longText('observacion')->nullable()->comment('Observación de la incidencia');
            
            $table->longText('observacion2')->nullable()->comment('Observación de la incidencia por parte de administrador(es)');

            $table->timestamps();
        });

        // Agregar comentarios a los campos de creación y actualización en PostgreSQL
        DB::statement('COMMENT ON COLUMN incidencias.created_at IS \'Fecha de creación\'');
        DB::statement('COMMENT ON COLUMN incidencias.updated_at IS \'Fecha de actualización\'');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
};
