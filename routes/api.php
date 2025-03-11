<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;

Route::get('/profiles', [ProfileController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/comments', [CommentController::class, 'index']);
Route::post('/images/upload', [ImageController::class, 'upload']);  // Upload image
Route::get('/images', [ImageController::class, 'index']); 

