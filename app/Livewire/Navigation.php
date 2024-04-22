<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Organizational;
use App\Models\Recruitment;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Navigation extends Component
{
    #[Computed()]
    public function organizationals()
    {
        return Organizational::all();
    }

    #[Computed()]
    public function departments()
    {
        return Department::all();
    }

    #[Computed()]
    public function recruitments()
    {
        return Recruitment::with('categories')->published()->get()->pluck('categories')->flatten()->unique('id');
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
