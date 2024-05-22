<?php

namespace App\DTO\Main;

class PostDTO
{
    private string $title;
    private string $content;
    private int $categoryId;

    public function __construct(array $params)
    {
        $this->title = $params['title'];
        $this->content = $params['content'];
        $this->categoryId = $params['category_id'];
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function categoryId(): int
    {
        return $this->categoryId;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => $this->categoryId,
        ];
    }
}
