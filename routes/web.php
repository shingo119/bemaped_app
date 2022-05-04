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
Route::get('/test', [SpotController::class, 'test'])->name('test');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [SpotController::class, 'search'])->name('search');
Route::post('/category', [SpotController::class, 'category'])->name('category');

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/view', [SpotController::class, 'view'])->name('view');
Route::get('/mapping', [SpotController::class, 'mapping'])->name('mapping');
Route::post('/store', [SpotController::class, 'store'])->name('store');

Route::get('/mapping_map', [SpotController::class, 'mapping_map'])->name('mapping_map');
Route::get('/profile_edit', [SpotController::class, 'profile_edit'])->name('profile_edit');
Route::post('/profile_store', [SpotController::class, 'profile_store'])->name('profile_store');