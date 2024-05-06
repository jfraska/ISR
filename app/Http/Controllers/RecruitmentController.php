<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    public function index(Category $category)
    {
        return view(
            'recruitments.index',
            [
                'category' => $category
            ]
        );
    }

    public function show(Category $category, Recruitment $recruitment)
    {
        return view(
            'recruitments.show',
            [
                'recruitment' => $recruitment
            ]
        );
    }
}
