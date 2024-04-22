<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
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
