<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Settings;
use App\Http\Requests\ThreadRequest;
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
            'settings' => Settings::first(),
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
            'settings' => Settings::first(),
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
            'settings' => Settings::first(),
            'top_users' => User::orderByDesc('points')->limit(10)->get()
        ]);
    }

    // Store thread
    public function store(ThreadRequest $request) {

        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['subject'], '-');
        $validated['last_post_date'] = Carbon::now()->toDateTimeString();
        $validated['user_id'] = Auth::user()->id;

        $thread = Thread::create($validated);
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
    public function update(ThreadRequest $request, Thread $thread) {

        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['subject'], '-') . '-' . $thread->id;

        $thread->update($validated);
        return back()->with('info', 'Thread has been updated successfully');
    }

    // Delete thread
    public function destroy(Thread $thread) {
        $thread->delete();
        $thread->posts()->delete();
        return back()->with('info', 'Thread has been deleted successfully');
    }
}
