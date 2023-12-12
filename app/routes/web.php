<?php

use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
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

Route::prefix('users')->group(function () {

    // Login form
    Route::get('/login', [UsersController::class, 'login'])->name('login')->middleware('guest');

    // Logout user
    Route::post('/logout', [UsersController::class, 'logout'])->name('logout')->middleware('auth');

    // Log in user
    Route::post('/authenticate', [UsersController::class, 'authenticate']);
});

Route::prefix('dashboard')->middleware('auth')->group(function () {

    // Admin panel - home page
    Route::get('/', [AdminController::class, 'index']);
});

Route::get('/', [ThreadsController::class, 'index'])->name('threads.index');
Route::get('/{thread:slug}', [ThreadsController::class, 'single']);

// Show user profile
Route::get('/user/{user:name}', [UsersController::class, 'show']);

// Store post message
Route::post('/posts/{thread:id}', [PostsController::class, 'store']);
