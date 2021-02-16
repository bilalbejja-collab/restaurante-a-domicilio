<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SearchPagination extends Component
{
    use WithPagination;
    public $searchTerm;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        return view('livewire.search-pagination', [
            'users' => User::where('name', 'like', $searchTerm)->paginate(6)
        ]);
    }
    /*
    $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate(6);

        return view('livewire.admin.users-index', compact('users'));
        */
}
