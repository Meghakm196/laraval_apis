<?php

namespace App\Http\Controllers;  // Add this namespace

use App\Models\Profile;  // Make sure this is properly imported
use App\Http\Controllers\Controller;  // Ensure you are importing the base Controller class
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // Fetch all profiles from the Profile model
        $profiles = Profile::all();
        return response()->json($profiles);  // Return the profiles as a JSON response
    }
}
