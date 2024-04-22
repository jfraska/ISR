<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
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
