<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Project;
use Database\Factories\PostFactory;
use Database\Factories\ProjectFactory;
use Faker\Factory;
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
        $this->call([
            CategorySeeder::class,
        ]);
        PostFactory::factoryForModel(Post::class)->count(30)->create();
        ProjectFactory::factoryForModel(Project::class)->count(45)->create();
        // \App\Models\User::factory(10)->create();
    }
}
