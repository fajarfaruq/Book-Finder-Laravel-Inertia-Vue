<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'Index']);
Route::get('/books/search', [BookController::class, 'searchBooks'])->name('.search-books');
Route::post('/books/vote', [BookController::class, 'voteBooks'])->name('.vote-books');;

Route::get('login', [LoginController::class, 'login'])->name('login');

Route::prefix('auth')->name('auth')->group(function () {
	Route::get('login', [LoginController::class, 'index'])->name('.login');
	Route::post('login', [LoginController::class, 'login'])->name('.login');
	Route::post('logout', [LoginController::class, 'logout'])->name('.logout');
	Route::get('logout', [LoginController::class, 'logout'])->name('.logout');
});

Route::middleware('LoginVerification')->prefix('admin')->name('admin')->group(function () {
	Route::get('/', [DashboardController::class, 'index'])->name('.index');
	Route::prefix('books')->name('.books')->group(function () {
		Route::get('/', [BookController::class, 'index'])->name('.index');
		Route::get('search', [BookController::class, 'searchBooks'])->name('.search-books');
		Route::get('list-books', [BookController::class, 'listBooks'])->name('.list-books');
		Route::post('insert-books', [BookController::class, 'insertBooks'])->name('.insert-books');
		Route::put('update-books', [BookController::class, 'updateBooks'])->name('.update-books');
		Route::delete('delete-books', [BookController::class, 'deleteBooks'])->name('.delete-books');
	});
});