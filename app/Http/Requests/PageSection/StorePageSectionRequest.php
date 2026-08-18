<?php

namespace App\Http\Requests\PageSection;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePageSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()?->hasRole('administrator') ?? false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            ...self::contentRules(),
            'position' => ['required', 'integer', 'min:1'],
        ];
    }

    public static function contentRules(): array
    {
        return [
            'type' => ['required', 'in:hero,secondary_hero,content,media'],
            'eyebrow' => ['nullable', 'string', 'max:255'],
            'heading' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string', 'max:100000'],
            'image' => ['nullable', 'image', 'max:4096'],
            'video_url' => ['nullable', 'url', 'max:255'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'url', 'max:255'],
            'background_color' => ['required', 'in:primary,secondary,green,blue,yellow,milk'],
            'text_color' => ['required', 'in:primary,secondary,green,blue,yellow,milk'],
            'accent_color' => ['required', 'in:primary,secondary,green,blue,yellow,milk'],
        ];
    }
}
