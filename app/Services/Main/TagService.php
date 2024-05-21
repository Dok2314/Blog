<?php

namespace App\Services\Main;

use App\DTO\Main\CategoryDTO;
use App\DTO\Main\TagDTO;
use App\Models\Category;
use App\Models\Tag;
use App\Repositories\Main\CategoryRepository;
use App\Repositories\Main\TagRepository;

class TagService
{
    public function __construct(private readonly TagRepository $tagRepository)
    {
    }

    public function getTags()
    {
        return $this->tagRepository->getTags();
    }

    public function store(TagDTO $tagDTO): void
    {
        $this->tagRepository->createNewTag($tagDTO);
    }

    public function update(Tag $tag, TagDTO $tagDTO)
    {
        $this->tagRepository->updateTag($tag, $tagDTO);
    }

    public function delete(Tag $tag): void
    {
        $this->tagRepository->deleteTag($tag);
    }

    public function getDeletedTags()
    {
        return $this->tagRepository->getDeletedTags();
    }

    public function restore($tagId): void
    {
        $this->tagRepository->restoreTag($tagId);
    }
}
