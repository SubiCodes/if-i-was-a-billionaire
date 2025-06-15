<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('items', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('items');

Route::view('users', 'users')
    ->middleware(['auth', 'verified'])
    ->name('users');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
