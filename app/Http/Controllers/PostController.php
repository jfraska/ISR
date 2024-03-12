<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        $tags = Cache::remember('tags', now()->addDays(3), function () {
            return Tag::whereHas('posts', function ($query) {
                $query->published();
            })->take(10)->get();
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
