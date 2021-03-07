<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pedido;
use Livewire\Component;
use Livewire\WithPagination;

class PedidosIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    // Para que el buscador busque en todas las páginas
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $pedidos = Pedido::where('estado', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(6);

        return view('livewire.admin.pedidos-index', compact('pedidos'));
    }
}
