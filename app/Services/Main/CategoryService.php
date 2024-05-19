<?php

namespace App\Services\Main;

use App\DTO\Main\CategoryDTO;
use App\Models\Category;
use App\Repositories\Main\CategoryRepository;

class CategoryService
{
    public function __construct(private readonly CategoryRepository $categoryRepository)
    {
    }

    public function store(CategoryDTO $categoryDTO): void
    {
        $this->categoryRepository->createCategory($categoryDTO);
    }

    public function getCategories()
    {
        return $this->categoryRepository->getCategories();
    }

    public function update(Category $category, CategoryDTO $categoryDTO): void
    {
        $this->categoryRepository->updateCategory($category, $categoryDTO);
    }
}
