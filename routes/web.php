<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\BandsController;
use App\Http\Controllers\AlbumsController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('songs', SongController::class);
Route::resource('bands', BandsController::class);
Route::resource('albums', AlbumsController::class);
