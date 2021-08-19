<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
      $attributes=request()->validate([
            'email' => 'required|email',
            'password' =>'required|min:7',
        ]);
        if (auth()->attempt($attributes)) {
            return redirect('/')->with('success','welcome back!');
        }
        return back()->withErrors(['email'=>'your provided credentials could not be verified.']);
    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/register')->with('success', 'goodbye');
    }
}
