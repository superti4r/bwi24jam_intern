<?php

use App\Enum\Role;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'roles:' . Role::USER->value])->prefix('user')->group(function () {
    //
});
