<?php

namespace App\Http\Requests\WebsiteInformation;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWebsiteInformationRequest extends FormRequest
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
            'hero_description' => ['required', 'string'],
            'hero_image' => ['nullable', 'image', 'max:4096'],
            'secondary_hero_title' => ['required', 'string'],
            'secondary_hero_description' => ['required', 'string'],
            'contact_email' => ['required', 'email', 'max:255'],
            'facebook_url' => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'x_url' => ['nullable', 'url', 'max:255'],
            'youtube_url' => ['nullable', 'url', 'max:255'],
            'welcomer_video_url' => ['required', 'url', 'max:255'],
            'welcomer_eyebrow' => ['required', 'string', 'max:255'],
            'welcomer_title' => ['required', 'string', 'max:255'],
            'welcomer_description' => ['required', 'string'],
            'welcomer_label' => ['required', 'string', 'max:255'],
        ];
    }
}
