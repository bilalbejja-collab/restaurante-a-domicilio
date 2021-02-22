<?php

namespace App\Http\Livewire\Admin;

use App\Models\Repartidor;
use Livewire\Component;

class RepartidoresIndex extends Component
{
    public $search = '';

    protected $paginationTheme = 'bootstrap';



    public function render()
    {
        $repartidores = Repartidor::where('nombre', 'LIKE', '%' . $this->search . '%')
            ->orWhere('apellidos', 'LIKE', '%' . $this->search . '%')
            ->orWhere('estado', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(6);

        return view('livewire.admin.repartidores-index', compact('repartidores'));
    }
}
