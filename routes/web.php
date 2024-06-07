<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, '__invoke']);

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/', App\Livewire\Posts\Index::class)->name('index');
    Route::get('/{slug}', App\Livewire\Posts\Show::class)->name('show');
});
