<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SourceController;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';


Route::middleware(['auth'])->group(function () {
    Route::resource('sources', SourceController::class);
});