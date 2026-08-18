<div data-app-menu aria-label="Application menu">
    <button type="button" data-menu-trigger data-motion-interaction aria-expanded="false"
        class="fixed bottom-5 right-5 z-30 flex size-14 items-center justify-center bg-primary text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-4 sm:bottom-7 sm:right-7"
        aria-controls="app-menu" aria-label="Open application menu">
        <span class="flex gap-1" aria-hidden="true"><span class="size-1.5 rounded-full bg-white"></span><span
                class="size-1.5 rounded-full bg-white"></span><span
                class="size-1.5 rounded-full bg-white"></span></span>
    </button>

    <div data-menu-backdrop hidden class="fixed inset-0 z-30 bg-foreground/20" aria-hidden="true"></div>

    <aside id="app-menu" data-menu-drawer data-open="false" hidden aria-hidden="true"
        class="app-menu-drawer fixed inset-x-0 bottom-0 z-40 flex max-h-[86dvh] w-full flex-col overflow-hidden border-t border-border bg-background motion-reduce:transition-none lg:inset-y-0 lg:left-0 lg:right-auto lg:top-0 lg:h-screen lg:max-h-none lg:w-[min(50vw,34rem)] lg:border-r lg:border-t-0"
        aria-label="Application menu">
        <div class="flex h-[72px] shrink-0 items-center justify-end px-5">
            <button type="button" data-menu-close data-motion-interaction
                class="flex size-9 items-center justify-center text-muted transition-colors hover:text-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-4"
                aria-label="Close application menu">
                <x-icon.close class="size-5" />
            </button>
        </div>

        <nav aria-label="Application menu links" class="min-h-0 flex-1 overflow-y-auto px-5 py-7">
            <div class="flex flex-col">
                <a href="{{ route('home') }}" data-menu-link data-motion-interaction
                    class="flex min-h-12 items-center border-b border-border/70 py-3 text-base font-medium text-foreground transition-colors hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
                    aria-current="page">Beranda</a>
                @foreach ($publishedPages as $page)
                    <a href="{{ route('pages.show', $page->slug) }}" data-menu-link data-motion-interaction
                        class="flex min-h-12 items-center border-b border-border/70 py-3 text-base text-muted transition-colors hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">{{ $page->title }}</a>
                @endforeach
            </div>
        </nav>
        <div class="shrink-0 border-t border-border px-5 py-6">
            <a href="{{ route('login') }}" data-motion-interaction
                class="login-splash flex min-h-12 items-center justify-center border border-primary px-4 text-base font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-4">Login</a>
        </div>
    </aside>
</div>