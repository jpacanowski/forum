<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // Show user
    public function show(User $user) {
        return view('users.show', [
            'user' => $user
        ]);
    }
}
