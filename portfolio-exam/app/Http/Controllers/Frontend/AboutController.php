<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\about;
use Response;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = about::find(1);
        return view('frontend.about.index', compact('abouts'));
    }

    public function download_cv()
    {
        return Response::download(public_path('cv/faizadli.pdf'));
    }
}
