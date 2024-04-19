<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoryController;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/story', [StoryController::class, 'index']);
