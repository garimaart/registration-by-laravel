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
