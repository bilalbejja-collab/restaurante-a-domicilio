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
        ])->syncRoles(['Admin', 'Cliente']);

        User::factory(10)->create();
    }
}
