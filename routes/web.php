<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SubtaskPDFController;

Route::get('/', [HomeController::class, '__invoke']);

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/', App\Livewire\Posts\Index::class)->name('index');
    Route::get('/{slug}', App\Livewire\Posts\Show::class)->name('show');
});

Route::get('/generate-pdf/{subtask}', [SubtaskPDFController::class, 'generatePDF'])->name('generate-pdf');

