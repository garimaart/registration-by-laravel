<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:5',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7',
        ]);

        $attributes['password'] = bcrypt($attributes['password']);
        $user = User::create($attributes);
        return json_encode(array(
            "statusCode" => 200
        ));
        Auth::login($user);

        // return redirect('/register')->with('success','your account has been created');
    }
}