<?php

use App\Http\Controllers\MoodController;
use App\Http\Controllers\JournalController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('journals', JournalController::class);
});