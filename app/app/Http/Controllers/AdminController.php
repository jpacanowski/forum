<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin panel - home page
    public function index() {
        return view('dashboard.index', [
            'threads_number' => Thread::count(),
            'posts_number' => Post::count(),
            'users_number' => User::count(),
            'php_version' => phpversion()
        ]);
    }

    // Admin panel - threads
    public function threads() {
        return view('dashboard.threads', [
            'threads' => Thread::latest()->get()
        ]);
    }

    // Admin panel - posts
    public function posts() {
        return view('dashboard.posts', [
            'posts' => Post::latest()->get()
        ]);
    }

    // Admin panel - categories
    public function categories() {
        return view('dashboard.categories', [
            'categories' => Category::all()
        ]);
    }

    // Admin panel - about
    public function about() {
        return view('dashboard.about');
    }
}
