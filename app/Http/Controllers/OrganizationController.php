<?php

namespace App\Http\Controllers;

use App\Models\OrganizationalProfile;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function visimisi()
    {
        $organizations = OrganizationalProfile::all();

        return view('tentang-isr/visi-misi', [
            'organizations' => $organizations,
        ]);
    }
}
