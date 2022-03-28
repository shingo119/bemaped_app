<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpotController;

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

Route::get('/', [SpotController::class, 'index'])->name('index');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/search', [SpotController::class, 'search'])->name('search');
Route::post('/category', [SpotController::class, 'category'])->name('category');

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/view', [SpotController::class, 'view'])->name('view');