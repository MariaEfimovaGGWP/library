<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\BookController;

Route::get('/', [CatalogController::class, 'index']);
Route::get('/catalog', [CatalogController::class, 'index']);

Route::post('/book', [BookController::class, 'store']);
Route::get('/book/create', [BookController::class, 'create']);
Route::get('/book/{id}', [BookController::class, 'show']);
