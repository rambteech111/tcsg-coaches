<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoachController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CoachController::class, 'home'])->name('home');
Route::get('/coaches', [CoachController::class, 'index'])->name('coaches.index');
Route::get('/coaches/{slug}', [CoachController::class, 'show'])->name('coaches.show');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');

    Route::middleware('admin')->group(function () {
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/coaches/{coach}', [AdminController::class, 'show'])->name('admin.show');
    });
});
