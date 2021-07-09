<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReaderController;

Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::get('/book/{id}/edit', [BookController::class, 'edit']);

    Route::get('/book', [BookController::class, 'create']);
    Route::post('/book', [BookController::class, 'store']);
    Route::put('/book/{id}', [BookController::class, 'update']);
    Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('book.destroy');

    Route::view('profile', 'profile')->name('profile');
    Route::put('profile',  [ProfileController::class, 'update'])->name('profile.update');


    Route::delete('/reader/{id}', [ReaderController::class, 'destroy'])->name('reader.destroy');
    Route::post('/reader', [ReaderController::class, 'store'])->name('reader.store');
});

Route::get('/catalog', function () {
    return view('catalog');
})->name('catalog');

Route::resource('catalog', 'App\Http\Controllers\CatalogController');
Route::get('/book/{id}', [BookController::class, 'show']);

require __DIR__.'/auth.php';
