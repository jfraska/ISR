<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::published()->latest()->take(3)->get();

        return view(
            'achievements.index',
            [
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
