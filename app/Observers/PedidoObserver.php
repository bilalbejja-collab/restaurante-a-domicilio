<?php

namespace App\Observers;

use App\Models\Pedido;
use Illuminate\Support\Facades\App;

class PedidoObserver
{
    // Justo antes de que se crea un pedido
    public function creating(Pedido $pedido)
    {
        // Cuando no estoy creando pedidos por consola( con los seeders )
        if (! App::runningInConsole()) {
            $pedido->user_id = auth()->user()->id;
        }
    }
}
