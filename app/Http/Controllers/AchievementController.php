<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Category;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index(Category $category)
    {
        $achievements = Achievement::published()->latest()->take(3)->get();

        return view(
            'achievements.index',
            [
                'category' => $category,
                'achievements' => $achievements
            ]
        );
    }

    public function show(Achievement $achievement)
    {
        return view(
            'achievements.show',
            [
                'achievement' => $achievement
            ]
        );
    }
}
