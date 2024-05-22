<?php

namespace App\Repositories\Main;

use App\DTO\Main\PostDTO;
use App\Models\Post;

class PostRepository
{
    public function getPosts()
    {
        return Post::all();
    }

    public function createPost(PostDTO $postDTO): void
    {
        Post::create($postDTO->toArray());
    }

    public function updatePost($post, PostDTO $postDTO): void
    {
        $post->update($postDTO->toArray());
    }

    public function getDeletedPosts()
    {
        return Post::onlyTrashed()->get();
    }

    public function deletePost(Post $post)
    {
        $post->delete();
    }

    public function restorePost(int $postId): void
    {
        Post::withTrashed()->find($postId)->restore();
    }
}
