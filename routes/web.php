<?php

use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KasMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasKeluarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/pemasukan', KasMasukController::class)->parameters(['pemasukan' => 'cash']);
    Route::resource('/pengeluaran', KasKeluarController::class)->parameters(['pengeluaran' => 'cash']);
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('/laporan/cetak_keseluruhan', [LaporanController::class, 'cetak_keseluruhan'])->name('cetak_keseluruhan');
    Route::get('/laporan/cetak_cash_masuk', [LaporanController::class, 'cetak_cash_masuk'])->name('cetak_cash_masuk');
    Route::get('/laporan/cetak_cash_keluar', [LaporanController::class, 'cetak_cash_keluar'])->name('cetak_cash_keluar');
    Route::post('/laporan/cetak_periode', [LaporanController::class, 'cetak_periode'])->name('cetak_periode');
    Route::get('/profile', [ChangePasswordController::class, 'index'])->name('profile');
    Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change-password');
    Route::post('/change-name', [ChangePasswordController::class, 'changeName'])->name('change-name');
});

Auth::routes();
