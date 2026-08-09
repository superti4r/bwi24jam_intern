<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleService
{
    public function create(array $data, string $userId): Article
    {
        $data['slug'] = Str::lower(Str::random(12));
        $data['user_id'] = $userId;
        $data['thumbnail'] = $data['thumbnail_path'] ?? null;
        unset($data['thumbnail_path']);

        return Article::create($data);
    }

    public function update(Article $article, array $data): Article
    {
        unset($data['slug']);

        if (filled($data['thumbnail_path'] ?? null)) {
            if ($article->thumbnail && $article->thumbnail !== $data['thumbnail_path']) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $data['thumbnail'] = $data['thumbnail_path'];
        } elseif ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
            $data['thumbnail'] = null;
        }

        unset($data['thumbnail_path']);

        $article->update($data);

        return $article;
    }

    public function delete(Article $article): void
    {
        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        $article->delete();
    }

    public function uploadThumbnail(UploadedFile $file): string
    {
        return $file->store('thumbnails', 'public');
    }

    public function removeThumbnail(string $path): void
    {
        if (! Str::startsWith($path, 'thumbnails/')) {
            abort(422, 'Path tidak valid.');
        }

        Storage::disk('public')->delete($path);
    }
}
