<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Download;
use Livewire\Attributes\Computed;

class SideNavigationDownload extends Component
{
    #[Computed()]
    public function downloads()
    {
        return Download::all();
    }
    public function render()
    {
        return view('livewire.side-navigation-download');
    }
}
