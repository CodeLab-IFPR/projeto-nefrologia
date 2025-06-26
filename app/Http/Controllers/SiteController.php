<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        // return 'index';
        $videos = Video::paginate(4);

        return view('home', compact('videos'));
    }

    public function details($slug)
    {
        $video = Video::where('slug', $slug)->first();

        return view('video.details', compact('video'));
    }
}
