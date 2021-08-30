<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = \App\Post::all();
        return view('post', ['post' => $posts]);
    }
    public function detail(Request $request, $id)
    {
        $post = \App\Post::find($id);
        return view('post-detail', ['post' => $post]);
    }
    function save_comment(Request $request)
    {
        $data = new \App\Comment;
        $data->post_id = $request->post;
        $data->user_id = $request->user;
        $data->comment = $request->comment;
        $data->save();
        return response()->json([
            'bool' => true
        ]);
    }
}
