<?php

// database/seeders/PostsTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => 'Sample Post 1',
            'content' => 'This is the content of post 1.',
            'user_id' => 1,  // Make sure the user exists in your users table
        ]);

        Post::create([
            'title' => 'Sample Post 2',
            'content' => 'This is the content of post 2.',
            'user_id' => 2,  // Same for this user
        ]);
    }
}
