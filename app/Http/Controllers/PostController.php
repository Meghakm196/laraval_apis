<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller  // Correct the typo here
{
    // Method to fetch all posts
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);  // Return posts as a JSON response
    }
}
