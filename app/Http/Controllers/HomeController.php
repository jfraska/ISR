<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Organizational;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Category $category, Organizational $organizational)
    {
        // $posts = Post::where('is_featured', true)->latest()->take(3)->get();
        $beritaCategory = Category::where('slug', 'berita')->firstOrFail();
        $artikelCategory = Category::where('slug', 'article')->firstOrFail();
        $miniBlogCategory = Category::where('slug', 'mini-blog')->firstOrFail();
        $berita = Post::withCategory($beritaCategory)->published()->latest()->take(3)->get();
        $artikel = Post::withCategory($artikelCategory)->published()->latest()->take(3)->get();
        $miniBlog = Post::withCategory($miniBlogCategory)->published()->latest()->take(3)->get();
        $agenda = Agenda::published()->orderBy('datetime')->get();

        $profil = Organizational::where('slug', 'profile')->firstOrFail();
        $misi = Organizational::where('slug', 'mission')->firstOrFail();
        $kabinet = Organizational::where('slug', 'cabinet')->firstOrFail();

        return view('home', [
            'berita' => $berita,
            'artikel' => $artikel,
            'miniBlog' => $miniBlog,
            'agenda' => $agenda,
            'profil' => $profil,
            'misi' => $misi,
            'kabinet' => $kabinet
        ]);
    }

    public function findBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}
