<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    public function index(Category $category)
    {
        $recruitment = Recruitment::published()->withCategory($category)->latest()->take(5)->get();

        return view(
            'recruitments.index',
            [
                'recruitment' => $recruitment
            ]
        );
    }

    public function show(Recruitment $recruitment)
    {
        return view(
            'recruitments.show',
            [
                'recruitment' => $recruitment
            ]
        );
    }
}
