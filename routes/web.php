<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'Index']);

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
	});
});