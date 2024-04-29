<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, '__invoke']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/story', [PostController::class, 'index']);

Route::get('/posts', App\Livewire\Posts\Index::class)->name('posts.index');

Route::get('/posts/{postId}', App\Livewire\Posts\Show::class)->name('posts.show');
