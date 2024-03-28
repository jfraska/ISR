<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home', [
            'posts' => Post::where('is_featured', true)->latest()->take(3)->get(), 
        ]);
    }

    public function berita()
    {
        return view('berita-terkini');
    }

    public function artikel()
    {
        return view('artikel-terkini');
    }

    public function blog()
    {
        return view('mini-blog');
    }
}
