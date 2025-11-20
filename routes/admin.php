<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ActivityAdminController;
use App\Http\Controllers\Admin\NewsAdminController;
use App\Http\Controllers\Admin\GalleryAdminController;
use App\Http\Controllers\Admin\DonationAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PrayerTimeAdminController;


// Admin routes with auth middleware
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Activities Management
    Route::resource('activities', ActivityAdminController::class);
    
    // News Management
    Route::resource('news', NewsAdminController::class);
    
    // Gallery Management
    Route::resource('galleries', GalleryAdminController::class);
    
    // Donation Accounts Management
    Route::resource('donations', DonationAdminController::class);

    // Prayers Management 
    Route::post('prayers/refresh', [PrayerTimeAdminController::class, 'refresh'])->name('prayers.refresh');
    Route::resource('prayers', PrayerTimeAdminController::class);
});