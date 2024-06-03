<?php

namespace App\Services\Images;

use App\DTO\Main\PostDTO;
use App\Models\Post;
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

    public function updateImages(Post $post, PostDTO $postDTO): void
    {
        $postDTO->setPreviewImage($postDTO->previewImage() ?
            $this->addPostPreviewImage($postDTO->previewImage()) :
            $post->getPreviewImage());

        $postDTO->setMainImage($postDTO->mainImage() ?
            $this->addPostMainImage($postDTO->mainImage()) :
            $post->getMainImage());
    }
}
