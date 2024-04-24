<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index(Category $category)
    {
        $competitions = Competition::published()->latest()->take(3)->get();

        return view(
            'competitions.index',
            [
                'category' => $category,
                'competitions' => $competitions
            ]
        );
    }

    public function show(Category $category, Competition $competition)
    {
        return view(
            'competitions.show',
            [
                'competition' => $competition
            ]
        );
    }
}
