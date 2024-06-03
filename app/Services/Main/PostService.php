<?php

namespace App\Services\Main;

use App\DTO\Main\PostDTO;
use App\Models\Post;
use App\Repositories\Main\PostRepository;
use App\Services\Images\ImageService;

class PostService
{
    public function __construct(
        private readonly PostRepository $postRepository,
        private readonly ImageService $imageService
    ) {
    }

    public function getPosts()
    {
        return $this->postRepository->getPosts();
    }

    public function createPost(PostDTO $postDTO): void
    {
        if ($postDTO->previewImage()) {
            $previewPath = $this->imageService->addPostPreviewImage($postDTO->previewImage());
            $postDTO->setPreviewImage($previewPath);
        }

        if ($postDTO->mainImage()) {
            $mainPath = $this->imageService->addPostMainImage($postDTO->mainImage());
            $postDTO->setMainImage($mainPath);
        }

        $this->postRepository->createPost($postDTO);
    }

    public function update(Post $post, PostDTO $postDTO)
    {
        $this->imageService->updateImages($post, $postDTO);
        $this->postRepository->updatePost($post, $postDTO);
    }

    public function getDeletedPosts()
    {
        return $this->postRepository->getDeletedPosts();
    }

    public function delete(Post $post): void
    {
        $this->postRepository->deletePost($post);
    }

    public function restore(int $postId)
    {
        $this->postRepository->restorePost($postId);
    }
}
