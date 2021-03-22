<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Canvas\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('published_at', 'DESC')->published()->paginate(12);

        return view('posts.index', compact('posts'));
    }
    public function show(Post $post)
    {
        $previous = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->published()->first();
        $next = Post::where('id', '>', $post->id)->orderBy('id')->published()->first();
        $latest = Post::orderBy('published_at', 'DESC')->where('id', '!=', $post->id)->published()->limit(6)->get();

        event(new \Canvas\Events\PostViewed($post));

        return view('posts.show', compact('post', 'previous', 'next', 'latest'));
    }
}
