<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // \App\User::factory()->time(10)->create();
    /* DB::table('users')->insert([
        'name' => Str::random(10), 
        'email' => Str::random(10).'@gmail.com',
        'password' => Hash::make('password'),]);*/
  }
}
