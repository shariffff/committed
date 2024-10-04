<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function __invoke()
    {
        $episode = Episode::find(request('completed'));
        $episode->completed = true;
        $episode->save();
        $previousUrl = strtok(url()->previous(), '?');
        return redirect($previousUrl . '?' . http_build_query(['playing' => $episode->id]));
    }
}
