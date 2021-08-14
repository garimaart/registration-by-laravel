<?php

use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
<<<<<<< HEAD
       // \App\User::factory()->time(10)->create();
=======
        \App\User::factory(10)->create();
>>>>>>> 2a33fb5d8eb32c3558ae2f2d8d9e3651883f24f5
    }
}