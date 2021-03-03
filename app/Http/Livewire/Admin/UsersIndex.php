<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersIndex extends Component
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
        //15 por defecto
        $users = User::where('dni', 'LIKE', '%' . $this->search . '%')
            ->orWhere('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
            ->paginate(6);

        return view('livewire.admin.users-index', compact('users'));
    }
}
