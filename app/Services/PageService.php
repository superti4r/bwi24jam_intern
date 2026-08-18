<?php

namespace App\Services;

use App\Models\Page;

class PageService
{
    public function store(array $data): Page
    {
        return Page::create($data);
    }

    public function update(Page $page, array $data): Page
    {
        $page->update($data);

        return $page->refresh();
    }

    public function destroy(Page $page): void
    {
        $page->delete();
    }
}
