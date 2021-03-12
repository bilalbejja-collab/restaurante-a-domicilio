<?php

namespace App\Http\Livewire\Admin;

use App\Models\Plato;
use Livewire\Component;
use Livewire\WithPagination;

class PedidoPlatos extends Component
{
    use WithPagination;

    public $pedido;
    public $search = '';

    protected $paginationTheme = 'bootstrap';

    // Para que el buscador busque en todas las páginas
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $platos = $this->pedido->platos;

        return view('livewire.admin.pedido-platos', compact('platos'));
    }
}
