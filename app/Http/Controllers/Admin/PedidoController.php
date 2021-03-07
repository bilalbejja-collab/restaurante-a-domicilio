<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PedidoRequest;
use App\Models\Pedido;
use App\Models\Repartidor;
use App\Models\Restaurante;
use App\Models\User;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Protección de rutas
     */
    public function __construct()
    {
        $this->middleware('can:admin.pedidos.index')->only('index');
        $this->middleware('can:admin.pedidos.create')->only('create', 'store');
        $this->middleware('can:admin.pedidos.edit')->only('edit', 'update');
        $this->middleware('can:admin.pedidos.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();

        return view('admin.pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$repartidores = Repartidor::pluck('apellidos', 'id');
        $repartidores = User::role('Repartidor')->pluck('lastname', 'id');

        $restaurantes = Restaurante::pluck('nombre', 'id');

        // key = value: para que no me guarde en la base de datos el key por defecto
        $estados = [
            'recibido' => 'recibido',
            'finalizado' => 'finalizado',
            'cancelado' => 'cancelado'
        ];

        return view('admin.pedidos.create', compact('repartidores', 'restaurantes', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidoRequest $request)
    {
        $pedido = Pedido::create($request->all());

        return redirect()->route('admin.pedidos.edit', $pedido)->with('info', 'El pedido se creó con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $this->authorize('autor', $pedido);

        $repartidores = User::role('Repartidor')->pluck('lastname', 'id');

        $restaurantes = Restaurante::pluck('nombre', 'id');

        $estados = [
            'cancelado' => 'cancelado',
            'recibido' => 'recibido',
            'entregado' => 'entregado'
        ];

        return view('admin.pedidos.edit', compact('pedido', 'estados', 'repartidores', 'restaurantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(PedidoRequest $request, Pedido $pedido)
    {
        $pedido->update($request->all());

        return redirect()->route('admin.pedidos.edit', $pedido)->with('info', 'El pedido se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $this->authorize('autor', $pedido);

        $pedido->delete();

        return redirect(route('admin.pedidos.index'))->with('info', 'El pedido se eliminó con éxito');
    }
}
