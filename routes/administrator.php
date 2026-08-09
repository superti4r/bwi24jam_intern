<?php

use App\Enum\Role;
use App\Http\Controllers\Administrator\CategoryController;
use App\Http\Controllers\Administrator\PagesController;
use App\Http\Controllers\Administrator\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'roles:' . Role::ADMINISTRATOR->value])->prefix('administrator')->group(function () {
    Route::get('users', [UserManagementController::class, 'index'])->name('administrator.users.index');
    Route::get('users/create', [UserManagementController::class, 'create'])->name('administrator.users.create');
    Route::post('users', [UserManagementController::class, 'store'])->name('administrator.users.store');
    Route::get('users/{id}/edit', [UserManagementController::class, 'edit'])->name('administrator.users.edit');
    Route::put('users/{id}', [UserManagementController::class, 'update'])->name('administrator.users.update');
    Route::delete('users/{id}', [UserManagementController::class, 'destroy'])->name('administrator.users.destroy');

    Route::get('categories', [CategoryController::class, 'index'])->name('administrator.categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('administrator.categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('administrator.categories.store');
    Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('administrator.categories.edit');
    Route::put('categories/{id}', [CategoryController::class, 'update'])->name('administrator.categories.update');
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('administrator.categories.destroy');

    Route::get('pages', [PagesController::class, 'index'])->name('administrator.pages.index');
    Route::get('pages/create', [PagesController::class, 'create'])->name('administrator.pages.create');
    Route::post('pages', [PagesController::class, 'store'])->name('administrator.pages.store');
    Route::get('pages/{id}/edit', [PagesController::class, 'edit'])->name('administrator.pages.edit');
    Route::put('pages/{id}', [PagesController::class, 'update'])->name('administrator.pages.update');
    Route::delete('pages/{id}', [PagesController::class, 'destroy'])->name('administrator.pages.destroy');
});
