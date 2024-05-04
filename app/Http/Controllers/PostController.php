<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()->latest()->take(3)->get();

        return view(
            'posts.index',
            [
                'posts' => $posts
            ]
        );
    }

    public function detail(Category $category)
    {
        $tags = Cache::remember('tags', now()->addDays(3), function () {
            return Post::with('tags')->published()->get()->pluck('tags')->flatten()->unique('id')->take(10);
        });
        $populars = Post::published()->withCategory($category)->latest()->take(5)->get();

        return view(
            'posts.detail',
            [
                'category' => $category, 'tags' => $tags,
                'posts' => $populars
            ]
        );
    }

    public function show(Category $category, Post $post)
    {
        $posts = Post::published()->latest()->take(5)->get();
        $subCategory = $post->subCategories;
        $popular = Post::published()->withCategory($category)->latest()->take(5)->get();
        $relate = Post::published()->withCategory($category)->latest()->take(5)->get();

        return view(
            'posts.show',
            [
                'post' => $post,
                'subCategory' => $subCategory,
                'posts' => $posts,
                'populars' => $popular,
                'relates' => $relate,
            ]
        );
    }
}
