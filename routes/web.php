<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("pages.auth.sign-in");
});

Route::get("/register", function () {
    return view("pages.auth.sign-up");
});

Route::get("/forgot-password", function () {
    return view("pages.auth.forgot-password");
});

Route::get("/reset-password", function () {
    return view("pages.auth.reset-password");
});