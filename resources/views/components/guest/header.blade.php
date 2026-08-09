<header x-data="{ isSidebarOpen: false }"
    class="w-full bg-[var(--color-surface)] border-b border-[var(--color-border)] transition-colors duration-200 relative z-30">

    <div class="flex items-center justify-between h-[65px] px-4 md:px-8 max-w-screen-2xl mx-auto">
        <div class="flex items-center h-full pr-4 sm:pr-6 border-r border-[var(--color-border)] gap-3 cursor-pointer group"
            @click="isSidebarOpen = true">
            <button type="button"
                class="button button--primary flex items-center justify-center shrink-0 !rounded-full !p-2 w-9 h-9"
                aria-label="Menu">
                <x-icons.menu />
            </button>
            <span
                class="text-sm font-medium text-[var(--color-muted-foreground)] group-hover:text-[var(--color-foreground)] transition-colors hidden sm:block">
                MENU
            </span>
        </div>

        <x-guest.search />

        <div
            class="flex items-center h-full pl-4 sm:pl-6 border-l border-[var(--color-border)] gap-2 sm:gap-3 shrink-0">
            <a href="{{ route('login') }}"
                class="button button--primary !rounded-full px-4 sm:px-5 py-1.5 sm:py-2 text-sm whitespace-nowrap">
                Masuk
            </a>
        </div>
    </div>

    <x-guest.sidebar />

</header>