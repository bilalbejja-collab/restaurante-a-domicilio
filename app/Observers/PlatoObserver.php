<?php

namespace App\Observers;

use App\Models\Plato;
use Illuminate\Support\Facades\Storage;

class PlatoObserver
{
    // Justo antes cuando se crea un plato
    public function creating(Plato $plato)
    {

    }

    // Justo antes cuando se borra un plato
    public function deleting(Plato $plato)
    {
        if ($plato->foto) {
            Storage::delete($plato->foto->url);
        }
    }
}
