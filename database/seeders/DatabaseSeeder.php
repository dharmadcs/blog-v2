<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        // User::create([
        //     'name' => 'Dharmaji',
        //     'username' => 'dharma',
        //     'email' => 'dharma@gmail.com',
        //     'password' => bcrypt(123)
        // ]);

        User::factory(2)->create();
        Post::factory(30)->create();

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        // Category::create([
        //     'name' => 'PHP',
        //     'slug' => 'php'
        // ]);

        // Category::create([
        //     'name' => 'JavaScript',
        //     'slug' => 'javascript'
        // ]);


        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => "Personal",
            'slug' => 'personal'
        ]);
    }
}
