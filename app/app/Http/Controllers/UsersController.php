<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Settings;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    // Show register form
    public function create() {
        return view('users.register', [
            'threads_number' => Thread::count(),
            'posts_number' => Post::count(),
            'users_number' => User::count(),
            'categories' => Category::all(),
            'settings' => Settings::first(),
            'top_users' => User::orderByDesc('points')->limit(10)->get()
        ]);
    }

    // Show user profile
    public function show(User $user) {
        return view('users.show', [
            'settings' => Settings::first(),
            'user' => $user
        ]);
    }

    // Show login form
    public function login() {
        return view('users.login', [
            'settings' => Settings::first()
        ]);
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return back();
    }

    // Authenticate user
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect()->route('threads.index');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    // Show form to edit user
    public function edit(User $user) {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    // Create new user
    public function store(UserRequest $request) {

        $user = User::create($request->validated());

        auth()->login($user);

        return redirect()
            ->route('threads.index')
            ->with('message', 'User has been created and logged in');
    }

    // Update user data
    public function update(UserRequest $request, User $user) {
        $user->update($request->validated());
        return back()->with('info', 'User has been updated successfully');
    }

    // Delete user
    public function destroy(User $user) {
        $user->delete();
        $user->threads()->delete();
        $user->posts()->delete();
        return back()->with('info', 'User has been deleted successfully');
    }

    // Show user threads
    public function threads(User $user) {
        return view('threads.index', [
            'posts_number' => Post::count(),
            'users_number' => User::count(),
            'threads_number' => Thread::count(),
            'categories' => Category::all(),
            'settings' => Settings::first(),
            'top_users' => User::orderByDesc('points')->limit(10)->get(),
            'threads' => Thread::whereUserId($user->id)->orderByDesc('last_post_date')->get()
        ]);
    }

    // Show user posts
    public function posts(User $user) {
        return view('posts.index', [
            'posts_number' => Post::count(),
            'users_number' => User::count(),
            'threads_number' => Thread::count(),
            'categories' => Category::all(),
            'settings' => Settings::first(),
            'top_users' => User::orderByDesc('points')->limit(10)->get(),
            'posts' => Post::whereUserId($user->id)->latest()->get()
        ]);
    }
}
