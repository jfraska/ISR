<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function show(Department $department)
    {
        return view(
            'department',
            [
                'department' => $department
            ]
        );
    }
}
