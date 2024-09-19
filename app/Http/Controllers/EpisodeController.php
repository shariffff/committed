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
        return back();
    }
}
