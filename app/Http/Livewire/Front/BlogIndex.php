<?php

namespace App\Http\Livewire\Front;

use Canvas\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class BlogIndex extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.front.blog-index', [
            'posts' => Post::orderBy('published_at', 'DESC')->with('tags')->paginate(2)
        ])->layout('layouts.front');
    }
}
