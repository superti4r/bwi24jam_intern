<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Enum\Status;

/**
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
#[Fillable(['title', 'slug', 'content', 'status'])]
class Page extends Model
{
    use HasUuids;
    protected function casts(): array
    {
        return [
            'status' => Status::class,
        ];
    }
}
