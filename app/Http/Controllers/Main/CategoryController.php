<?php

namespace App\Http\Controllers\Main;

use App\DTO\Main\CategoryDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Main\CategoryStoreRequest;
use App\Services\Main\CategoryService;
use Exception;

class CategoryController extends Controller
{
    public function __construct(private readonly CategoryService $categoryService)
    {
    }

    public function index()
    {
        return view('admin.categories.index');
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

            return redirect()->route('admin.categories.index')->with(['success' => 'Категория успешно создана!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}
