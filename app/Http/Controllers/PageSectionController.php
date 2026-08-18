<?php

namespace App\Http\Controllers;

use App\Enum\PageSectionType;
use App\Http\Requests\PageSection\StorePageSectionRequest;
use App\Http\Requests\PageSection\UpdatePageSectionRequest;
use App\Models\Page;
use App\Models\PageSection;
use App\Services\PageSectionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class PageSectionController extends Controller
{
    public function __construct(private readonly PageSectionService $pageSectionService)
    {
    }

    public function create(Page $page): View
    {
        Gate::authorize('update', $page);

        return view('pages.app.pages.sections.form', ['page' => $page, 'section' => null, 'types' => PageSectionType::cases()]);
    }

    public function store(StorePageSectionRequest $request, Page $page): RedirectResponse
    {
        Gate::authorize('update', $page);
        $this->pageSectionService->store($page, $request->safe()->except('image'), $request->file('image'));

        return to_route('dashboard.pages.edit', $page)->with('status', 'Section berhasil ditambahkan.');
    }

    public function edit(Page $page, PageSection $section): View
    {
        Gate::authorize('update', $page);

        return view('pages.app.pages.sections.form', ['page' => $page, 'section' => $section, 'types' => PageSectionType::cases()]);
    }

    public function update(UpdatePageSectionRequest $request, Page $page, PageSection $section): RedirectResponse
    {
        Gate::authorize('update', $page);
        $this->pageSectionService->update($section, $request->safe()->except('image'), $request->file('image'));

        return to_route('dashboard.pages.edit', $page)->with('status', 'Section berhasil diperbarui.');
    }

    public function destroy(Page $page, PageSection $section): RedirectResponse
    {
        Gate::authorize('update', $page);
        $this->pageSectionService->destroy($section);

        return to_route('dashboard.pages.edit', $page)->with('status', 'Section berhasil dihapus.');
    }

    public function move(Page $page, PageSection $section, string $direction): RedirectResponse
    {
        Gate::authorize('update', $page);
        $this->pageSectionService->move($section, $direction);

        return to_route('dashboard.pages.edit', $page);
    }
}
