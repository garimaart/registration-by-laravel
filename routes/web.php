<?php

use App\Category;
use App\Post;
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



/*Route::get('/',function(){
   $files=File::files(resource_path("posts"));

   foreach($files as $file){
       yamlFrontMatter::parseFile($file);
   }

return view('posts',['posts'=>$post]);
    /*$posts=Post::all();
    ddd($posts[0]->ob_get_contents());
    return view('posts',['posts'=>$posts]);
});*/

/*Route::get('post/{post}', function ($slug) {
   if(! file_exists( $path= __DIR__.'./../resources/post/{$slug}.html')){
       return redirect('/');
   }

   $post=cache()->remember("posts.{$slug}",1200,function() use ($path){
       return file_get_contents($path);});

    return view('post',[
        'post'=>$post
    ]);
})->where('post','[A-z_\-]+');*/
Route::get('/',function(){
   return view('posts',['posts'=>Post::with('category')->get()
]);
  // return view('posts',['posts'=>Post::all()]);
});

Route::get('posts/{post}',function(Post $post){
    return view('post',['post'=>$post]);
});

Route::get('categories/{category}',function(Category $category){
    return view('posts',['posts'=>$category->posts]);
});

