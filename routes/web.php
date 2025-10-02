<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pengurus\AspirasiController;
use App\Http\Controllers\AspirasiUserController;
use App\Http\Controllers\Pengurus\BeritaController;
use App\Http\Controllers\Pengurus\DashboardController;
use App\Http\Controllers\UserBeritaController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

Route::prefix('pengurus')->name('pengurus.')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('aspirasi/print', [AspirasiController::class, 'printPdf'])->name('aspirasi.printPdf');
  Route::resource('aspirasi', AspirasiController::class)->only(['index', 'show', 'destroy']);
  Route::resource('berita', BeritaController::class);
});

Route::prefix('user')->name('user.')->group(function () {
    Route::view('/beranda', 'user.beranda')->name('beranda');
    Route::view('/divisi', 'user.divisi')->name('divisi');
    Route::view('/profil', 'user.profil')->name('profil');
    Route::get('/berita', [UserBeritaController::class, 'index'])->name('berita');
    Route::view('/pendaftaran', 'user.pendaftaran')->name('pendaftaran');
    Route::view('/prestasi', 'user.prestasi')->name('prestasi');
    Route::view('/aspirasi', 'user.aspirasi')->name('aspirasi');
    Route::post('/aspirasi', [AspirasiUserController::class, 'store'])->name('aspirasi.store');
});
