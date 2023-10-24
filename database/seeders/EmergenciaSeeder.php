<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Emergencia;

class EmergenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emergencia = Emergencia::create([
            'nombre' => 'BAJA',
            'color' => 'warning',
            'color2' => '#e2a03f',
        ]);

        $emergencia = Emergencia::create([
            'nombre' => 'MEDIA',
            'color' => 'secondary',
            'color2' => '#d1d1d1',
        ]);

        $emergencia = Emergencia::create([
            'nombre' => 'ALTA',
            'color' => 'danger',
            'color2' => '#e7515a',
        ]);
    }
}
