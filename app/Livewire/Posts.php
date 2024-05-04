<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Posts extends Component
{
    public $category;

    public function mount()
    {
        $this->category = Category::first();
    }

    public function setCategory($category)
    {
        $this->category = Category::where('slug', $category)->first();
    }

    #[Computed()]
    public function posts()
    {
        return Post::withCategory($this->category)->published()->with('tags')->get();
    }

    #[Computed()]
    public function subPosts()
    {
        return Post::with('subCategories')->published()->get()->pluck('subCategories')->flatten()->unique('id');
    }

    public function render()
    {
        return view('livewire.posts');
    }
}
