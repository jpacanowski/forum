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

    // Admin panel - index
    Route::get('/', [AdminController::class, 'index'])->name('dashboard.index');

    // Admin panel - threads
    Route::get('/threads', [AdminController::class, 'threads'])->name('dashboard.threads');

    // Admin panel - form to edit thread
    Route::get('/thread/edit/{thread:id}', [ThreadsController::class, 'edit'])->name('threads.edit');

    // Admin panel - posts
    Route::get('/posts', [AdminController::class, 'posts'])->name('dashboard.posts');

    // Admin panel - form to edit post
    Route::get('/post/edit/{post:id}', [PostsController::class, 'edit'])->name('posts.edit');
});

Route::get('/', [ThreadsController::class, 'index'])->name('threads.index');


// Show thread
Route::get('/{thread:slug}', [ThreadsController::class, 'single']);

// Update thread
Route::put('/threads/{thread:id}', [ThreadsController::class, 'update']);

// Delete thread
Route::delete('/threads/{thread:id}', [ThreadsController::class, 'destroy']);


// Store post
Route::post('/posts/{thread:id}', [PostsController::class, 'store']);

// Update post
Route::put('/posts/{post:id}', [PostsController::class, 'update']);

// Delete post
Route::delete('/posts/{post:id}', [PostsController::class, 'destroy']);


// Show user profile
Route::get('/user/{user:name}', [UsersController::class, 'show']);
