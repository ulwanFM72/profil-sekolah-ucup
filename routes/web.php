<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profil', [ProfileController::class, 'index'])->name('profile');

Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/jurusan/{slug}', [JurusanController::class, 'show'])->name('jurusan.show');

Route::get('/ekstrakurikuler', [ExtracurricularController::class, 'index'])->name('extracurricular.index');
Route::get('/ekstrakurikuler/{id}', [ExtracurricularController::class, 'show'])->name('extracurricular.show');

Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery');

Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/prestasi', [AchievementController::class, 'index'])->name('achievement');

/*
|--------------------------------------------------------------------------
| Auth Admin
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Tidak ada lagi halaman login terpisah — cukup modal popup di navbar.
    // Route ini hanya dijaga agar middleware 'guest' bawaan Laravel tetap
    // punya tujuan redirect (route name 'login') yang valid.
    Route::get('/login', function () {
        return redirect()->route('home');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Admin Dashboard (akan dilengkapi CRUD pada tahap berikutnya)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});
