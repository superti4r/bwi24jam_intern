<?php

use App\Enum\Role;
use App\Http\Controllers\Administrator\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'roles:' . Role::ADMINISTRATOR->value])->prefix('administrator')->group(function () {
    Route::get('users', [UserManagementController::class, 'index'])->name('administrator.users.index');
    Route::get('users/create', [UserManagementController::class, 'create'])->name('administrator.users.create');
    Route::post('users', [UserManagementController::class, 'store'])->name('administrator.users.store');
    Route::get('users/{id}/edit', [UserManagementController::class, 'edit'])->name('administrator.users.edit');
    Route::put('users/{id}', [UserManagementController::class, 'update'])->name('administrator.users.update');
    Route::delete('users/{id}', [UserManagementController::class, 'destroy'])->name('administrator.users.destroy');
});
