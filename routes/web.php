
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BuktiDigitalController;

// Halaman utama
Route::get('/', function () {
    return redirect()->route('laporan.create');
});

// Halaman laporan
Route::get('/laporan', [LaporanController::class, 'index'])
    ->name('laporan.index');

Route::get('/laporan/buat', [LaporanController::class, 'create'])
    ->name('laporan.create');

Route::post('/laporan', [LaporanController::class, 'store'])
    ->name('laporan.store');

// Upload bukti digital
Route::post('/laporan/{laporan}/bukti', [BuktiDigitalController::class, 'store'])
    ->name('bukti.store');

// Hapus bukti digital
Route::delete('/bukti/{buktiDigital}', [BuktiDigitalController::class, 'destroy'])
    ->name('bukti.destroy');

