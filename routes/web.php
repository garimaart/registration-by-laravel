<?php

use App\Category;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Translation\Dumper\YamlFileDumper;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest()->with(['category', 'author'])->get()
    ]);
});

/*foreach($files as $file){
       yamlFrontMatter::parseFile($file);
   }

return view('posts',['posts'=>$post]);
    /*$posts=Post::all();
    ddd($posts[0]->ob_get_contents());
    return view('posts',['posts'=>$posts]);
});

Route::get('post/{post}', function ($slug) {
   if(! file_exists( $path= __DIR__.'./../resources/post/{$slug}.html')){
       return redirect('/');
   }

   $post=cache()->remember("posts.{$slug}",1200,function() use ($path){
       return file_get_contents($path);});

    return view('post',[
        'post'=>$post
    ]);
})->where('post','[A-z_\-]+');*/

/*Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest()->get()
    ]);
    // return view('posts',['posts'=>Post::all()]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', ['post' => $post]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', ['posts' => $category->posts]);
});
Route::get('authors/{author:username}',function(User $author){
    return view('posts', [
       'posts'=>$author->posts
   ]);
});*/

Route::get("register", [RegisterController::class, 'create']);
Route::post("register", [RegisterController::class, 'store']);
Route::get("posts", [PostController::class, 'create'])->middleware('guest');
Route::post('posts', [PostController::class, 'store'])->middleware('guest');
Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::get("listing", [RegisterController::class, 'index']);
Route::get("list", [PostController::class, 'index']);
Route::post("list", [PostController::class, 'userdata']);
Route::post("listing", [RegisterController::class, 'userdata']);
Route::get('post', 'BlogPostController@index');
Route::get('detail/{id}', 'BlogPostController@detail');
Route::post('save-comment', 'BlogPostController@save_comment');
Route::get('list/{id}', 'PostController@destroy');
Route::post('edit-post', [PostController::class, 'edit']);
Route::get("customer", [CustomerController::class, 'create']);
Route::post("customer",[CustomerController::class,'store']);
//Route::post('list', [PostController::class, 'store1']);
