<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\WithPagination;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use WithPagination;

    /**
     * Protección de rutas
     */
    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function repartidores()
    {
        $repartidores = User::role('Repartidor')->get();
        //return $repartidores;
        return view('admin.repartidores.index', compact('repartidores'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit', $user)->with('info', 'Se asigno los roles correctamente.');
    }
}
