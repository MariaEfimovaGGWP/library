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

    Route::get('/catalog', function () {
        return view('catalog');
    })->name('catalog');

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');

    Route::get('/book/{id}/edit', [BookController::class, 'edit']);
    Route::get('/book/{id}', [BookController::class, 'show']);
    Route::get('/book', [BookController::class, 'create']);

    Route::view('profile', 'profile')->name('profile');
    Route::put('profile',  [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('catalog', 'App\Http\Controllers\CatalogController');

    Route::post('/book', [BookController::class, 'store']);
    Route::post('/reader', [ReaderController::class, 'store'])->name('reader.store');

    Route::put('/book/{id}', [BookController::class, 'update']);
});


require __DIR__.'/auth.php';

