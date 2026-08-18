<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryService
{
    public function store(array $data): Category
    {
        return Category::create([...$data, 'slug' => Str::lower(Str::random(12))]);
    }

    public function update(Category $category, array $data): Category
    {
        $category->update(['name' => $data['name']]);

        return $category->refresh();
    }
}
