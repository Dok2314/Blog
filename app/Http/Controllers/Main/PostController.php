<?php

namespace App\Http\Controllers\Main;

use App\DTO\Main\PostDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Main\PostStoreRequest;
use App\Http\Requests\Main\UpdatePostRequest;
use App\Models\Post;
use App\Services\Main\CategoryService;
use App\Services\Main\PostService;
use Exception;

class PostController extends Controller
{
    public function __construct(
        private readonly PostService $postService,
        private readonly CategoryService $categoryService
    ) {
    }

    public function index()
    {
        $posts = $this->postService->getPosts();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = $this->categoryService->getCategories();

        if ($categories->isEmpty()) {
            return redirect()
                ->route('admin.categories.create')
                ->with(['error' => 'Для начала создайте категорию!']);
        }

        return view('admin.posts.create', compact('categories'));
    }

    public function store(PostStoreRequest $request)
    {
        try {
            $postDTO = new PostDTO($request->validated());
            $this->postService->createPost($postDTO);

            return redirect()
                ->route('admin.posts.index')
                ->with(['success' => 'Пост успешно создан!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = $this->categoryService->getCategories();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Post $post, UpdatePostRequest $request)
    {
        try {
            $postDTO = new PostDTO($request->validated());
            $this->postService->update($post, $postDTO);

            return redirect()
                ->route('admin.posts.index')
                ->with(['success' => 'Пост успешно обновлен!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function listOfDeletedPosts()
    {
        $posts = $this->postService->getDeletedPosts();
        return view('admin.posts.deleted', compact('posts'));
    }

    public function delete(Post $post)
    {
        try {
            $this->postService->delete($post);

            return redirect()
                ->route('admin.posts.index')
                ->with(['success' => 'Пост успешно удален!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function restore($postId)
    {
        try {
            $this->postService->restore($postId);

            return redirect()
                ->route('admin.posts.index')
                ->with(['success' => 'Пост успешно восстановлен!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}
