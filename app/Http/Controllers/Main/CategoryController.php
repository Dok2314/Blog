<?php

namespace App\Http\Controllers\Main;

use App\DTO\Main\CategoryDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Main\CategoryStoreRequest;
use App\Http\Requests\Main\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\Main\CategoryService;
use Exception;

class CategoryController extends Controller
{
    public function __construct(private readonly CategoryService $categoryService)
    {
    }

    public function index()
    {
        $categories = $this->categoryService->getCategories();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        try {
            $categoryDTO = new CategoryDTO($request->validated());
            $this->categoryService->store($categoryDTO);

            return redirect()
                ->route('admin.categories.index')
                ->with(['success' => 'Категория успешно создана!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Category $category, CategoryUpdateRequest $request)
    {
        try {
            $categoryDTO = new CategoryDTO($request->validated());
            $this->categoryService->update($category, $categoryDTO);

            return redirect()
                ->route('admin.categories.index')
                ->with(['success' => 'Категория успешно обновлена!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}
