<?php

namespace App\Models;

use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Enum\Status;

/**
 * @property string $id
 * @property string $user_id
 * @property string $category_id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $thumbnail
 * @property Status $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
#[Fillable(['user_id', 'category_id', 'title', 'slug', 'content', 'thumbnail', 'status'])]
class Article extends Model
{
    use HasFactory, HasUuids;
    protected function casts(): array
    {
        return [
            'status' => Status::class,
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
