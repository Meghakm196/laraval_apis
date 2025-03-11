<?php

use App\Models\Image;

public function run()
{
    Image::create([
        'image_path' => 'images/image1.jpg',
    ]);
    
    Image::create([
        'image_path' => 'images/image2.jpg',
    ]);
}

