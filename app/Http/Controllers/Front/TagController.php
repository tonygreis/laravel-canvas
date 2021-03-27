<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        $posts = $tag->published_posts()->orderBy('published_at', 'DESC')->paginate(12);
        return view('tags.show', compact('tag', 'posts'));
    }
}
