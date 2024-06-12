<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Services\YouTubeService;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(){
        return view('series.index', [
            'series' => Series::take(10)->get()
        ]);
    }

    public function show(Series $series){
        return view('series.show', [
            'series' => $series->load('episodes')
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'playlist_url' => 'required',
        ]);

        $series = Series::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'playlist_url' => request('playlist_url'),
        ]);

        $youtubeService = new YouTubeService();
        $episodes = $youtubeService->fetchAllVideosFromPlaylist($series->playlist_url);
        $series->episodes()->createMany($episodes);

        return redirect()->back();
    }
}
