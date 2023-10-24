<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            [
                'nombre' => 'Investigación y desarrollo',
                'slug' => Str::slug('Investigación y desarrollo')
            ],
            [
                'nombre' => 'Sistemas',
                'slug' => Str::slug('Sistemas')
            ],
            [
                'nombre' => 'Telecomunicaciones e Infraestructura',
                'slug' => Str::slug('Telecomunicaciones e Infraestructura')
            ],
            [
                'nombre' => 'Soporte Técnico',
                'slug' => Str::slug('Soporte Técnico')
            ],
            [
                'nombre' => 'Data Center',
                'slug' => Str::slug('Data Center')
            ],
        ];

        DB::table('categorias')->insert($categorias);
    }
}
