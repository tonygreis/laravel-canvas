<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function show(Topic $topic)
    {
        $posts = $topic->published_posts()->orderBy('published_at', 'DESC')->paginate(12);
        return view('topics.show', compact('topic', 'posts'));
    }
}
