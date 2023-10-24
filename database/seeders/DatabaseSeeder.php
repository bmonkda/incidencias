<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Incidencia;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CategoriaSeeder::class);
        
        $this->call(SubcategoriaSeeder::class);

        $this->call(EmergenciaSeeder::class);

        $this->call(StatuSeeder::class);

        // $this->call(IncidenciaSeeder::class);

        Incidencia::factory(300)->create();
    }
}
