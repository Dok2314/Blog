<?php

namespace App\Http\Controllers\Main;

use App\DTO\Main\TagDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Main\TagStoreRequest;
use App\Http\Requests\Main\TagUpdateRequest;
use App\Models\Tag;
use App\Services\Main\TagService;
use Exception;

class TagController extends Controller
{
    public function __construct(private readonly TagService $tagService)
    {
    }

    public function index()
    {
        $tags = $this->tagService->getTags();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(TagStoreRequest $request)
    {
        try {
            $tagDTO = new TagDTO($request->validated());
            $this->tagService->store($tagDTO);

            return redirect()
                ->route('admin.tags.index')
                ->with(['success' => 'Тег успешно создан!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Tag $tag, TagUpdateRequest $request)
    {
        try {
            $tagDTO = new TagDTO($request->validated());
            $this->tagService->update($tag, $tagDTO);

            return redirect()
                ->route('admin.tags.index')
                ->with(['success' => 'Тег успешно обновлен!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete(Tag $tag)
    {
        try {
            $this->tagService->delete($tag);

            return redirect()
                ->route('admin.tags.index')
                ->with(['success' => 'Тег успешно удален!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function listOfDeletedTags()
    {
        $tags = $this->tagService->getDeletedTags();

        return view('admin.tags.deleted', compact('tags'));
    }

    public function restore($tagId)
    {
        try {
            $this->tagService->restore($tagId);

            return redirect()
                ->route('admin.tags.index')
                ->with(['success' => 'Тег успешно восстановлен!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}
