<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhisperWallController;

Route::get('/', function () {
    return view('welcome');
});

// Whisper Wall
Route::prefix('whisper-wall')->name('whisper-wall.')->group(function () {
    Route::get('/', [WhisperWallController::class, 'index'])->name('index');
    Route::post('/', [WhisperWallController::class, 'store'])->name('store');
    Route::post('/{whisperWall}/react/{type}', [WhisperWallController::class, 'react'])->name('react');
    Route::delete('/{whisperWall}', [WhisperWallController::class, 'destroy'])->name('destroy');
});