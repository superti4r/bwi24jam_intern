<?php

namespace App\Models;

use App\Enum\PageSectionType;
use App\Support\YouTube;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'page_id',
    'type',
    'eyebrow',
    'heading',
    'content',
    'image',
    'video_url',
    'button_text',
    'button_url',
    'background_color',
    'text_color',
    'accent_color',
    'sort_order',
])]
class PageSection extends Model
{
    use HasUuids;

    protected function casts(): array
    {
        return ['type' => PageSectionType::class, 'sort_order' => 'integer'];
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function colorClasses(): array
    {
        $background = match ($this->background_color) {
            'secondary' => 'bg-secondary', 'green' => 'bg-green', 'blue' => 'bg-blue', 'yellow' => 'bg-yellow', 'milk' => 'bg-milk', default => 'bg-primary',
        };
        $text = match ($this->text_color) {
            'secondary' => 'text-secondary', 'green' => 'text-green', 'blue' => 'text-blue', 'yellow' => 'text-yellow', 'milk' => 'text-milk', default => 'text-primary',
        };
        $accent = match ($this->accent_color) {
            'secondary' => 'text-secondary', 'green' => 'text-green', 'blue' => 'text-blue', 'yellow' => 'text-yellow', 'milk' => 'text-milk', default => 'text-primary',
        };

        return compact('background', 'text', 'accent');
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? Storage::disk('public')->url($this->image) : null;
    }

    public function getVideoEmbedUrlAttribute(): ?string
    {
        return YouTube::embedUrl($this->video_url);
    }
}
