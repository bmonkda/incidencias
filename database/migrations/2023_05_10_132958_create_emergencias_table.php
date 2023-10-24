<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('emergencias', function (Blueprint $table) {
            $table->id()->comment('ID de la emergencia');

            $table->string('nombre')->comment('Nombre de la emergencia');
            $table->string('color')->comment('Color de la emergencia');
            $table->string('color2')->comment('Color2 de la emergencia');
            $table->smallInteger('status')->default(1)->comment('0: inactivo 1: activo. Por defecto será activo');

            $table->timestamps();
        });

        // Agregar comentarios a los campos de creación y actualización en PostgreSQL
        DB::statement('COMMENT ON COLUMN emergencias.created_at IS \'Fecha de creación\'');
        DB::statement('COMMENT ON COLUMN emergencias.updated_at IS \'Fecha de actualización\'');
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emergencias');
    }
};
