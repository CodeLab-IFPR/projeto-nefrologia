<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $totalVideos = Video::count();
        $nearestMultipleOfFive = $totalVideos < 5 ? $totalVideos : floor($totalVideos / 5) * 5;
        $showcaseVideo = Video::where('is_showcase', true)->first();
        $videos = Video::orderBy('id', 'asc')->get();
        return view('home', compact('showcaseVideo', 'nearestMultipleOfFive', 'videos'));
    }

    public function videos()
    {
        $videos = Video::paginate(8);
        return view('videos', compact('videos'));
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

    public function fosforo()
    {
        return view('fosforo');
    }
    public function potassio()
    {
        return view('potassio');
    }
}
