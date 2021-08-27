<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        return response()->json($post->comments()->with('user')->latest()->get());
    }

    public function storeComments(Request $request)
    {
        $post = Post::all();
        $this->validate($request, [
            'comment' => 'required|max:1000'
        ]);

        $comment = new Comment();
        $comment->body = $request->comment;
        $post = new Post();
        $post->id = $request->post_id;
        $post->comments()->save($comment);
        return view('posts', compact('post'));
    }
}
