<?php

namespace App\Livewire;

use App\Models\Recruitment;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class RecruitmentList extends Component
{
    use WithPagination;

    public $category;

    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $search = '';


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
        $this->resetPage();
    }

    #[Computed()]
    public function recruitments()
    {
        return Recruitment::withCategory($this->category)->published()->search($this->search)->orderBy('published_at', $this->sort)->paginate(2);
    }

    public function render()
    {
        return view('livewire.recruitment-list');
    }
}
