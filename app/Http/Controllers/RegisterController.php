<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\all;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|min:5|unique:users,name',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|unique:users,password',
        ]);
        User::create($request->all());
        return json_encode(array(
            "statusCode" => 200
        ));
    }

    public function index()
    {
        return view('listing');
    }
    public function userdata()
    {
        $userData = User::get();
        return $userData;
    }
}
