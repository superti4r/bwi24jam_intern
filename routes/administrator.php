<?php

use App\Enum\Role;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'roles:' . Role::ADMINISTRATOR->value])->prefix('administrator')->group(function () {
    //
});
