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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


Route::get('admin/restore/{id}', [App\Http\Controllers\AdminController::class, 'restore'])->name('admin.restore');
Route::get('admin/fdelete/{id}', [App\Http\Controllers\AdminController::class, 'fdelete'])->name('admin.fdelete');

Route::get('product/restore/{id}', [App\Http\Controllers\ProductController::class, 'restore'])->name('product.restore');
Route::get('product/fdelete/{id}', [App\Http\Controllers\ProductController::class, 'fdelete'])->name('product.fdelete');

Route::get('category/restore/{id}', [App\Http\Controllers\CategoryController::class, 'restore'])->name('category.restore');
Route::get('category/fdelete/{id}', [App\Http\Controllers\CategoryController::class, 'fdelete'])->name('category.fdelete');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');