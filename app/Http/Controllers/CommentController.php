<?php

namespace App\Http\Controllers;

use App\Models\Comment;  // Add this line to import the Comment model
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Method to fetch all comments
    public function index()
    {
        $comments = Comment::all();  // Fetch all comments from the database
        return response()->json($comments);  // Return comments as a JSON response
    }
}
