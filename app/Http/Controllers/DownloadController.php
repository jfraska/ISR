<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $download = Download::published()->take(10)->get();

        return view(
            'downloads.index',
            [
                'download' => $download
            ]
        );
    }

    public function show(Download $download)
    {
        return view(
            'downloads.show',
            [
                'download' => $download
            ]
        );
    }
}
