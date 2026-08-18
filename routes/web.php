<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageSectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteInformationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/search-articles', [ArticleController::class, 'search'])->name('search.articles');

Route::middleware(['auth', 'verified', 'roles:user,administrator'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/articles', [ArticleController::class, 'index'])->name('dashboard.articles.index');
    Route::get('/dashboard/articles/create', [ArticleController::class, 'create'])->name('dashboard.articles.create');
    Route::post('/dashboard/articles', [ArticleController::class, 'store'])->name('dashboard.articles.store');
    Route::get('/dashboard/articles/{article}/edit', [ArticleController::class, 'edit'])->name('dashboard.articles.edit');
    Route::put('/dashboard/articles/{article}', [ArticleController::class, 'update'])->name('dashboard.articles.update');
    Route::delete('/dashboard/articles/{article}', [ArticleController::class, 'destroy'])->name('dashboard.articles.destroy');
});

Route::middleware(['auth', 'verified', 'roles:administrator'])->group(function () {
    Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('dashboard.categories.index');
    Route::get('/dashboard/categories/create', [CategoryController::class, 'create'])->name('dashboard.categories.create');
    Route::post('/dashboard/categories', [CategoryController::class, 'store'])->name('dashboard.categories.store');
    Route::get('/dashboard/categories/{category}/edit', [CategoryController::class, 'edit'])->name('dashboard.categories.edit');
    Route::put('/dashboard/categories/{category}', [CategoryController::class, 'update'])->name('dashboard.categories.update');
    Route::delete('/dashboard/categories/{category}', [CategoryController::class, 'destroy'])->name('dashboard.categories.destroy');
    Route::get('/dashboard/users', [UserController::class, 'index'])->name('dashboard.users.index');
    Route::get('/dashboard/users/create', [UserController::class, 'create'])->name('dashboard.users.create');
    Route::post('/dashboard/users', [UserController::class, 'store'])->name('dashboard.users.store');
    Route::get('/dashboard/users/{user}/edit', [UserController::class, 'edit'])->name('dashboard.users.edit');
    Route::put('/dashboard/users/{user}', [UserController::class, 'update'])->name('dashboard.users.update');
    Route::delete('/dashboard/users/{user}', [UserController::class, 'destroy'])->name('dashboard.users.destroy');
    Route::get('/dashboard/website-information', [WebsiteInformationController::class, 'edit'])->name('dashboard.website-information.edit');
    Route::put('/dashboard/website-information', [WebsiteInformationController::class, 'update'])->name('dashboard.website-information.update');
    Route::get('/dashboard/pages', [PageController::class, 'index'])->name('dashboard.pages.index');
    Route::get('/dashboard/pages/create', [PageController::class, 'create'])->name('dashboard.pages.create');
    Route::post('/dashboard/pages', [PageController::class, 'store'])->name('dashboard.pages.store');
    Route::get('/dashboard/pages/{page}/edit', [PageController::class, 'edit'])->name('dashboard.pages.edit');
    Route::put('/dashboard/pages/{page}', [PageController::class, 'update'])->name('dashboard.pages.update');
    Route::delete('/dashboard/pages/{page}', [PageController::class, 'destroy'])->name('dashboard.pages.destroy');
    Route::scopeBindings()->group(function (): void {
        Route::get('/dashboard/pages/{page}/sections/create', [PageSectionController::class, 'create'])->name('dashboard.pages.sections.create');
        Route::post('/dashboard/pages/{page}/sections', [PageSectionController::class, 'store'])->name('dashboard.pages.sections.store');
        Route::get('/dashboard/pages/{page}/sections/{section}/edit', [PageSectionController::class, 'edit'])->name('dashboard.pages.sections.edit');
        Route::put('/dashboard/pages/{page}/sections/{section}', [PageSectionController::class, 'update'])->name('dashboard.pages.sections.update');
        Route::delete('/dashboard/pages/{page}/sections/{section}', [PageSectionController::class, 'destroy'])->name('dashboard.pages.sections.destroy');
        Route::post('/dashboard/pages/{page}/sections/{section}/{direction}', [PageSectionController::class, 'move'])->whereIn('direction', ['up', 'down'])->name('dashboard.pages.sections.move');
    });
});

Route::get('/{slug}', [PageController::class, 'show'])
    ->where('slug', '^(?!dashboard$|articles$|search-articles$)[a-zA-Z0-9_-]+$')
    ->name('pages.show');
