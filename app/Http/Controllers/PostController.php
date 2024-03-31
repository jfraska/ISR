<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        $tags = Cache::remember('tags', now()->addDays(3), function () {
            return Post::with('tags')->published()->get()->pluck('tags')->flatten()->unique('id')->take(10);
        });

        return view(
            'posts.index',
            [
                'tags' => $tags
            ]
        );
    }

    public function show(Post $post)
    {
        return view(
            'posts.show',
            [
                'post' => $post
            ]
        );
    }
}
