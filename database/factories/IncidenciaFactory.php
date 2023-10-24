<?php

namespace Database\Factories;

use App\Models\Emergencia;
use App\Models\Statu;
use App\Models\Subcategoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Incidencia>
 */
class IncidenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $name = $this->faker->unique()->sentence();
        $subcategoria = Subcategoria::all()->random();

        return [
            'titulo' => $name,
            'slug' => Str::slug($name),
            'descripcion' => $this->faker->text(50),
            'user_id' => User::all()->random()->idusuario,
            'subcategoria_id' => $subcategoria->id,
            'categoria_id' => $subcategoria->categoria_id,
            'emergencia_id' => Emergencia::all()->random()->id,
            'statu_id' => Statu::all()->random()->id,
        ];
    }
}
