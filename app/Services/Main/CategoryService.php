<?php

namespace App\Services\Main;

use App\DTO\Main\CategoryDTO;
use App\Repositories\Main\CategoryRepository;

class CategoryService
{
    public function __construct(private readonly CategoryRepository $categoryRepository)
    {
    }

    public function store(CategoryDTO $categoryDTO)
    {
        $this->categoryRepository->createCategory($categoryDTO);
    }
}
