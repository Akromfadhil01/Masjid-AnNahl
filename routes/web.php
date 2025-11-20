<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrayerTimeController;
use App\Http\Controllers\Admin\ScheduleAdminController;
use App\Models\PrayerTime;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes - Website Masjid
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/jadwal', [HomeController::class, 'jadwal'])->name('jadwal');
Route::get('/kegiatan', [HomeController::class, 'kegiatan'])->name('kegiatan');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/berita/{id}', [HomeController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri');
Route::get('/donasi', [HomeController::class, 'donasi'])->name('donasi');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('schedules', ScheduleAdminController::class)->except(['show']);
});

Route::get('/jadwal-sholat', [ScheduleAdminController::class, 'getPrayerTimes'])->name('jadwal.sholat');

Route::get('/jadwal', [PrayerTimeController::class, 'index'])->name('jadwal'); // default
Route::get('/jadwal-dark', [PrayerTimeController::class, 'index'])->name('jadwal.dark');
Route::get('/jadwal-swipe', [PrayerTimeController::class, 'index'])->name('jadwal.swipe');
Route::get('/jadwal-islami', [PrayerTimeController::class, 'index'])->name('jadwal.islami');
// Authentication Routes
require __DIR__.'/auth.php';

// Admin Routes (protected by auth middleware)
require __DIR__.'/admin.php';