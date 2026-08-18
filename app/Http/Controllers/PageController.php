<?php

namespace App\Http\Controllers;

use App\Enum\PageStatus;
use App\Http\Requests\Page\StorePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Models\Page;
use App\Services\PageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct(private readonly PageService $pageService)
    {
    }

    public function index(): View
    {
        Gate::authorize('viewAny', Page::class);

        return view('pages.app.pages.index', ['pages' => Page::latest()->paginate(10)]);
    }

    public function create(): View
    {
        Gate::authorize('create', Page::class);

        return view('pages.app.pages.create');
    }

    public function store(StorePageRequest $request): RedirectResponse
    {
        $page = $this->pageService->store($request->validated());

        return to_route('dashboard.pages.edit', $page)->with('status', 'Page berhasil dibuat.');
    }

    public function show(string $slug): View
    {
        $page = Page::with('sections')->where('slug', $slug)->where('status', PageStatus::PUBLISHED)->firstOrFail();

        return view('pages.public.show', compact('page'));
    }

    public function edit(Page $page): View
    {
        Gate::authorize('view', $page);

        return view('pages.app.pages.edit', ['page' => $page->load('sections')]);
    }

    public function update(UpdatePageRequest $request, Page $page): RedirectResponse
    {
        Gate::authorize('update', $page);
        $this->pageService->update($page, $request->validated());

        return to_route('dashboard.pages.edit', $page)->with('status', 'Page berhasil diperbarui.');
    }

    public function destroy(Page $page): RedirectResponse
    {
        Gate::authorize('delete', $page);
        $this->pageService->destroy($page);

        return to_route('dashboard.pages.index')->with('status', 'Page berhasil dihapus.');
    }
}
