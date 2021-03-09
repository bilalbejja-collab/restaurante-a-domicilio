<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestauranteResource;
use App\Models\Plato;
use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestauranteController extends Controller
{
    /**
     * Protección de rutas
     */
    public function __construct()
    {
        $this->middleware('can:admin.restaurantes.index')->only('index');
        $this->middleware('can:admin.restaurantes.create')->only('create', 'store');
        $this->middleware('can:admin.restaurantes.edit')->only('edit', 'update');
        $this->middleware('can:admin.restaurantes.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurantes = Restaurante::all();
        return view('admin.restaurantes.index', compact('restaurantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurantes.create');
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
            'nombre' => 'required|unique:restaurantes',
            'direccion' => 'required|unique:restaurantes',
            'ciudad' => 'required',
            'telefono' => 'required|unique:restaurantes'
        ]);

        $restaurante = Restaurante::create($request->all());

        return redirect()->route('admin.restaurantes.edit', $restaurante)->with('info', 'La restaurante se creó con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurante $restaurante)
    {
        return view('admin.restaurantes.edit', compact('restaurante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurante $restaurante)
    {
        $request->validate([
            'nombre' => "required|unique:restaurantes,nombre,$restaurante->id",
            'direccion' => "required|unique:restaurantes,direccion,$restaurante->id",
            'ciudad' => "required",
            'telefono' => "required|unique:restaurantes,telefono,$restaurante->id"
        ]);

        $restaurante->update($request->all());

        return redirect(route('admin.restaurantes.edit', $restaurante))->with('info', 'La restaurante se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurante $restaurante)
    {
        $restaurante->delete();

        return redirect(route('admin.restaurantes.index'))->with('info', 'La restaurante se eliminó con éxito');
    }

    # API REST

    /**
     * Crea un restaurante
     */
    public function apiStoreRestaurante(Request $request)
    {
        return Restaurante::create($request->all()) ?
            response([
                'message' => 'Restaurante creado correctamente'
            ], 201) :
            'No se creó el restaurante';
    }

    /**
     * Borra un restaurante y sus platos
     */
    public function apiDeleteRestaurante(Restaurante $restaurante)
    {
        return $restaurante->delete() ?
            response(['message' => 'Restaurante y sus platos borrados correctamente'], 201) :
            'No se borró el restaurante';
    }
}
