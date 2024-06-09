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
        $post = Post::create($postDTO->toArray());
        $post->tags()->attach($postDTO->getTags());
    }

    public function updatePost($post, PostDTO $postDTO): void
    {
        $post->update($postDTO->toArray());
        $post->tags()->sync($postDTO->getTags());
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

    public function getPaginatedPosts(int $perPage = 10)
    {
        return Post::paginate($perPage);
    }
}
