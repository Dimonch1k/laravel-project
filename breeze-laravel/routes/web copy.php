<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MyFeedbackController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('contacts', [MainController::class, 'contacts'])->name('contacts');
Route::post('send-message', [MainController::class, 'sendEmail'])->name('send-message');

// ->middleware('auth')

Route::prefix('admin')->group(function () {
	Route::resource('admin/categories', CategoryController::class);
	Route::resource('admin/products', ProductController::class);
});




//------------------------------------------------------------------
// HOMEWORK ROUTES
//------------------------------------------------------------------

// Feedback routes
Route::get('/feedback', [FeedbackController::class, 'showForm'])->name('feedback.form');
Route::post('/feedback', [FeedbackController::class, 'submitForm'])->name('feedback.submit');

// My feedback CRUD
Route::resource('/admin/my-feedbacks', MyFeedbackController::class);