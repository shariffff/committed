<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function __invoke()
    {
        // Todo: set Gate
        $episode = Episode::find(request('completed'));
        $episode->completed = ! $episode->completed;
        $episode->save();
        return back();
    }
}
