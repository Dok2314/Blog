<?php

namespace App\Repositories\Main;

use App\DTO\Main\TagDTO;
use App\Models\Tag;

class TagRepository
{
    public function getTags()
    {
        return Tag::all();
    }

    public function createNewTag(TagDTO $tagDTO): void
    {
        Tag::create($tagDTO->toArray());
    }

    public function updateTag(Tag $tag, TagDTO $tagDTO): void
    {
        $tag->update($tagDTO->toArray());
    }

    public function deleteTag(Tag $tag): void
    {
        $tag->delete();
    }

    public function getDeletedTags()
    {
        return Tag::onlyTrashed()->get();
    }

    public function restoreTag($tagId): void
    {
        Tag::withTrashed()->find($tagId)->restore();
    }
}
