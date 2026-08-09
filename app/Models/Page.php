<?php

namespace App\Models;

use App\Enum\Status;
use Database\Factories\PageFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

/**
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property Status $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
#[Fillable(['title', 'slug', 'content', 'status'])]
class Page extends Model
{
    use HasFactory, HasUuids;
    protected function casts(): array
    {
        return [
            'status' => Status::class,
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('status', Status::PUBLISHED->value);
    }
}
