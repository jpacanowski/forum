<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThreadsController extends Controller
{
    // Show all threads
    public function index() {
        return view('threads.index', [
            'posts_number' => Post::count(),
            'users_number' => User::count(),
            'threads_number' => Thread::count(),
            'top_users' => User::orderByDesc('points')->limit(10)->get(),
            'threads' => Thread::latest()->get()
        ]);
    }

    // Show thread
    public function single(Thread $thread) {
        $thread->increment('visits');
        return view('threads.single', [
            'posts_number' => Post::count(),
            'users_number' => User::count(),
            'threads_number' => Thread::count(),
            'top_users' => User::orderByDesc('points')->limit(10)->get(),
            'thread' => $thread
        ]);
    }

    // Show form to edit thread
    public function edit(Thread $thread) {
        return view('threads.edit', [
            'thread' => $thread
        ]);
    }

    // Update thread data
    public function update(Request $request, Thread $thread) {
        $formFields = $request->validate([
            'subject' => 'required',
            'status' => 'required',
            'content' => 'required'
        ]);

        $formFields['slug'] = Str::slug($formFields['subject'], '-') . '-' . $thread->id;

        $thread->update($formFields);
        return back()->with('info', 'Thread has been updated successfully');
    }

    // Delete thread
    public function destroy(Thread $thread) {
        $thread->delete();
        $thread->posts()->delete();
        return back()->with('info', 'Thread has been deleted successfully');
    }
}
