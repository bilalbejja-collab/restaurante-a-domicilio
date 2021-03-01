<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\Plato;
use App\Models\Repartidor;
use App\Models\Restaurante;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Para que no se compien los imagenes cada vez que llamo al seeder
        Storage::deleteDirectory('platos');
        Storage::makeDirectory('platos');

    }
}
