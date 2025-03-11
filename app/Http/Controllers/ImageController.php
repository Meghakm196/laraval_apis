<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image; // Use Eloquent Model

class ImageController extends Controller
{
    /**
     * Upload an image and store its path in the database.
     */
    public function upload(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store image in 'storage/app/public/images' and get its relative path
        $imagePath = $request->file('image')->store('images', 'public');

        // Save image path in the database
        $image = Image::create([
            'image_path' => $imagePath, // Store without 'storage/'
        ]);

        return response()->json([
            'message' => 'Image uploaded successfully',
            'image_id' => $image->id,
            'image_url' => asset('storage/' . $image->image_path), // Corrected
        ], 201);
    }

    /**
     * Fetch all images from the database.
     */
    public function index()
    {
        $images = Image::all(); // Use Eloquent instead of DB::table()

        return response()->json([
            'images' => $images->map(function ($image) {
                return [
                    'id' => $image->id,
                    'image_url' => asset('storage/' . $image->image_path),
                ];
            })
        ], 200);
    }
}
