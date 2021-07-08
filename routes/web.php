<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [CatalogController::class, 'index']);
Route::get('/catalog', [CatalogController::class, 'index']);

Route::get('/book/create', [BookController::class, 'create']);
Route::get('/book/{id}/edit', [BookController::class, 'edit']);
Route::get('/book/{id}', [BookController::class, 'show']);
Route::get('/book', [BookController::class, 'create']);

Route::post('/book', [BookController::class, 'store']);

Route::put('/book/{id}', [BookController::class, 'update']);
