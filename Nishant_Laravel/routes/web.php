<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WelcomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::resource('product', ProductController::class);
Route::resource('welcome', WelcomeController::class);
Route::resource('admin', AdminController::class);
Route::resource('category', CategoryController::class);
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
