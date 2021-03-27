<?php

namespace App\Models;



use Canvas\Models\Tag as CanvasTag;

class Tag extends CanvasTag
{
    public function published_posts()
    {
        return $this->belongsToMany(Post::class,'canvas_posts_tags', 'tag_id', 'post_id')
            ->where('published_at', '<=', now()->toDateTimeString());
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
