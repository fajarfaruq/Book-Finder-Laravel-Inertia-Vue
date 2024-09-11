<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'Index']);

Route::prefix('auth')->name('auth')->group(function () {
	Route::get('login', [LoginController::class, 'Index'])->name('auth.login');
});

Route::prefix('admin')->name('admin')->group(function () {
	Route::get('/', [DashboardController::class, 'Index'])->name('admin.index');
	Route::prefix('book')->name('admin.book')->group(function () {
		Route::get('/', [BookController::class, 'Index'])->name('admin.book.index');
	});
});