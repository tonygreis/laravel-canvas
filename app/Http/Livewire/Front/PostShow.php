<?php

namespace App\Http\Livewire\Front;

use Canvas\Models\Post;
use Livewire\Component;

class PostShow extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.front.post-show')->layout('layouts.front');
    }
}
