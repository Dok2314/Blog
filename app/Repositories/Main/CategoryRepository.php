<?php

namespace App\Repositories\Main;

use App\DTO\Main\CategoryDTO;
use App\Models\Category;

class CategoryRepository
{
    public function createCategory(CategoryDTO $categoryDTO): void
    {
        Category::create($categoryDTO->toArray());
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function updateCategory(Category $category, CategoryDTO $categoryDTO): void
    {
        $category->update($categoryDTO->toArray());
    }

    public function getDeletedCategories()
    {
        return Category::onlyTrashed()->get();
    }

    public function deleteCategory(Category $category): void
    {
        $category->delete();
    }

    public function restoreCategory($categoryId): void
    {
        Category::withTrashed()->find($categoryId)->restore();
    }
}
