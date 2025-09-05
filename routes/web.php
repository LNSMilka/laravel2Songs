<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('albums', AlbumController::class);
    Route::resource('songs', SongController::class);
    Route::resource('bands', BandController::class);
});
Route::resource('bands', BandController::class)->only(['index', 'show']);
Route::resource('albums', AlbumController::class)->only(['index', 'show']);
Route::resource('songs', SongController::class)->only(['index', 'show']);
require __DIR__.'/auth.php';
