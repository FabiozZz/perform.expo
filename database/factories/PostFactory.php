<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->realText(10);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->realText(1000),
            'except'=>$this->faker->realText(200),
            'is_published'=> rand(0,1) ? true : false,
        ];
    }
}
