<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Restaurante;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        $categorias = Categoria::all();
        $restaurantes = Restaurante::all();

        return view('livewire.navigation', compact('categorias', 'restaurantes'));
    }
}
