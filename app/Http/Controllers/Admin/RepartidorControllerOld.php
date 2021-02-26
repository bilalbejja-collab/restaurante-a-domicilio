<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repartidores = User::role('Repartidor')->get();
        //return $repartidores;
        return view('admin.repartidores.index', compact('repartidores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = [
            'libre' => 'Estado libre',
            'ocupado' => 'Estado ocupado'
        ];

        return view('admin.repartidores.create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required|unique:repartidores',
            'movil' => 'required|numeric',
            'salario' => 'required|numeric|not_in:0',
            'estado' => 'required'
        ]);

        $repartidor = User::create($request->all());

        return redirect()->route('admin.repartidores.edit', $repartidor)->with('info', 'El repartidor se creó con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repartidor  $repartidor
     * @return \Illuminate\Http\Response
     */
    public function edit(User $repartidore)
    {
        $estados = [
            'libre' => 'Estado libre',
            'ocupado' => 'Estado ocupado'
        ];

        return view('admin.repartidores.edit', compact('repartidore', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repartidor  $repartidor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $repartidore)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => "required|unique:repartidores,apellidos,$repartidore->lastname",
            'movil' => 'required|numeric',
            'salario' => 'required|numeric|not_in:0',
            'estado' => 'required'
        ]);

        $repartidore->update($request->all());

        return redirect()->route('admin.repartidores.edit', $repartidore)->with('info', 'El repartidor se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repartidor  $repartidor
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $repartidore)
    {
        $repartidore->delete();

        return redirect(route('admin.repartidores.index'))->with('info', 'El repartidor se eliminó con éxito');
    }
}
