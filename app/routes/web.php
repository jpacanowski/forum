<?php

use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\UsersController;
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

Route::get('/', [ThreadsController::class, 'index']);
Route::get('/{thread:slug}', [ThreadsController::class, 'single']);
Route::get('/user/{user:name}', [UsersController::class, 'show']);
