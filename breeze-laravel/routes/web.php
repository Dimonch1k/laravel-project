<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// MY APIs

// Route::get('/', [MainController::class, 'index'])->name('home');
// Route::get('contacts', [MainController::class, 'contacts'])->name('contacts');
// Route::post('send-message', [MainController::class, 'sendEmail'])->name('send-message');

// Route::prefix('admin')->group(function () {
// 	Route::resource('admin/categories', CategoryController::class);
// 	Route::resource('admin/products', ProductController::class);
// });


// BREEZE APIs
Route::get('/', function () {
	return view('welcome');
});

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware('auth')->as('admin.')->group(function () {
	Route::resource('categories', CategoryController::class);
	Route::resource('products', ProductController::class);
});

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';