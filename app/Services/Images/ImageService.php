<?php

namespace App\Services\Images;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function addPostPreviewImage(?UploadedFile $image): string
    {
        return Storage::put('/posts/previews', $image);
    }

    public function addPostMainImage(?UploadedFile $image): string
    {
        return Storage::put('/posts/mains', $image);
    }
}
