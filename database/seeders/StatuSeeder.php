<?php

namespace Database\Seeders;

use App\Models\Statu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $statu = Statu::create([
        //     'nombre' => 'CREADO',
        //     'color' => 'none',
        //     'color2' => '#d1d1d1',
        // ]);
        $statu = Statu::create([
            'nombre' => 'EN ESPERA',
            'color' => 'warning',
            'color2' => '#e2a03f',
        ]);

        $statu = Statu::create([
            'nombre' => 'ASIGNADA',
            'color' => 'primary',
            'color2' => '#1b55e2',
        ]);

        $statu = Statu::create([
            'nombre' => 'CERRADA (RESUELTA)',
            'color' => 'success',
            'color2' => '#8dbf42',
        ]);

        $statu = Statu::create([
            'nombre' => 'CERRADA (NO RESUELTA)',
            'color' => 'danger',
            'color2' => '#e7515a',
        ]);

    }
}
