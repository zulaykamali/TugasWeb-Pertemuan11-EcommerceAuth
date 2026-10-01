<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| General Authenticated Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard', [
            'message' => 'Selamat datang di halaman Admin.',
            'role' => 'Administrator',
        ]);
    })->name('admin.dashboard');
});

/*
|--------------------------------------------------------------------------
| Editor Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:editor'])->group(function () {
    Route::get('/editor', function () {
        return view('dashboard', [
            'message' => 'Selamat datang di halaman Editor.',
            'role' => 'Editor',
        ]);
    })->name('editor.dashboard');
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', function () {
        return view('dashboard', [
            'message' => 'Selamat datang di halaman User.',
            'role' => 'User',
        ]);
    })->name('user.dashboard');
});

/*
|--------------------------------------------------------------------------
| Post Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
});

/*
|--------------------------------------------------------------------------
| Profile Routes - Breeze
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes - Breeze
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
