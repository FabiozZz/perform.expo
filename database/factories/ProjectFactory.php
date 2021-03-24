<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        $category = random_int(1, 2);
        $square = rand(10, 300);
        $price = rand(10000, 20000000);
        $title = $this->faker->unique()->realText(15);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->realText(1000),
            'except'=>$this->faker->realText(200),
            'is_published'=> random_int(0,1) ? true : false,
            'carousel'=> 0,
            'category_id' => $category,
            'square' => $square,
            'price' => $price,
        ];
    }
}
