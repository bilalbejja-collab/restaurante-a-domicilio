<?php

namespace App\Observers;

use App\Models\Plato;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class PlatoObserver
{
    // Justo antes de que se crea un pedido
    public function creating(Plato $pedido)
    {
        // Cuando no estoy creando pedidos por consola( con los seeders )
        if (!App::runningInConsole()) {
            $pedido->user_id = auth()->user()->id;
        }
    }

    // Justo antes de que se borra un plato
    public function deleting(Plato $plato)
    {
        if ($plato->foto) {
            Storage::delete($plato->foto->url);
        }
    }
}
