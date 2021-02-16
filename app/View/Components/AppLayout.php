<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Livewire\WithPagination;

class AppLayout extends Component
{
    use WithPagination;

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
