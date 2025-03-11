<?php

// database/seeders/CommentsTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        // Your seeding logic here
        \App\Models\Comment::create([
            'post_id' => 1,
            'user_id' => 1,
            'comment' => 'This is a comment on Post 1.',
        ]);
    }
}
