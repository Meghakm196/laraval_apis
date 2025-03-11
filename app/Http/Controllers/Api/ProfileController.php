<?php

// app/Http/Controllers/Api/ProfileController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find($request->user_id);
        $imagePath = $request->file('image')->store('profile_images', 'public');

        // Update the user's profile image in the database
        $user->image = $imagePath;
        $user->save();

        return response()->json(['message' => 'Profile image uploaded successfully', 'image' => $imagePath], 200);
    }

    public function getProfiles()
    {
        $profiles = User::all();
        return response()->json($profiles, 200);
    }
}
