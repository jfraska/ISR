<?php

namespace App\Livewire;

use App\Models\Achievement;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class AchievementsList extends Component
{
    use WithPagination;

    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $search = '';

    #[Url()]
    public $year = '';

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->year = '';
        $this->resetPage();
    }

    #[Computed()]
    public function achievements()
    {
        return Achievement::published()->when($this->activeYear, function ($query) {
            $query->year($this->year);
        })->search($this->search)->orderBy('published_at', $this->sort)->paginate(2);
    }

    #[Computed()]
    public function activeYear()
    {
        if ($this->year === null || $this->year === '') {
            return null;
        }

        return $this->year;
    }
    public function render()
    {
        return view('livewire.achievements-list');
    }
}
