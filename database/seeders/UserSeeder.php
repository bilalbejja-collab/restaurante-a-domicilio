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
            'name' => 'Bilal',
            'lastname' => 'Bejja',
            'email' => 'bilalbejja2016@gmail.com',
            'address' => 'Crta de águilas',
            'city' => 'Cuevas del Almanzora',
            'movil' => '63233544',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'dni' => 'E8798712W',
            'name' => 'Repartidor',
            'lastname' => 'Repartidor',
            'email' => 'repartidor@gmail.com',
            'address' => 'Crta de águilas',
            'city' => 'Cuevas del Almanzora',
            'movil' => '897454654',
            'password' => bcrypt('12345678')
        ])->assignRole('Repartidor');

        User::factory(10)->create();
    }
}
