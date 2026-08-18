<?php

namespace App\Services;

use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PageSectionService
{
    public function store(Page $page, array $data, ?UploadedFile $image = null): PageSection
    {
        $position = min(max((int) ($data['position'] ?? $page->sections()->count() + 1), 1), $page->sections()->count() + 1);
        unset($data['position']);
        $data['page_id'] = $page->id;
        $data['content'] = $this->sanitize($data['content'] ?? null);
        $data['sort_order'] = $position;

        $page->sections()->where('sort_order', '>=', $position)->increment('sort_order');

        if ($image) {
            $data['image'] = $image->store('pages', 'public');
        }

        $section = PageSection::create($data);
        $this->normalize($page);

        return $section->refresh();
    }

    public function update(PageSection $section, array $data, ?UploadedFile $image = null): PageSection
    {
        $data['content'] = $this->sanitize($data['content'] ?? null);

        if ($image) {
            if ($section->image) {
                Storage::disk('public')->delete($section->image);
            }

            $data['image'] = $image->store('pages', 'public');
        }

        $section->update($data);

        return $section->refresh();
    }

    public function destroy(PageSection $section): void
    {
        if ($section->image) {
            Storage::disk('public')->delete($section->image);
        }

        $page = $section->page;
        $section->delete();
        $this->normalize($page);
    }

    public function move(PageSection $section, string $direction): void
    {
        DB::transaction(function () use ($section, $direction): void {
            $sibling = $section->page->sections()
                ->where('sort_order', $direction === 'up' ? '<' : '>', $section->sort_order)
                ->orderBy('sort_order', $direction === 'up' ? 'desc' : 'asc')
                ->first();

            if (!$sibling) {
                return;
            }

            $currentOrder = $section->sort_order;
            $siblingOrder = $sibling->sort_order;
            $section->updateQuietly(['sort_order' => 0]);
            $section->updateQuietly(['sort_order' => $siblingOrder]);
            $sibling->updateQuietly(['sort_order' => $currentOrder]);
        });
    }

    private function normalize(Page $page): void
    {
        $page->sections()->orderBy('sort_order')->get()->each(function (PageSection $section, int $index): void {
            $section->updateQuietly(['sort_order' => $index + 1]);
        });
    }

    private function sanitize(?string $content): ?string
    {
        if ($content === null) {
            return null;
        }

        $content = strip_tags($content, '<p><br><strong><em><u><h2><h3><ol><ul><li><blockquote><a>');
        $content = preg_replace('/\s+on[a-z]+\s*=\s*(["\']).*?\1/i', '', $content) ?? $content;

        return preg_replace_callback('/\s+href\s*=\s*(["\'])(.*?)\1/i', function (array $match): string {
            return preg_match('/^(https?:|mailto:)/i', $match[2]) ? ' href="' . $match[2] . '"' : '';
        }, $content) ?? $content;
    }
}
