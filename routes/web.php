<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/articles/search', [ArticleController::class, 'search'])->name('articles.search');

Route::get('/articles/{slug}/{title}', [ArticleController::class, 'show'])->where('slug', '[a-z0-9]+')->name('articles.show');

Route::get('/m/{slug}', [PageController::class, 'show'])->name('m.pages.show');

Route::middleware('auth')->group(function () {
    Route::get('/m', [PageController::class, 'member'])->name('m.home');
    Route::get('/m/{slug}/{title}', [ArticleController::class, 'show'])->where('slug', '[a-z0-9]+')->name('m.articles.show');

    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::post('/articles/thumbnail', [ArticleController::class, 'thumbnail'])->name('articles.thumbnail');
    Route::post('/articles/thumbnail/remove', [ArticleController::class, 'remove'])->name('articles.thumbnail.remove');
    Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show');

require __DIR__ . '/administrator.php';
require __DIR__ . '/users.php';
