<x-app.sidebar-open />

<div x-show="isSidebarOpen" x-transition:enter="transition ease-out duration-300 transform"
    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    class="fixed top-0 left-0 w-[280px] max-w-[80vw] h-full bg-[var(--color-surface)] z-50 flex flex-col border-r border-[var(--color-border)] overflow-hidden"
    x-cloak style="display: none;">

    <x-app.sidebar-background />

    <nav class="relative z-20 flex-1 overflow-y-auto px-4 py-6 flex flex-col space-y-1">

        <x-app.sidebar-brand />

        <a href="{{ route(auth()->check() ? 'm.home' : 'home') }}"
            class="flex items-center px-4 py-2.5 text-sm font-medium text-[var(--color-muted-foreground)] hover:text-[var(--color-foreground)] hover:bg-[var(--color-accent)] rounded-lg transition-colors">
            Beranda
        </a>

        @php
            $pages = \App\Models\Page::query()
                ->published()
                ->orderBy('created_at', 'asc')
                ->get();
        @endphp

        @foreach ($pages as $page)
            <a href="{{ route(auth()->check() ? 'm.pages.show' : 'pages.show', $page->slug) }}"
                class="flex items-center px-4 py-2.5 text-sm font-medium text-[var(--color-muted-foreground)] hover:text-[var(--color-foreground)] hover:bg-[var(--color-accent)] rounded-lg transition-colors">
                {{ $page->title }}
            </a>
        @endforeach

        <x-app.menu />

    </nav>

    <div class="relative z-20 p-4 pb-6 bg-transparent">
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="button button--primary w-full flex items-center justify-center py-2.5 text-sm font-medium">
                    Keluar
                </button>
            </form>
        @else
            <a href="{{ route('login') }}"
                class="button button--primary w-full flex items-center justify-center py-2.5 text-sm font-medium">
                Masuk
            </a>
        @endauth
    </div>
</div>
