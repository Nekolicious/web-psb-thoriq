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
    Route::prefix('/admin')->name('admin.')->group(function () {
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

            Route::prefix('/input')->name('input.')->group(function () {
                Route::get('/paud', [CalonController::class, 'inputpaud'])->name('paud');
                Route::get('/tpa', [CalonController::class, 'inputtpa'])->name('tpa');
            });
            Route::get('/paud/edit/{calon_id}', [CalonController::class, 'editcalonpaud'])->name('editcalonpaud');
            Route::get('/tpa/edit/{calon_id}', [CalonController::class, 'editcalontpa'])->name('editcalontpa');
            Route::get('/paud/view/{calon_id}', [CalonController::class, 'lihatcalonpaud'])->name('lihatcalonpaud');
            Route::get('/tpa/view/{calon_id}', [CalonController::class, 'lihatcalontpa'])->name('lihatcalontpa');

            // PAUD
            Route::post('/storepaud', [CalonController::class, 'storepaud'])->name('storepaud');
            Route::post('/updatepaud', [CalonController::class, 'updatepaud'])->name('updatepaud');
            // TPA
            Route::post('/storetpa', [CalonController::class, 'storetpa'])->name('storetpa');
            Route::post('/updatetpa', [CalonController::class, 'updatetpa'])->name('updatetpa');

            Route::post('/status', [CalonController::class, 'status'])->name('status');
            Route::delete('/delete', [CalonController::class, 'delete'])->name('delete');
        });

        // Siswa Lulus
        Route::get('/kelulusan', [CalonController::class, 'kelulusan'])->name('kelulusan');
        Route::prefix('/kelulusan')->name('kelulusan.')->group(function () {
            Route::post('/lulus', [CalonController::class, 'lulus'])->name('lulus');
            Route::post('/tolak', [CalonController::class, 'tolak'])->name('tolak');
        });
    });
});

// Form Daftar
Route::get('/daftar', [PageController::class, 'daftar'])->name('daftar');
Route::get('/daftar/paud', [PageController::class, 'daftarpaud'])->name('daftarpaud');
Route::get('/daftar/tpa', [PageController::class, 'daftartpa'])->name('daftartpa');
Route::post('/daftarpaud-store', [PageController::class, 'storepaud'])->name('daftarpaud_action');
Route::post('/daftartpa-store', [PageController::class, 'storetpa'])->name('daftartpa_action');
Route::get('/daftar-sukses', [PageController::class, 'sukses'])->name('sukses');

// Kelulusan
Route::get('/kelulusan/paud', [PageController::class, 'kelulusanpaud'])->name('kelulusanpaud');
Route::get('/kelulusan/tpa', [PageController::class, 'kelulusantpa'])->name('kelulusantpa');
