<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

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
            'body' => 'required|min:70|max:1000|unique:posts,body',
        ]);

        Post::createorupdate($request->all());
        return json_encode(array(
            "statusCode" => 200
        ));
    }
    public function index()
    {
        return view('list');
    }
    public function userdata()
    {
        $userData = Post::get();
        return $userData;
    }
    public function storecomment(Request $request)
    {
        $request->validate([
            'comment' => 'required|unique',
            'userid' => 'Auth::id',
            'postid' => 'required|unique:posts,id',
        ]);
        $data = Comment::create($request->all());
        return $data;
    }
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.create', compact('post'));
    }
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $post  = Post::where($where)->first();
      
        return Response()->json($post);
    }
      
    
    public function destroy($id){
   
        Post::find($id)->delete($id);
      
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
    

}

