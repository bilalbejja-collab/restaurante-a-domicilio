<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class RepartidorController extends Controller
{
   /**
     * Protección de rutas
     */
    public function __construct()
    {
        $this->middleware('can:admin.repartidores.index')->only('index');
        $this->middleware('can:admin.repartidores.create')->only('create', 'store');
        $this->middleware('can:admin.repartidores.edit')->only('edit', 'update');
        $this->middleware('can:admin.repartidores.destroy')->only('destroy');
    }

    public function index()
    {
        $repartidores = User::role('Repartidor')->get();
        //return $repartidores;
        return view('admin.repartidores.index', compact('repartidores'));
    }

    public function create()
    {
        $estados = [
            'libre' => 'Estado libre',
            'ocupado' => 'Estado ocupado'
        ];

        return view('admin.repartidores.create', compact('estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|unique:users',
            'nombre' => 'required',
            'apellidos' => 'required|unique:users',
            'email' => 'required|unique:users',
            'direccion' => 'required',
            'ciudad' => 'required',
            'telefono' => 'required|numeric',
            // minimo 5 si es por hora
            'salario' => 'required|numeric|min:5',
            'estado' => 'required',
            'password' => 'required'
        ]);

        // Hash la contraseña
        $request['password'] = Hash::make($request['password']);

        $repartidor = User::create($request->all())->assignRole('Repartidor');

        return redirect()->route('admin.repartidores.edit', $repartidor)->with('info', 'El repartidor se creó con éxito');
    }

    public function edit(User $repartidore)
    {
        $estados = [
            'libre' => 'Estado libre',
            'ocupado' => 'Estado ocupado'
        ];

        return view('admin.repartidores.edit', compact('repartidore', 'estados'));
    }

    public function update(Request $request, User $repartidore)
    {
        $request->validate([
            'dni' => "required|unique:users,dni,$repartidore->dni",
            'nombre' => 'required',
            'apellidos' => "required|unique:users,apellidos,$repartidore->apellidos",
            'email' => "required|unique:users,email,$repartidore->email",
            'direccion' => 'required',
            'ciudad' => 'required',
            'telefono' => 'required|numeric',
            'salario' => 'required|numeric|not_in:0',
            'estado' => 'required',
            'password' => 'required'
        ]);

        // Hash la contraseña
        $request['password'] = Hash::make($request['password']);

        $repartidore->update($request->all());

        return redirect()->route('admin.repartidores.edit', $repartidore)->with('info', 'El repartidor se actualizó con éxito');
    }

    public function destroy(User $repartidore)
    {
        $repartidore->delete();

        return redirect(route('admin.repartidores.index'))->with('info', 'El repartidor se eliminó con éxito');
    }
}