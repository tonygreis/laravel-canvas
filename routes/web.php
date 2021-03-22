<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\SerieController;
use App\Http\Controllers\Front\TagController;
use App\Http\Controllers\Front\TopicController;
use App\Http\Controllers\Front\WelcomeController;
use App\Http\Livewire\SerieIndex;
use App\Http\Livewire\SerieShow;
use App\Http\Livewire\SettingIndex;
use Illuminate\Http\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'welcome']);
Route::view('/terms', 'terms');
Route::view('/policy', 'policy');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('series', SerieIndex::class)->name('admin.series.index');
        Route::get('series/{serie}', SerieShow::class)->name('admin.series.show');
        Route::get('/setting', SettingIndex::class)->name('settings.index');
    });
});

Route::get('series', [SerieController::class, 'index'])->name('series.index');
Route::get('series/{slug}', [SerieController::class, 'show'])->name('series.show');
Route::get('series/{slug}/episodes/{episode}', [SerieController::class, 'showEpisode'])->name('episodes.show');
Route::get('/topics/{topic}', [TopicController::class, 'show'])->name('topics.show');
Route::get('/search/', [SearchController::class, 'index'])->name('search.index');
Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');
Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/storage/{extra}', function ($extra) {
    return redirect('public/storage/'. $extra);
})->where('extra', '.*');
