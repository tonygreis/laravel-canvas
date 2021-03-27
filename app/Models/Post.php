<?php

namespace App\Models;

use Canvas\Models\Post as CanvasPost;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Post extends CanvasPost implements Searchable
{

    public function getSearchResult(): SearchResult
    {
        $url = route('posts.show', $this->slug);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published_at', '<=', now()->toDateTimeString());
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
