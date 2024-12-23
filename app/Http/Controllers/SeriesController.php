<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Series;
use App\Services\YoutubeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SeriesController extends Controller
{
    public function index()
    {
        return view('series.index', [
            'series' => Series::where('user_id', auth()->id())
                ->take(10)
                ->get()
        ]);
    }

    public function show(Series $series)
    {
        Gate::authorize('view', $series);
        $seriesWithEpisodes = $series->load('episodes');
        return view('series.show', [
            'series' => $seriesWithEpisodes,
            'episode' => $seriesWithEpisodes->episodes->first()
        ]);
    }

    public function showEpisode(Series $series, Episode $episode)
    {
        Gate::authorize('view', $series);
        return view('series.show', [
            'series' => $series->load('episodes'),
            'episode' => $episode,
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'playlist_url' => ['required', 'url', function ($attribute, $value, $fail) {
                // Regular expression to match YouTube playlist URLs
                $pattern = '/^(https?:\/\/)?(www\.)?(youtube\.com\/(playlist\?list=|watch\?v=[^\s&]+&list=))[^\s&]+$/';
                if (!preg_match($pattern, $value)) {
                    $fail('Please provide a valid youtube playlist URL.');
                }
            }],
        ]);

        $series = Series::create([
            'user_id' => auth()->id(),
            'title' => '',
            'playlist_url' => request('playlist_url'),
        ]);

        $youtubeService = new YoutubeService(playListURL: request('playlist_url'));
        $episodes = $youtubeService->fetchAllVideosFromPlaylist();
        $series->episodes()->createMany($episodes);
        $series->title = $youtubeService->fetchPlaylistTitle();

        $series->author = $youtubeService->fetchChannelName();
        $series->thumbnail = $youtubeService->fetchPlaylistThumbnail();

        $series->save();

        return redirect()->back();
    }

    public function destroy(Request $request, Series $series)
    {
        Gate::authorize('delete', $series);

        $series->delete();
        return redirect(route('series'));
    }
}
