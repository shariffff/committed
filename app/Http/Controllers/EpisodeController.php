<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Support\Facades\Gate;

class EpisodeController extends Controller
{
    public function __invoke(Episode $episode)
    {
        Gate::authorize('update', $episode);
        $episode = Episode::find($episode)->first();
        $episode->completed = ! $episode->completed;
        $episode->save();
        return back();
    }
}
