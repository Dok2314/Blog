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
}
