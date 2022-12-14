<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Incidencia;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class IncidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incidencias = Incidencia::factory(100)->create();

        foreach ($incidencias as $incidencia) {
            Image::factory(1)->create([
                'imageable_id' => $incidencia->id,
                'imageable_type' => Incidencia::class,
            ]);
            
            /* $incidencia->modos()->attach([
                rand(1, 2),
                rand(3, 4),
            ]); */
        }
    }
}
