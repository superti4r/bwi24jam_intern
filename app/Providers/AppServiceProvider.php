<?php

namespace App\Providers;

use App\Enum\PageStatus;
use App\Models\Page;
use App\Models\WebsiteInformation;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer([
            'components.home.hero',
            'components.home.welcomer',
            'components.home.secondary-hero',
            'components.home.footer',
            'components.home.app-menu',
        ], function (ViewContract $view): void {
            $view->with([
                'websiteInformation' => WebsiteInformation::query()->first() ?? WebsiteInformation::make(WebsiteInformation::defaultAttributes()),
                'publishedPages' => Page::query()
                    ->where('status', PageStatus::PUBLISHED)
                    ->orderBy('title')
                    ->get(['title', 'slug']),
            ]);
        });
    }
}
