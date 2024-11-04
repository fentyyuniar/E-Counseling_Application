<?php

use App\Http\Controllers\API\AuthAPI;
use App\Http\Controllers\API\KonsultasiAPI;
use App\Http\Controllers\API\PengaduanAPI;
use App\Http\Controllers\API\UserAPI;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/daftar', [AuthController::class, 'daftar']);
// Route::post('/pengaduan', [DashboardPengaduanController::class, 'pengaduan']);
// Route::post('/konsultasi', [DashboardKonsultasiController::class, 'konsultasi']);


// Route::group(['middleware' => ['auth:sanctum']], function() {
//     Route::get('/profile', [APIProfile::class, 'profile']);
// });

Route::post('/register', [AuthAPI::class, 'register']); 
Route::post('/login', [AuthAPI::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    // Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [UserAPI::class, 'profile']);
    // Route::post('/profile_update/{id}', [OrtuController::class, 'update']);
    // Route::get('/anak', [AnakController::class, 'profile']);
    Route::post('/pengaduan/create', [PengaduanAPI::class, 'store']);
    Route::post('/konsultasi/create', [KonsultasiAPI::class, 'store']);
    // Route::post('/anakup/{id}', [AnakController::class, 'update']);
});