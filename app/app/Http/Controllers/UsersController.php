<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
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
}
