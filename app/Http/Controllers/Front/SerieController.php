<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index()
    {
        $series = Serie::orderBy('updated_at', 'DESC')->published()->paginate(12);

        return view('series.index', compact('series'));
    }

    public function show($slug)
    {
        $serie = Serie::with('episodes')->where('slug', $slug)->published()->first();

        $serie->increment('visits', 1);
        return view('series.show', compact('serie'));
    }

    public function showEpisode($slug, $id)
    {
        $serie = Serie::where('slug', $slug)->published()->first();
        $episode = Episode::where('id', $id)->first();

        return view('episodes.show', compact('episode', 'serie'));
    }
}
