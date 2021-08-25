<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|min:7|exists:users,password',
        ]);
        /*$user = User::where('email', request('email'))->first();
        if (!Hash::check(request('password'), $user->password)) {
            return redirect('login');
        } else {
            if (!Auth::attempt($attributes)) {
                session()->regenerate();
                //return redirect('/')->with('success', 'welcome back!');
                return json_encode(array(
                    "statusCode" => 200
                ));
            } else {
                throw ValidationException::withMessages([
                    'email' => 'your provided credintials could not match'
                ]);
            }
        }*/
        User::create($request->all());
        return json_encode(array(
            "statusCode" => 200
        ));
    }
    public function destroy()
    {
        Auth::logout();

        return redirect('/register')->with('success', 'goodbye');
    }
}
