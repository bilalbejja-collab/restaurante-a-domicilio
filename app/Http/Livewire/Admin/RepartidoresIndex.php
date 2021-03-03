<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class RepartidoresIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    // Para que el buscador busque en todas las páginas
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $repartidores = User::role('Repartidor')
            ->where('estado', 'LIKE', '%' . $this->search . '%')
            // Si busco por nombre y apellidos me salen todos los usuarios
            // ->orWhere('name', 'LIKE', '%' . $this->search . '%')
            // ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(6);
        return view('livewire.admin.repartidores-index', compact('repartidores'));
    }
}
