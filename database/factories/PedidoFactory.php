<?php

namespace Database\Factories;

use App\Models\Pedido;
use App\Models\Repartidor;
use App\Models\Restaurante;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estado' => $this->faker->randomElement([
                'recibido', 'finalizado', 'entregado', 'cancelado'
            ]),
            'user_id' => User::all()->random()->id,
            'restaurante_id' => Restaurante::all()->random()->id,
            'repartidor_id' => Repartidor::all()->random()->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
