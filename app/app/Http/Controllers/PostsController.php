<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    // Store post message
    public function store(Request $request, Thread $thread) {
        $formFields = $request->validate([
            'content' => 'required|min:3'
        ]);

        $formFields['user_id'] = 1;
        $formFields['thread_id'] = $thread->id;

        Post::create($formFields);

        return back();
    }
}
