<?php

namespace App\DTO\Main;

class CategoryDTO
{
    private string $title;

    public function __construct(array $params)
    {
        $this->title = $params['title'];
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
        ];
    }
}
