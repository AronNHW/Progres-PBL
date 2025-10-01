<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

Route::prefix('pengurus')->name('pengurus.')->group(function () {
  Route::view('/dashboard', 'pengurus.dashboard')->name('dashboard');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::view('/beranda', 'user.beranda')->name('beranda');
    Route::view('/divisi', 'user.divisi')->name('divisi');
    Route::view('/profil', 'user.profil')->name('profil');
    Route::view('/berita', 'user.berita')->name('berita');
    Route::view('/pendaftaran', 'user.pendaftaran')->name('pendaftaran');
    Route::view('/prestasi', 'user.prestasi')->name('prestasi');
    Route::view('/aspirasi', 'user.aspirasi')->name('aspirasi');
});
