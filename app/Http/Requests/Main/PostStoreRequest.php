<?php

namespace App\Http\Requests\Main;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'content' => ['required', 'min:3'],
            'preview_image' => ['nullable', 'file'],
            'main_image' => ['nullable', 'file'],
            'category_id' => ['required', 'exists:categories,id', 'integer'],
            'tags' => ['nullable', 'array']
        ];
    }
}
