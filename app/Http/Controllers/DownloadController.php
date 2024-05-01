<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use App\Models\Category;

class DownloadController extends Controller
{
    public function index(Category $category)
    {
        $downloads = Download::whereHas('categories', function ($query) use ($category) {
            $query->where('id', $category->id);
        })->published()->latest()->paginate(5);

        return view(
            'downloads.index',
            [
                'category' => $category,
                'downloads' => $downloads
            ]
        );
    }

    public function show(Category $category, Download $download)
    {
        return view(
            'downloads.show',
            [
                'download' => $download
            ]
        );
    }
}
