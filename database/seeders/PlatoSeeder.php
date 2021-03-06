<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Pedido;
use App\Models\Plato;
use Illuminate\Database\Seeder;

class PlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platos = Plato::factory(20)->create();

        // Comentado porqué estas imagenes no me sirven en heroku
        /*
        foreach ($platos as $plato) {
            $imagen = Image::factory(1)->create([
                'imageable_id' => $plato->id,
                'imageable_type' => Plato::class
            ]);

            //$plato->pedidos()->attach(rand(1, 4), ['cantidad' => 1]);
        }
        */
    }
}
