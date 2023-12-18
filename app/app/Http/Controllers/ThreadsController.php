<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ThreadsController extends Controller
{
    // Show all threads
    public function index() {
        return view('threads.index', [
            'posts_number' => Post::count(),
            'users_number' => User::count(),
            'threads_number' => Thread::count(),
            'categories' => Category::all(),
            'top_users' => User::orderByDesc('points')->limit(10)->get(),
            'threads' => Thread::filter(request(['search']))->orderByDesc('last_post_date')->get()
        ]);
    }

    // Show thread
    public function single(Thread $thread) {
        $thread->increment('visits');
        return view('threads.single', [
            'posts_number' => Post::count(),
            'users_number' => User::count(),
            'threads_number' => Thread::count(),
            'categories' => Category::all(),
            'top_users' => User::orderByDesc('points')->limit(10)->get(),
            'thread' => $thread
        ]);
    }

    // Create new thread (form)
    public function create() {
        return view('threads.create', [
            'posts_number' => Post::count(),
            'users_number' => User::count(),
            'threads_number' => Thread::count(),
            'categories' => Category::all(),
            'top_users' => User::orderByDesc('points')->limit(10)->get()
        ]);
    }

    // Store thread
    public function store(Request $request) {
        $formFields = $request->validate([
            'subject' => 'required|min:3',
            'content' => 'required|min:3',
            'category_id' => 'required'
        ]);

        $formFields['slug'] = Str::slug($formFields['subject'], '-');
        $formFields['last_post_date'] = Carbon::now()->toDateTimeString();
        $formFields['user_id'] = Auth::user()->id;

        $thread = Thread::create($formFields);
        $thread->update(['slug' => $thread->slug . '-' . $thread->id]);

        Auth::user()->increment('points', 20);

        return redirect()->route('threads.index');
    }

    // Show form to edit thread
    public function edit(Thread $thread) {
        return view('threads.edit', [
            'categories' => Category::all(),
            'thread' => $thread
        ]);
    }

    // Update thread data
    public function update(Request $request, Thread $thread) {
        $formFields = $request->validate([
            'subject' => 'required',
            'status' => 'required',
            'category_id' => 'required',
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
