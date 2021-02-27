<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Plato;
use App\Models\Restaurante;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlatoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plato::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word(50),
            'descripcion' => $this->faker->text(500),
            'precio' => $this->faker->numberBetween($min = 5, $max = 50),
            'categoria_id' => Categoria::all()->random()->id,
            'restaurante_id' => Restaurante::all()->random()->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
