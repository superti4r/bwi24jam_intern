<div x-show="isSidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 flex pointer-events-none" x-cloak
    style="display: none;">

    <div class="absolute inset-0 bg-[var(--color-overlay)]/50 backdrop-blur-sm pointer-events-auto"
        @click="isSidebarOpen = false"></div>

    <div class="w-[280px] max-w-[80vw] shrink-0 h-full pointer-events-none"></div>

    <div class="flex items-center pl-3 sm:pl-5 h-full z-50 pointer-events-none">
        <button type="button" @click="isSidebarOpen = false"
            class="button button--primary flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12 !rounded-full hover:scale-105 transition-transform focus:outline-none pointer-events-auto shadow-xl"
            aria-label="Tutup Menu">
            <x-icons.close />
        </button>
    </div>
</div>

<div x-show="isSidebarOpen" x-transition:enter="transition ease-out duration-300 transform"
    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    class="fixed top-0 left-0 w-[280px] max-w-[80vw] h-full bg-[var(--color-surface)] z-50 flex flex-col border-r border-[var(--color-border)] overflow-hidden"
    x-cloak style="display: none;">

    <div class="absolute bottom-0 left-0 w-full h-[70%] z-0 pointer-events-none">
        <div
            class="absolute inset-0 bg-gradient-to-b from-[var(--color-surface)] via-[var(--color-surface)]/80 to-transparent z-10">
        </div>
        <img src="{{ asset('images/bwi24jam_B4r5cfqe3RkYBAQ9nidg1suYXnl7C1Trqq8wNJ2EU8s.webp') }}" alt=""
            class="w-full h-full object-cover object-bottom opacity-100">
    </div>

    <nav class="relative z-20 flex-1 overflow-y-auto px-4 py-6 flex flex-col space-y-1">

        <div class="mb-8 px-4">
            <a href="/" class="inline-block transition-transform hover:scale-105 duration-200">
                <img src="{{ asset('images/bwi24jam_exEdQ4JEsL87D0C5O28lxjgx1H8xByAV2ocPy3Gd4aM.png') }}"
                    alt="{{ config('app.name') }}" class="h-8 w-auto object-contain">
            </a>
        </div>

        <a href="#"
            class="flex items-center px-4 py-2.5 text-sm font-medium text-[var(--color-muted-foreground)] hover:text-[var(--color-foreground)] hover:bg-[var(--color-accent)] rounded-lg transition-colors">
            Beranda
        </a>
        <a href="#"
            class="flex items-center px-4 py-2.5 text-sm font-medium text-[var(--color-muted-foreground)] hover:text-[var(--color-foreground)] hover:bg-[var(--color-accent)] rounded-lg transition-colors">
            Artikel
        </a>
        <a href="#"
            class="flex items-center px-4 py-2.5 text-sm font-medium text-[var(--color-muted-foreground)] hover:text-[var(--color-foreground)] hover:bg-[var(--color-accent)] rounded-lg transition-colors">
            Tentang Kami
        </a>
        <a href="#"
            class="flex items-center px-4 py-2.5 text-sm font-medium text-[var(--color-muted-foreground)] hover:text-[var(--color-foreground)] hover:bg-[var(--color-accent)] rounded-lg transition-colors">
            Kontak
        </a>

        @auth
            <div class="px-4 pt-4">
                <p class="m-0 text-sm font-medium text-[var(--color-foreground)]">{{ auth()->user()->name }}</p>
                <hr class="separator my-3" />
            </div>

            @if (auth()->user()->hasRole(App\Enum\Role::ADMINISTRATOR))
                <div class="px-4 pb-1 pt-1">
                    <p class="text-[11px] font-semibold uppercase tracking-wider text-[var(--color-muted-foreground)]">
                        Administrator
                    </p>
                </div>
                <a href="{{ route('administrator.users.index') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-[var(--color-muted-foreground)] hover:text-[var(--color-foreground)] hover:bg-[var(--color-accent)] rounded-lg transition-colors">
                    Manajemen User
                </a>
            @endif
        @endauth
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