<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use App\Models\Post;
use Illuminate\Http\Request;
use Spatie\Searchable\ModelSearchAspect;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->input('query')) {
            return redirect()->back();
        }
        $searchResults = (new Search())
            ->registerModel(Post::class, function(ModelSearchAspect $modelSearchAspect) {
                $modelSearchAspect
                    ->addSearchableAttribute('title') // return results for partial matches on usernames
                    ->published();
            })
            ->registerModel(Serie::class, function(ModelSearchAspect $modelSearchAspect) {
                $modelSearchAspect
                    ->addSearchableAttribute('title') // return results for partial matches on usernames
                    ->published();
            })
            ->search($request->input('query'));



        return view('search.index', compact('searchResults'));
    }
}
