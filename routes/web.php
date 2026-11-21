<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DailyNoteController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::resource('catatan', DailyNoteController::class)
        ->parameters(['catatan' => 'dailyNote'])
        ->except(['create', 'show']);
    Route::patch('catatan/{dailyNote}/pin', [DailyNoteController::class, 'togglePin'])
        ->name('catatan.pin');
});
