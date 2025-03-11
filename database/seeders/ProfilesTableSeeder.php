<?php

use App\Models\Profile;

public function run()
{
    Profile::create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'bio' => 'A short bio about John.',
    ]);
    
    Profile::create([
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'bio' => 'A short bio about Jane.',
    ]);
}
