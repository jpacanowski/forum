<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // Show threads by category
    public function index(String $category) {
        $category = Category::whereSlug($category)->first();
        return view('threads.index', [
            'posts_number' => Post::count(),
            'users_number' => User::count(),
            'threads_number' => Thread::count(),
            'categories' => Category::all(),
            'top_users' => User::orderByDesc('points')->limit(10)->get(),
            'threads' => $category->threads()->orderByDesc('last_post_date')->get()
        ]);
    }
}
