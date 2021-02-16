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
        /*
        DB::table('roles')->DB::insert([
            'role' => "admin"
        ]);

        DB::table('roles')->DB::insert([
            'role' => "grestaurante"
        ]);

        DB::table('roles')->DB::insert([
            'role' => "repartidor"
        ]);

        DB::table('roles')->DB::insert([
            'role' => "cliente"
        ]);
        */


        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);
        $role3 = Role::create(['name' => 'Other']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tags.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.posts.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.destroy'])->syncRoles([$role1, $role2]);

/*
        //Sobre restaurantes
        Permission::create(['name' => 'admin.restaurantes.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.restaurantes.create'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.restaurantes.edit'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.restaurantes.destroy'])->syncRoles([$role1, $role4]);
        //Sobre platos
        Permission::create(['name' => 'admin.platos.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.platos.create'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.platos.destroy'])->syncRoles([$role1, $role4]);
        //Sobre pedidos
        Permission::create(['name' => 'admin.pedidos.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.pedidos.edit'])->syncRoles([$role2, $role4]);
        //Sobre categorias
        Permission::create(['name' => 'admin.categorias.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.categorias.create'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.categorias.destroy'])->syncRoles([$role1, $role4]);
*/
    }
}
