<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear los roles
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'GRestaurante']);
        $role3 = Role::create(['name' => 'Repartidor']);
        $role4 = Role::create(['name' => 'Cliente']);

        Permission::create(['name' => 'platos.index'])->assignRole($role4);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'admin.users.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.update'])->assignRole($role1);

        //Sobre restaurantes
        Permission::create(['name' => 'admin.restaurantes.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.restaurantes.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.restaurantes.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.restaurantes.destroy'])->syncRoles([$role1, $role2]);

        //Sobre platos
        Permission::create(['name' => 'admin.platos.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.platos.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.platos.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.platos.destroy'])->syncRoles([$role1, $role2]);

        //Sobre categorias
        Permission::create(['name' => 'admin.categorias.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categorias.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categorias.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categorias.destroy'])->syncRoles([$role1, $role2]);

        //Sobre pedidos
        Permission::create(['name' => 'admin.pedidos.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.pedidos.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.pedidos.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.pedidos.destroy'])->syncRoles([$role1, $role2]);

        //Sobre repartidores
        Permission::create(['name' => 'admin.repartidores.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.repartidores.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.repartidores.edit'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.repartidores.destroy'])->syncRoles([$role1, $role3]);
    }
}
