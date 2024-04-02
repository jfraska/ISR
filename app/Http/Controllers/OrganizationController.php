<?php

namespace App\Http\Controllers;

use App\Models\Organizational;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function visimisi()
    {
        $organizational = Organizational::all();

        return view('abouts/visi-misi', [
            'organizational' => $organizational,
        ]);
    }
}
