<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('/pemasukan', KasMasukController::class)->parameters(['pemasukan' => 'cash']);
Route::resource('/pengeluaran', KasKeluarController::class)->parameters(['pengeluaran' => 'cash']);
