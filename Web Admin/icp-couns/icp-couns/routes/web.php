<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardSiswaController;
use App\Http\Controllers\DashboardAbsensiController;
use App\Http\Controllers\DashboardLaporanController;
use App\Http\Controllers\DashboardPengaduanController;
use App\Http\Controllers\DashboardKonsultasiController;
use App\Http\Controllers\DashboardPelanggaranController;
use App\Http\Controllers\PelanggaranController;

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
    return view('login.index');
});


Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/siswa', DashboardSiswaController::class);
Route::resource('/dashboard/absensi', DashboardAbsensiController::class);
Route::resource('/dashboard/konsultasi', DashboardKonsultasiController::class);
Route::resource('/dashboard/pengaduan', DashboardPengaduanController::class);
Route::resource('/dashboard/pelanggaran', DashboardPelanggaranController::class);
Route::resource('/dashboard/laporan', DashboardLaporanController::class)->middleware('auth');
