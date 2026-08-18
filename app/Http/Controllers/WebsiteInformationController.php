<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebsiteInformation\UpdateWebsiteInformationRequest;
use App\Models\WebsiteInformation;
use App\Services\WebsiteInformationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class WebsiteInformationController extends Controller
{
    public function __construct(private readonly WebsiteInformationService $websiteInformationService)
    {
    }

    public function edit(): View
    {
        $websiteInformation = WebsiteInformation::query()->firstOrCreate([], WebsiteInformation::defaultAttributes());
        Gate::authorize('view', $websiteInformation);

        return view('pages.app.website-information.edit', compact('websiteInformation'));
    }

    public function update(UpdateWebsiteInformationRequest $request): RedirectResponse
    {
        $websiteInformation = WebsiteInformation::query()->firstOrCreate([], WebsiteInformation::defaultAttributes());
        Gate::authorize('update', $websiteInformation);

        $this->websiteInformationService->update($websiteInformation, $request->safe()->except('hero_image'), $request->file('hero_image'));

        return to_route('dashboard.website-information.edit')->with('status', 'Informasi website berhasil diperbarui.');
    }
}
