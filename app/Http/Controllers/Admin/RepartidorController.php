<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Repartidor;
use Illuminate\Http\Request;

class RepartidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repartidores = Repartidor::all();

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
            'nombre' => 'required',
            'apellidos' => 'required|unique:repartidores',
            'telefono' => 'required|numeric',
            'salario' => 'required|numeric|not_in:0',
            'estado' => 'required'
        ]);

        $repartidor = Repartidor::create($request->all());

        return redirect()->route('admin.repartidores.edit', $repartidor)->with('info', 'El repartidor se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repartidor  $repartidor
     * @return \Illuminate\Http\Response
     */
    public function show(Repartidor $repartidor)
    {
        return view('admin.repartidores.show', compact('repartidor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repartidor  $repartidor
     * @return \Illuminate\Http\Response
     */
    public function edit(Repartidor $repartidore)
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
    public function update(Request $request, Repartidor $repartidore)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => "required|unique:repartidores,apellidos,$repartidore->apellidos",
            'telefono' => 'required|numeric',
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
    public function destroy(Repartidor $repartidore)
    {
        $repartidore->delete();

        return redirect(route('admin.repartidores.index'))->with('info', 'El repartidor se eliminó con éxito');
    }
}
