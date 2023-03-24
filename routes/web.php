<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\KCSController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PPSBController;

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

// Main Page
Route::get('/', function () {
    return view('user.home');
});

// Admin Login / Logout
Route::get('/login', [AuthController::class, 'adminlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('loginaction');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Admin
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    // Page Admin Konf
    Route::get('admin', [AdminController::class, 'admin'])->name(('konfig'));
    Route::prefix('/admin')->name('admin.')->group(function() {
        Route::post('/changepass', [AdminController::class, 'changepass'])->name('changepass');
        Route::post('/changeuname', [AdminController::class, 'changeuname'])->name('changeuname');
    });

    // Page Formulir
    Route::get('formulir', [AdminController::class, 'formulir'])->name('formulir');
    Route::prefix('/formulir')->name('formulir.')->group(function () {
        Route::post('/ubah', [AdminController::class, 'ubah'])->name('ubah');
        Route::get('/getKCS/{ppsb_id}', [AdminController::class, 'getKCS']);
    });

    // Page PSB
    Route::prefix('psb')->name('psb.')->group(function () {
        // Proses PSB
        Route::get('/ppsb', [PPSBController::class, 'ppsb'])->name('ppsb');
        Route::prefix('/ppsb')->name('ppsb.')->group(function () {
            Route::get('/input', [PPSBController::class, 'inputppsb'])->name('inputppsb');
            Route::post('/store', [PPSBController::class, 'store'])->name('store');
            Route::post('/status', [PPSBController::class, 'status'])->name('status');
            Route::post('/update', [PPSBController::class, 'update'])->name('update');
            Route::delete('/delete', [PPSBController::class, 'delete'])->name('delete');
        });

        // Kelompok Calon Siswa
        Route::get('/kcs', [KCSController::class, 'kcs'])->name('kcs');
        Route::prefix('/kcs')->name('kcs.')->group(function () {
            Route::get('/input', [KCSController::class, 'inputkcs'])->name('inputkcs');
            Route::post('/store', [KCSController::class, 'store'])->name('store');
            Route::post('/update', [KCSController::class, 'update'])->name('update');
            Route::delete('/delete', [KCSController::class, 'delete'])->name('delete');
        });

        // Calon Siswa
        Route::get('/data', [CalonController::class, 'data'])->name('calon');
        Route::prefix('/data')->name('data.')->group(function () {
            Route::get('/input', [CalonController::class, 'inputcalon'])->name('inputcalon');
            Route::get('/edit/{calon_id}', [CalonController::class, 'editcalon'])->name('editcalon');
            Route::post('/store', [CalonController::class, 'store'])->name('store');
            Route::post('/status', [CalonController::class, 'status'])->name('status');
            Route::post('/update', [CalonController::class, 'update'])->name('update');
            Route::delete('/delete', [CalonController::class, 'delete'])->name('delete');
        });

        // Siswa Lulus
        Route::get('/kelulusan', [CalonController::class, 'kelulusan'])->name('kelulusan');
        Route::prefix('/kelulusan')->name('kelulusan.')->group(function() {
            Route::post('/lulus', [CalonController::class, 'lulus'])->name('lulus');
            Route::post('/tolak', [CalonController::class, 'tolak'])->name('tolak');
        });
    });
});

// Form Daftar
Route::get('/daftar', [PageController::class, 'daftar'])->name('daftar');
Route::get('/daftar/paud', [PageController::class, 'daftarpaud'])->name('daftarpaud');
Route::get('/daftar/tpa', [PageController::class, 'daftartpa'])->name('daftartpa');
Route::get('/daftar/paud', [PageController::class, 'daftarpaud'])->name('daftarpaud');
Route::post('/daftar-store', [PageController::class, 'store'])->name('daftar_action');

// Kelulusan
Route::get('/kelulusan/paud', [PageController::class, 'kelulusanpaud'])->name('kelulusanpaud');
Route::get('/kelulusan/tpa', [PageController::class, 'kelulusantpa'])->name('kelulusantpa');