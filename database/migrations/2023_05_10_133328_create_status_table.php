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
        Schema::create('status', function (Blueprint $table) {
            $table->id()->comment('ID del status');

            $table->string('nombre')->comment('Nombre del status');
            $table->string('color')->comment('Color del status');
            $table->string('color2')->comment('Color2 del status');
            $table->smallInteger('status')->default(1)->comment('0: inactivo 1: activo. Por defecto será activo');

            $table->timestamps();
        });

        // Agregar comentarios a los campos de creación y actualización en PostgreSQL
        DB::statement('COMMENT ON COLUMN status.created_at IS \'Fecha de creación\'');
        DB::statement('COMMENT ON COLUMN status.updated_at IS \'Fecha de actualización\'');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status');
    }
};
