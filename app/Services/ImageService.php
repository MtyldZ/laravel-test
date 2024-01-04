<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Topic;

class ImageService
{
    public function saveImage($image)
    {
        $fileName = time() . '.' . $image->extension();
        $image->storeAs('public/images', $fileName);

        return $fileName;
    }
}

