<div data-app-menu aria-label="Menu dashboard">
    <button type="button" data-menu-trigger data-motion-interaction aria-expanded="false" aria-controls="dashboard-menu" aria-label="Buka menu dashboard" class="fixed bottom-5 right-5 z-30 flex size-14 items-center justify-center bg-primary text-white shadow-[0_14px_32px_-18px_rgba(158,0,0,0.8)] transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-4 sm:bottom-7 sm:right-7">
        <span class="flex gap-1" aria-hidden="true"><span class="size-1.5 rounded-full bg-white"></span><span class="size-1.5 rounded-full bg-white"></span><span class="size-1.5 rounded-full bg-white"></span></span>
    </button>
    <div data-menu-backdrop hidden class="fixed inset-0 z-30 bg-foreground/30" aria-hidden="true"></div>
    <aside id="dashboard-menu" data-menu-drawer data-open="false" hidden aria-hidden="true" class="app-menu-drawer fixed inset-x-0 bottom-0 z-40 flex max-h-[88dvh] w-full flex-col overflow-hidden border-t border-border bg-background lg:inset-y-0 lg:left-0 lg:right-auto lg:top-0 lg:h-screen lg:max-h-none lg:w-[min(50vw,34rem)] lg:border-r lg:border-t-0" aria-label="Menu dashboard">
        <div class="flex h-[84px] shrink-0 items-center justify-between border-b border-border px-6 sm:px-8">
            <div><p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-primary">BWI 24 Jam</p><p class="mt-1 text-sm text-muted">Ruang kerja</p></div>
            <button type="button" data-menu-close data-motion-interaction aria-label="Tutup menu dashboard" class="flex size-9 items-center justify-center text-muted transition-colors hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-4"><x-icon.close class="size-5" /></button>
        </div>
        <nav class="min-h-0 flex-1 overflow-y-auto px-6 py-8 sm:px-8" aria-label="Navigasi dashboard">
            <p class="mb-4 text-[10px] font-semibold uppercase tracking-[0.2em] text-muted">Navigasi</p>
            <div class="flex flex-col">
                <a href="{{ route('dashboard') }}" data-menu-link class="flex min-h-12 items-center border-b border-border/70 py-3 text-lg font-medium text-foreground transition-colors hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-inset">Dashboard</a>
                <a href="{{ route('dashboard.articles.index') }}" data-menu-link class="flex min-h-12 items-center border-b border-border/70 py-3 text-lg text-muted transition-colors hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-inset">Artikel</a>
                @if (auth()->user()->hasRole('administrator'))
                    <a href="{{ route('dashboard.categories.index') }}" data-menu-link class="flex min-h-12 items-center border-b border-border/70 py-3 text-lg text-muted transition-colors hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-inset">Kategori</a>
                    <a href="{{ route('dashboard.users.index') }}" data-menu-link class="flex min-h-12 items-center border-b border-border/70 py-3 text-lg text-muted transition-colors hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-inset">Pengguna</a>
                    <a href="{{ route('dashboard.website-information.edit') }}" data-menu-link class="flex min-h-12 items-center border-b border-border/70 py-3 text-lg text-muted transition-colors hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-inset">Informasi Website</a>
                    <a href="{{ route('dashboard.pages.index') }}" data-menu-link class="flex min-h-12 items-center border-b border-border/70 py-3 text-lg text-muted transition-colors hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-inset">Halaman</a>
                @endif
            </div>
        </nav>
        <div class="shrink-0 border-t border-border px-6 py-6 sm:px-8">
            <div class="mb-5"><p class="truncate text-sm font-medium">{{ auth()->user()->name }}</p><p class="mt-1 text-[10px] uppercase tracking-[0.18em] text-muted">{{ auth()->user()->roles->value }}</p></div>
            <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" data-motion-interaction class="login-splash flex min-h-12 w-full items-center justify-center border border-primary px-4 text-sm font-semibold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-4">Keluar</button></form>
        </div>
    </aside>
</div>
