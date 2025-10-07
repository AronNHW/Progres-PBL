<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pengurus\AspirasiController;
use App\Http\Controllers\AspirasiUserController;
use App\Http\Controllers\Pengurus\BeritaController;
use App\Http\Controllers\Pengurus\DashboardController;
use App\Http\Controllers\UserBeritaController;
use App\Http\Controllers\Admin\AspirasiController as AdminAspirasiController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PrestasiController as AdminPrestasiController;
use App\Http\Controllers\UserPrestasiController;
use App\Http\Controllers\Pengurus\PrestasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('aspirasi/print', [AdminAspirasiController::class, 'printPdf'])->name('aspirasi.printPdf');
    Route::resource('aspirasi', AdminAspirasiController::class)->only(['index', 'show', 'destroy']);
    Route::resource('berita', AdminBeritaController::class);
    Route::resource('prestasi', AdminPrestasiController::class)->except(['create', 'show', 'edit']);
    Route::view('/mahasiswa-bermasalah', 'admin.bermasalah.index')->name('mahasiswa-bermasalah');
});

Route::prefix('pengurus')->name('pengurus.')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('aspirasi/print', [AspirasiController::class, 'printPdf'])->name('aspirasi.printPdf');
  Route::resource('aspirasi', AspirasiController::class)->only(['index', 'show', 'destroy']);
  Route::resource('berita', BeritaController::class);
  Route::resource('prestasi', PrestasiController::class)->except(['create', 'show', 'edit']);
});

Route::prefix('user')->name('user.')->group(function () {
    Route::view('/beranda', 'user.beranda')->name('beranda');
    Route::view('/divisi', 'user.divisi')->name('divisi');
    Route::view('/profil', 'user.profil')->name('profil');
    Route::get('/berita', [UserBeritaController::class, 'index'])->name('berita');
    Route::get('/berita/{berita}', [UserBeritaController::class, 'show'])->name('berita.show');
    Route::post('/berita/{berita}/komentar', [UserBeritaController::class, 'storeKomentar'])->name('komentar.store');
    Route::view('/pendaftaran', 'user.pendaftaran')->name('pendaftaran');
    Route::get('/prestasi', [UserPrestasiController::class, 'index'])->name('prestasi');
    Route::view('/aspirasi', 'user.aspirasi')->name('aspirasi');
    Route::post('/aspirasi', [AspirasiUserController::class, 'store'])->name('aspirasi.store');
});