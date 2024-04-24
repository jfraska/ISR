<?php

namespace App\Livewire;

use App\Models\Competition;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Tags\Tag;

class CompetitionList extends Component
{
    use WithPagination;

    public $category;

    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $search = '';

    #[Url()]
    public $tag = '';

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
        $this->tag = '';
        $this->resetPage();
    }

    #[Computed()]
    public function competitions()
    {
        return Competition::withCategory($this->category)->published()->search($this->search)->orderBy('published_at', $this->sort)->paginate(2);
    }

    #[Computed()]
    public function activeTag()
    {
        if ($this->tag === null || $this->tag === '') {
            return null;
        }

        return Tag::findFromString($this->tag);
    }


    public function render()
    {
        return view('livewire.competition-list');
    }
}
