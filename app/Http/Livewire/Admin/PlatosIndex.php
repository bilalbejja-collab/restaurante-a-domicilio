<?php

namespace App\Http\Livewire\Admin;

use App\Models\Plato;
use Livewire\Component;
use Livewire\WithPagination;

class PlatosIndex extends Component
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
        $platos = Plato::where('nombre', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(6);

        return view('livewire.admin.platos-index', compact('platos'));
    }
}
