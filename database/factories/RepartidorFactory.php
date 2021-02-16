<?php

namespace Database\Factories;

use App\Models\Repartidor;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class RepartidorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Repartidor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'telefono' => $this->faker->phoneNumber,
            'salario' => $this->faker->numberBetween(1000, 5000),
            'estado' => $this->faker->randomElement([
                'libre', 'ocupado'
            ]),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
