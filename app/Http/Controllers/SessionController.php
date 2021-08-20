<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:7',
        ]);

        if (!Auth::attempt($attributes)) {
            session()->regenerate();
            return redirect('/')->with('success', 'welcome back!');
        } else {
            throw ValidationException::withMessages([
                'email' => 'your provided credintials could not match'
            ]);
        }
    }
    public function destroy()
    {
        Auth::logout();

        return redirect('/register')->with('success', 'goodbye');
    }
}
