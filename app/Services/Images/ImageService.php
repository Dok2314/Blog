<?php

namespace App\Services\Images;

use App\DTO\Main\PostDTO;
use App\Models\Post;
use Illuminate\Http\UploadedFile;

class ImageService
{
    public function addPostPreviewImage(?UploadedFile $image): string
    {
        $path = $image->store('posts/previews', 'public');
        return $path;
    }

    public function addPostMainImage(?UploadedFile $image): string
    {
        $path = $image->store('posts/mains', 'public');
        return $path;
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
