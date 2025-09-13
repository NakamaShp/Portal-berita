<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('Landing');
Route::get('/about', [AboutController::class, 'index'])->name('About');
Route::get('/news', [NewsController::class, 'index'])->name('News');
