<?php

namespace Database\Factories;

use App\Models\Categoria;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categoria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement(
                [
                    'Plato hondo',
                    'Plato llano',
                    'Plato de pan',
                    'Plato de postre',
                    'Plato de café',
                    'Plato de presentación',
                    'Fuente o ensalada'
                ]
            ),
            'color' => $this->faker->randomElement([
                'red', 'yellow', 'green', 'blue', 'indigo', 'purpule', 'pink'
            ]),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
