<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\StorePageRequest;
use App\Http\Requests\Administrator\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function index(): View
    {
        $pages = Page::query()
            ->orderBy('created_at', 'desc')
            ->paginate(5)
            ->withQueryString();

        return view('pages.administrator.pages.index', compact('pages'));
    }

    public function create(): View
    {
        return view('pages.administrator.pages.create');
    }

    public function store(StorePageRequest $request): RedirectResponse
    {
        Page::create($request->validated());

        return redirect()
            ->route('administrator.pages.index')
            ->with('success', 'Halaman berhasil ditambahkan.');
    }

    public function edit(string $id): View
    {
        $page = Page::findOrFail($id);

        return view('pages.administrator.pages.edit', compact('page'));
    }

    public function update(UpdatePageRequest $request, string $id): RedirectResponse
    {
        $page = Page::findOrFail($id);

        $page->update($request->validated());

        return redirect()
            ->route('administrator.pages.index')
            ->with('success', 'Halaman berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $page = Page::findOrFail($id);

        $page->delete();

        return redirect()
            ->route('administrator.pages.index')
            ->with('success', 'Halaman berhasil dihapus.');
    }
}
