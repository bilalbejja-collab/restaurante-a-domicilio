<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Plato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function verPedidos()
    {
        // Pedidos del usuario autenticado
        $pedidos = Pedido::where('user_id', Auth::id())->latest('id')->paginate(8);

        return view('pedidos.checkout', compact('pedidos'));
    }

    public function borrarPedido(Request $request)
    {
        Pedido::where('id', $request->id)
            ->delete();

        return back()->with(['info' => 'El pedido se eliminó con éxito', 'color' => 'green']);
    }
}
