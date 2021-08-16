<?php

use App\Category;
use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();
        Category::truncate();


       $user=User::factory()->create();
       $personal=Category::create([
           'name'=>'Personal',
           'slug'=>'personal'
       ]);

      $family= Category::create([
           'name'=>'Family',
           'slug'=>'family'
       ]);

       Post::create([
           'user_id'=>$user->id,
           'category_id'=>$family->id,
           'title'=>'First post',
           'slug'=>'my_first_post',
           'excerpt'=>'lorem ipusum dolar sit amet',
           'body'=>'sdghadjheudyasfdghsfhjahsjhasjdef'

       ]);
       Post::create([
        'user_id'=>$user->id,
        'category_id'=>$personal->id,
        'title'=>'Second post',
        'slug'=>'my_second_post',
        'excerpt'=>'lorem ipusum dolar sit amet',
        'body'=>'sfghfhjuikyiliutyrtesdxcxbvmhkgjfgsdaa'

    ]);
      }
}