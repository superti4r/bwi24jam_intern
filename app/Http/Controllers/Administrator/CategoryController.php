<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\StoreCategoryRequest;
use App\Http\Requests\Administrator\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::query()
            ->orderBy('created_at', 'desc')
            ->paginate(5)
            ->withQueryString();

        return view('pages.administrator.categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('pages.administrator.categories.create');
    }

    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = Str::lower(Str::random(12));

        Category::create($data);

        return redirect()
            ->route('administrator.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(string $id): View
    {
        $category = Category::findOrFail($id);

        return view('pages.administrator.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, string $id): RedirectResponse
    {
        $category = Category::findOrFail($id);

        $data = $request->validated();
        unset($data['slug']);

        $category->update($data);

        return redirect()
            ->route('administrator.categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()
            ->route('administrator.categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
