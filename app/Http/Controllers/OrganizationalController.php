<?php

namespace App\Http\Controllers;

use App\Models\Organizational;
use Illuminate\Http\Request;

class OrganizationalController extends Controller
{
    public function visimisi()
    {
        $organizational = Organizational::query()->where('slug', 'mission')->first();

        return view('abouts.visi-misi', [
            'organizational' => $organizational,
        ]);
    }

    public function struktur()
    {
        $organizational = Organizational::query()->where('slug', 'structure')->first();

        return view('abouts.struktur-organisasi', [
            'organizational' => $organizational,
        ]);
    }
}
