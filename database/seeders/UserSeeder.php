<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'dni' => '45081700W',
            'nombre' => 'Bilal',
            'apellidos' => 'Bejja',
            'email' => 'bilalbejja2016@gmail.com',
            'direccion' => 'Crta de águilas',
            'ciudad' => 'Cuevas del Almanzora',
            'telefono' => '63233544',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::factory(10)->create();
    }
}
