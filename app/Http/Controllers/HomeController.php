<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = Post::where('is_featured', true)->latest()->take(3)->get();
        $agenda = Agenda::published()->latest()->get();

        return view('home', [
            'posts' => $posts,
            'agenda' => $agenda,
        ]);
    }
}
