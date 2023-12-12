<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use App\Models\User;
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
}
