<?php

namespace App\Http\Requests;

use App\Enum\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', Rule::unique('articles', 'title')],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'content' => ['required', 'string'],
            'thumbnail_path' => ['nullable', 'string', 'max:255'],
            'status' => ['required', Rule::enum(Status::class)],
        ];
    }
}
