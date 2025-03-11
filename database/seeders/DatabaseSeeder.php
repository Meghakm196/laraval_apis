<?php

// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PostsTableSeeder;
use Database\Seeders\CommentsTableSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PostsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);  // Make sure CommentsTableSeeder is called after PostsTableSeeder
    }
}
