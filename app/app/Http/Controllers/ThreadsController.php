<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    // Show all threads
    public function index() {
        return view('threads.index', [
            'threads' => Thread::latest()->get()
        ]);
    }
}
