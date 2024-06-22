<?php

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

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TransactionController;

// Category routes
Route::resource('categories', CategoryController::class);

// Material routes
Route::resource('materials', MaterialController::class);

// Transaction routes
Route::resource('transactions', TransactionController::class);
