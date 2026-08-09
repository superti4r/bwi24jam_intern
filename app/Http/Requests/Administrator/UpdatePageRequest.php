<?php

namespace App\Http\Requests\Administrator;

use App\Enum\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', Rule::unique('pages', 'title')->ignore($this->route('id'))],
            'slug' => ['required', 'string', 'max:255', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/', Rule::unique('pages', 'slug')->ignore($this->route('id'))],
            'content' => ['required', 'string'],
            'status' => ['required', Rule::enum(Status::class)],
        ];
    }

    public function messages(): array
    {
        return [
            'slug.regex' => 'Slug hanya boleh berisi huruf kecil, angka, dan tanda hubung.',
        ];
    }
}
