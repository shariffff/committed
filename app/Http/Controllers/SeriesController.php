<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Services\YouTubeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'playlist_url' => 'required',
        ]);

        $series = Series::create([
            'user_id' => auth()->id(),
            'title' => '',
            'playlist_url' => request('playlist_url'),
        ]);

        $youtubeService = new YouTubeService();
        $episodes = $youtubeService->fetchAllVideosFromPlaylist($series->playlist_url);
        $series->episodes()->createMany($episodes);
        $series->title = $youtubeService->fetchPlaylistTitle($series->playlist_url);

        $series->author = $youtubeService->fetchChannelName($series->playlist_url);

        $series->save();

        return redirect()->back();
    }

    public function destroy(Request $request){

        $request->validate([
            'series_id' => 'required'
        ]);

        $series = Series::findOrFail($request->series_id);

        if ($series->user_id === Auth::id()) {
            $series->delete();
        }

        return redirect(route('series'));
    }
}
