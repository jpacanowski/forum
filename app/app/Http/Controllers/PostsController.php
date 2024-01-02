<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostRequest;
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
    public function store(PostRequest $request, Thread $thread) {

        $validated = $request->validated();

        $validated['user_id'] = Auth::user()->id;
        $validated['thread_id'] = $thread->id;

        Auth::user()->increment('points', 10);

        $post = Post::create($validated);

        $thread->update(['last_post_date' => $post->created_at]);

        return back();
    }

    // Update post data
    public function update(PostRequest $request, Post $post) {
        $post->update($request->validated());
        return back()->with('info', 'Post has been updated successfully');
    }

    // Delete post
    public function destroy(Post $post) {
        $post->delete();
        return back()->with('info', 'Post has been deleted successfully');
    }
}
