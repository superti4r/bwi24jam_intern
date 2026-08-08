<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::livewire('/sign-in', 'pages::auth.sign-in')->name('sign-in');
Route::livewire('/sign-up', 'pages::auth.sign-up')->name('sign-up');
Route::livewire('/forgot-password', 'pages::auth.forgot-password')->name('forgot-password');
Route::livewire('/reset-password', 'pages::auth.reset-password')->name('reset-password');
