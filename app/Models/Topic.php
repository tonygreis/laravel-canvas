<?php

namespace App\Models;



use Canvas\Models\Topic as CanvasTopic;

class Topic extends CanvasTopic
{
    public function published_posts()
    {
        return $this->belongsToMany(Post::class,'canvas_posts_topics', 'topic_id', 'post_id')
            ->where('published_at', '<=', now()->toDateTimeString());
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
