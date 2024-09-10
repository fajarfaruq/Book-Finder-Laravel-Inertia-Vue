<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'Index']);

Route::prefix('auth')->group(function () {
	Route::get('login', [LoginController::class, 'Index']);
});

Route::prefix('admin')->group(function () {
	Route::get('/', [DashboardController::class, 'Index']);
	Route::prefix('book')->group(function () {
		Route::get('/', [BookController::class, 'Index']);
	});
});