<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|max:100|exists:categories,id',
            'user_id' => 'required|max:255|exists:users,id',
            'slug' => 'required|max:1000|unique:posts,slug',
            'title' => 'required|min:5|max:255',
            'excerpt' => 'required|max:255',
            'body' => 'required|min:70|max:1000',
        ]);

        Post::create($request->all());
        return response()->json([
            "statusCode" => 200
        ]);

        //return redirect('/posts');
    }
}
