<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{
    public function profile(User $user)
    {
        return view('users.profile', compact('user'));
    }
}
