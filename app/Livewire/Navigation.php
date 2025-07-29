<?php

namespace App\Livewire;

use App\Routes;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        return view('navigation-menu', [
            'routes' => Routes::cases()
        ]);
    }
}
