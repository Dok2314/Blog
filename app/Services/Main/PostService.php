<?php

namespace App\Services\Main;

use App\DTO\Main\PostDTO;
use App\Models\Post;
use App\Repositories\Main\PostRepository;

class PostService
{
    public function __construct(private readonly PostRepository $postRepository)
    {
    }

    public function getPosts()
    {
        return $this->postRepository->getPosts();
    }

    public function createPost(PostDTO $postDTO): void
    {
        $this->postRepository->createPost($postDTO);
    }

    public function update(Post $post, PostDTO $postDTO)
    {
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
