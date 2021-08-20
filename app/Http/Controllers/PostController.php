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
    public function store()
    {
        $attributes = request()->validate([
            'category_id' => 'required|max:100',
            'user_id' => 'required|max:255',
            'slug' => 'required|max:1000|unique:posts,slug',
            'title' => 'required|min:5|max:255',
            'excerpt' => 'required|max:255',
            'body' => 'required|min:70|max:1000',
        ]);

        Post::create($attributes);
        return json_encode(array(
            "statusCode" => 200
        ));

        //return redirect('/posts');
    }
}
