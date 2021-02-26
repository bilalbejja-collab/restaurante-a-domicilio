<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class RepartidorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'dni' => 'E8798712W',
            'nombre' => 'Repartidor',
            'apellidos' => 'Repartidor',
            'email' => 'repartidor@gmail.com',
            'direccion' => 'Crta de águilas',
            'ciudad' => 'Cuevas del Almanzora',
            'telefono' => '897454654',
            'password' => bcrypt('12345678')
        ])->assignRole('Repartidor');
    }
}
