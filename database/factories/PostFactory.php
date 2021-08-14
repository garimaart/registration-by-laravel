<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace Database\Factories;

use App\Post;
use Faker\Factory;
use Faker\Generator as Faker;
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'slug'=>$this->faker->slug(),
            'body'=>$this->faker->paragraph(),
            'excerpt'=>$this->fake->paragraph(),
            'created_at' => now(),
        ];
    }
}

