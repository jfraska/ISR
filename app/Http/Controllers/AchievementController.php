<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Category;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        return view(
            'achievements.index'
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
