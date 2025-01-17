<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

// Admin Routes
Route::prefix('admin')
	->middleware(['auth', 'admin'])
	->as('admin.')
	->group(function () {
		Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
	});

Route::resource('categories', CategoryController::class);

Route::resource('products', ProductController::class);
Route::get('products/sort/{category}', [ProductController::class, 'filterByCategory'])->name('products.filter');

// Home Route
Route::get('/', function () {
	return view('welcome');
});

// Dashboard Route (for all authenticated users, except admins)
Route::get('/dashboard', function () {
	if (auth()->user()->role === 'admin') {
		return redirect()->route('admin.dashboard');
	}
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Product Routes (for all users)
// Route::middleware('auth')->group(function () {
// 	Route::resource('products', ProductController::class);
// 	Route::get('products/sort/{category}', [ProductController::class, 'filterByCategory'])->name('products.filter');
// });

// Profile Routes
Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';