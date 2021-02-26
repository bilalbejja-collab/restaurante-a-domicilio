<?php

namespace App\Observers;

use App\Models\Plato;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class PlatoObserver
{
    // Justo antes de que se borra un plato
    public function deleting(Plato $plato)
    {
        if ($plato->foto) {
            Storage::delete($plato->foto->url);
        }
    }
}
