<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::middleware('auth')->get('/m', [PageController::class, 'member'])->name('m.home');

require __DIR__ . '/administrator.php';
require __DIR__ . '/users.php';
