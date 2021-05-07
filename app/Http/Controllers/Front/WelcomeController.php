<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use App\Models\Topic;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $series = Serie::orderBy('updated_at', 'DESC')->limit(6)->get();
        $topics = Topic::with(['published_posts' => function ($query) {
            $query->orderBy('published_at', 'DESC');
        }])->get();

        return view('welcome', compact('topics', 'series'));
    }

    public function terms()
    {
        return view('terms');
    }

    public function policy()
    {
        return  view('policy');
    }
}
