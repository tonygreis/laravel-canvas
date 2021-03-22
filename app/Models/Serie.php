<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Serie extends Model implements Searchable
{
    use HasFactory;

    public function getSearchResult(): SearchResult
    {
        $url = route('series.show', $this->slug);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', 1);
    }
}
