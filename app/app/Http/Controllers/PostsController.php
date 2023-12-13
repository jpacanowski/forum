<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    // Show form to edit post
    public function edit(Post $post) {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    // Store post message
    public function store(Request $request, Thread $thread) {
        $formFields = $request->validate([
            'content' => 'required|min:3'
        ]);

        $formFields['user_id'] = Auth::user()->id;
        $formFields['thread_id'] = $thread->id;

        Auth::user()->increment('points', 10);

        Post::create($formFields);

        return back();
    }

    // Update post data
    public function update(Request $request, Post $post) {
        $formFields = $request->validate([
            'content' => 'required'
        ]);

        $post->update($formFields);
        return back()->with('info', 'Post has been updated successfully');
    }

    // Delete post
    public function destroy(Post $post) {
        $post->delete();
        return back()->with('info', 'Post has been deleted successfully');
    }
}
