<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Organizational;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Navigation extends Component
{
    #[Computed()]
    public function departments()
    {
        return Department::all();
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
