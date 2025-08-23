<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        // return 'index';
        $videos = Video::paginate(8);

        return view('home', compact('videos'));
    }

    public function details($slug)
{
    $video = Video::where('slug', $slug)->firstOrFail();

    $previousVideo = Video::where('id', '<', $video->id)
        ->orderBy('id', 'desc')
        ->first();

    $nextVideo = Video::where('id', '>', $video->id)
        ->orderBy('id', 'asc')
        ->first();

    return view('video.details', compact('video', 'previousVideo', 'nextVideo'));
}
}
