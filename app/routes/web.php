<?php

use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
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

    // Register user (form)
    Route::get('/register', [UsersController::class, 'create']);
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

    // Admin panel - categories
    Route::get('/categories', [AdminController::class, 'categories'])->name('dashboard.categories');

    // Admin panel - create new category (form)
    Route::get('/categories/create', [CategoriesController::class, 'create']);

    // Admin panel - form to edit category
    Route::get('/categories/edit/{category:id}', [CategoriesController::class, 'edit'])->name('categories.edit');
});

Route::get('/', [ThreadsController::class, 'index'])->name('threads.index');


// Create new thread (form)
Route::get('/thread', [ThreadsController::class, 'create']);

// Show thread
Route::get('/{thread:slug}', [ThreadsController::class, 'single']);

// Store thread
Route::post('/threads', [ThreadsController::class, 'store']);

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

// Show user threads
Route::get('/user/{user:name}/threads', [UsersController::class, 'threads']);

// Show user posts
Route::get('/user/{user:name}/posts', [UsersController::class, 'posts']);

// Create new user
Route::post('/users', [UsersController::class, 'store']);


// Show threads by category
Route::get('/categories/{slug}', [CategoriesController::class, 'index']);

// Store category
Route::post('/categories', [CategoriesController::class, 'store']);

// Update category
Route::put('/categories/{category:id}', [CategoriesController::class, 'update']);

// Delete category
Route::delete('/categories/{category:id}', [CategoriesController::class, 'destroy']);
