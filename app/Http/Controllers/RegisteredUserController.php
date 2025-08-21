<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }
    public function store()
    {
        $validated = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 
            // Password::min(8)->letters()->numbers()->symbols(),
             'confirmed'],
        ]);
     
        $user = User::create($validated);
        Auth::login($user);
        return redirect('/')->with('success', 'Your account has been created.');
    }

}