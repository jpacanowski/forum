<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // Show register form
    public function create() {
        return view('users.register', [
            'threads_number' => Thread::count(),
            'posts_number' => Post::count(),
            'users_number' => User::count(),
            'categories' => Category::all(),
            'top_users' => User::orderByDesc('points')->limit(10)->get()
        ]);
    }

    // Show user profile
    public function show(User $user) {
        return view('users.show', [
            'user' => $user
        ]);
    }

    // Show login form
    public function login() {
        return view('users.login');
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

    // Create new user
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect()
            ->route('threads.index')
            ->with('message', 'User has been created and logged in');
    }
}
