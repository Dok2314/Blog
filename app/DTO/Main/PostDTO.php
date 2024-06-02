<?php

namespace App\DTO\Main;

use Illuminate\Http\UploadedFile;

class PostDTO
{
    private string $title;
    private string $content;
    private $previewImage;
    private $mainImage;
    private int $categoryId;
    private array $tags;

    public function __construct(array $params)
    {
        $this->title = $params['title'];
        $this->content = $params['content'];
        $this->categoryId = $params['category_id'];
        $this->previewImage = $params['preview_image'] ?? null;
        $this->mainImage = $params['main_image'] ?? null;
        $this->tags = $params['tags'] ?? [];
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function setPreviewImage($previewImage): void
    {
        $this->previewImage = $previewImage;
    }

    public function setMainImage($mainImage): void
    {
        $this->mainImage = $mainImage;
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function categoryId(): int
    {
        return $this->categoryId;
    }

    public function previewImage()
    {
        return $this->previewImage;
    }

    public function mainImage()
    {
        return $this->mainImage;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => $this->categoryId,
            'preview_image' => $this->previewImage,
            'main_image' => $this->mainImage,
        ];
    }
}
