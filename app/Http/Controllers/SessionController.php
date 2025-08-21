<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }
    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'your provided credentials could not be verified.',
            ]);
        }
    // regenerate the token to prevent session fixation
        request()->session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Goodbye!');
    }

}
