<?php

namespace App\Services;

use App\Enum\Status;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleService
{
    public function store(User $user, array $data, ?UploadedFile $thumbnail = null): Article
    {
        if ($thumbnail) {
            $data['thumbnail'] = $thumbnail->store('articles', 'public');
        }

        $article = $user->articles()->create([...$data, 'slug' => Str::slug($data['title'])]);
        $article->forceFill(['status' => $user->hasRole('administrator') ? Status::PUBLISHED : Status::WAITING])->save();

        return $article;
    }

    public function update(Article $article, array $data, ?UploadedFile $thumbnail = null): Article
    {
        if ($thumbnail) {
            if ($article->thumbnail) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $data['thumbnail'] = $thumbnail->store('articles', 'public');
        }

        $status = $data['status'] ?? $article->status;
        unset($data['status']);
        $article->update($data);
        $article->forceFill(['status' => $status])->save();

        return $article->refresh();
    }
}
